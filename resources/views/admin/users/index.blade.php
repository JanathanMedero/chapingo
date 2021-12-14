@extends('layouts.admin')

@section('head')
Usuarios registrados
@endsection

@section('content')
<div id="main">

	<x-header-admin></x-header-admin>

	<div class="page-content">
		<section class="section">
			<div class="card">
				<card-header class="my-4 mx-4">
					<div class="row">
						<div class="col-6">
							<h3 class="card-tittle">Tabla de moderadores</h3>
						</div>
						<div class="col-6">
							<div class="row d-flex justify-content-end">
								<div class="col-4">
									<a href="{{ route('users.create') }}" class="btn btn-success btn-block">Agregar usuario</a>
								</div>
							</div>
						</div>
					</div>

					<x-alerts></x-alerts>

				</card-header>
				<div class="card-body">
					<div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
						<div class="dataTable-container">
							<table class="table table-striped dataTable-table">
								<thead>
									<tr>
										<th><a href="#" class="dataTable-sorter">Nombre</a></th>
										<th><a href="#" class="dataTable-sorter">Correo electrónico</a></th>
										<th><a href="#" class="dataTable-sorter">Tipo de usuario</a></th>
										<th class="text-center"><a href="#" class="dataTable-sorter">Acciones</a></th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
									<tr>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										<td>
											@if($user->can('show users'))
											<span class="badge bg-success">Administrador</span>
											@else
											<span class="badge bg-info">Moderador</span>
											@endif
										</td>
										<td>
											<div class="d-flex justify-content-around">
												<div class="col-4">
													<a href="{{ route('users.edit', $user->slug) }}" class="btn btn-info btn-block">Editar</a>
												</div>
												<div class="col-4">
													<a href="#" class="btn btn-danger btn-block">Eliminar</a>
												</div>
											</div>
										</td>
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