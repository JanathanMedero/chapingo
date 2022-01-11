@extends('layouts.admin')

@section('head')
Carreras
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
							<h3 class="card-tittle">Tabla de carreras</h3>
						</div>
						<div class="col-6 d-flex justify-content-end">
							{{-- <a href="#" class="btn btn-success">Agregar carrera</a> --}}
							<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#new-course">
								Agregar carrera
							</button>

							<div class="modal fade text-left" id="new-course" tabindex="-1" aria-labelledby="new-course" style="display: none;" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<div class="modal-header bg-primary">
											<h4 class="modal-title text-white" id="new-course">Ingresa los datos de la nueva carrera</h4>
											<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
												<i data-feather="x"></i>
											</button>
										</div>
										<form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="modal-body">
												<label for="name">Nombre de la carrera: </label>
												<div class="form-group">
													<input type="text" id="name" name="name" placeholder="Ingrese el nombre de la carrera" class="form-control" required>
												</div>
												<label for="description">Descripción de la carrera: </label>
												<div class="form-group">
													<textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5" style="resize: none;"></textarea required>
												</div>
												<div class="input-group mt-3">
													<label class="mb-2" for="image">Ingrese una imágen</label>
													<div class="input-group mb-3">
														<label class="input-group-text" for="image"><i class="bi bi-upload"></i></label>
														<input type="file" class="form-control" id="image" name="image" required>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
													<i class="bx bx-x d-block d-sm-none"></i>
													<span class="d-none d-sm-block">Cerrar</span>
												</button>
												<button type="submit" class="btn btn-primary ml-1">
													<i class="bx bx-check d-block d-sm-none"></i>
													<span class="d-none d-sm-block">Agregar carrera</span>
												</button>
											</div>
										</form>
									</div>
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
										<th><a href="#" class="dataTable-sorter">Nombre de la carrera</a></th>
										<th><a href="#" class="dataTable-sorter">Descripción</a></th>
										<th><a href="#" class="dataTable-sorter">Imágen</a></th>
										<th class="text-center"><a href="#" class="dataTable-sorter">Acciones</a></th>
									</tr>
								</thead>
								<tbody>
									@if($courses->isNotEmpty())
									@foreach($courses as $course)
									<tr>
										<td>{{ $course->name }}</td>
										<td>{{ $course->description }}</td>
										<td>
											<img src="{{ asset('imagenes/carreras/'.$course->image) }}" style="width: 130px;">
										</td>
										<td>
											<div class="d-flex justify-content-around">
												<div class="col-4">
													<a href="{{ route('course.edit', $course->slug) }}" class="btn btn-info btn-block">Editar</a>
												</div>
												<form method="POST" class="delete-course" action="{{ route('course.destroy', $course->slug) }}">
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
									@else
									<tr>
										<td colspan="4">
											<h5 class="text-center mb-4 mt-4">Actualmente no cuentas con ninguna carrera</h5>
										</td>
									</tr>
									@endif
								</tbody>
							</table>
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
	$('.delete-course').submit(function(e){
		e.preventDefault();
		Swal.fire({
			title: '¿Estas seguro de eliminar esta carrera?',
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