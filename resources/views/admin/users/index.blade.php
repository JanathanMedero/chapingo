@extends('layouts.admin')

@section('head')
Usuarios registrados
@endsection

@section('content')
<div id="main">

	<x-header-admin>
		<h3>Tabla de usuarios</h3>
	</x-header-admin>

	<div class="page-content">
		<section class="section">
			<div class="card">
				<div class="card-body">
					<div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
						<div class="dataTable-container">
							<table class="table table-striped dataTable-table" id="table1">
								<thead>
									<tr>
										<th data-sortable="" style="width: 11.7994%;"><a href="#" class="dataTable-sorter">Nombre</a></th>
										<th data-sortable="" style="width: 41.8879%;"><a href="#" class="dataTable-sorter">Email</a></th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
									<tr>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
									</tr>
									@endforeach
								</tbody>

							</table>
						</div>
						<div class="dataTable-bottom">
							{{ $users->links('custom-paginate') }}
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection