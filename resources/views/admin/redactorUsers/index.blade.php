@extends('layouts.admin')

@section('head')
Redactores
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
							<h3 class="card-tittle">Tabla de redactores</h3>
						</div>
						<x-alerts></x-alerts>
					</div>
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
											<span class="badge bg-primary">Redactor</span>
										</td>
										<td>
											<div class="d-flex justify-content-around">
												<div class="col-4">
													<a href="{{ route('adminUser.edit', $user->slug) }}" class="btn btn-info btn-block">Editar</a>
												</div>
												<form method="POST" class="form-delete" action="{{ route('admin.delete', $user->slug) }}">
													@csrf
													@method("DELETE")
													<div class="col-4">
														<button type="submit" class="btn btn-danger">Eliminar</button>
													</div>
												</form>
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

@push('extra-js')
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<script src="{{ asset('dashboard/assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript">
	$('.form-delete').submit(function(e){
		e.preventDefault();
		Swal.fire({
			title: '¿Estas seguro de eliminar a este administrador?',
			text: "Esta acción no se puede revertir",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Borrar',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				this.submit();
			}
		})
	});
</script>
@endpush