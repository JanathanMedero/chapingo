@extends('layouts.admin')

@section('head')
Galería de imágenes
@endsection

@section('content')
<div id="main">

	<x-header-admin></x-header-admin>

	<x-alerts></x-alerts>

	<div class="page-content">
		<section class="section">
			<div class="card">
				<card-header class="my-4 mx-4">
					<div class="row">
						<div class="col-6">
							<h3 class="card-tittle">Galería de imágenes</h3>
						</div>
						@if($errors->any())
						<div class="col-md-12">
							<div class="alert alert-danger alert-dismissible show fade mt-2">
								<ul class="mb-0">
									@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						</div>
						@endif
					</div>
					
					@if($notice->gallery->isEmpty())
						<div class="row">
							<div class="col-md-6">
								<h5 class="text-danger mt-4">Esta galería no cuenta con imágenes</h5>
							</div>
						</div>
					@endif
					
				</card-header>
				<div class="card-body">
					<div class="row">
						@if($notice->gallery)
						<div class="col-md-12">
							<div class="row">
								@foreach($notice->gallery as $gallery)
								<div class="col-md-3 d-flex align-items-center">
									<div class="row d-flex justify-content-center align-items-center">
										<div class="col-md-12 px-2 py-2 d-flex align-items-center" style="width: 150px; height: 150px;">
											<img src="{{ asset('imagenes/noticias/galeria/'.$gallery->image) }}" class="img-fluid">
										</div>
										<div class="col-md-12 mt-4">
											<form method="POST" class="delete-image" action="{{ route('gallery.destroyImage', $gallery->image) }}" enctype="multipart/form-data">
												@csrf
												@method("delete")
												<button type="submit" class="btn btn-danger btn-block">Eliminar imágen</button>
											</form>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						@else
						<div class="col-md-12">
							<h5 style="color: red;">Esta noticia no tiene galería de imágenes</h5>
						</div>
						@endif						
					</div>
					<div class="row">
						<form action="{{ route('gallery.store', $notice->slug) }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="col-md-6 mb-1 mt-4">
								<div class="row">
									<p class="mb-2">Imágenes para la galería</p>
								</div>
								<div class="row">
									<div class="input-group mb-3">
										<div class="input-group mb-3">
											<label class="input-group-text" for="image"><i class="bi bi-upload"></i></label>
											<input type="file" class="form-control" id="image" name="images[]" multiple>
										</div>
									</div>
								</div>
							</div>
							@if($notice->gallery->isNotEmpty())
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-info">Actualizar galería</button>
									</div>
								</div>
							</div>
							@else
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-success">Crear galería</button>
									</div>
								</div>
							</div>
							@endif
						</form>
						@if($notice->gallery->isNotEmpty())
						<form action="{{ route('gallery.destroyGallery', $notice->id) }}" method="POST" class="destroy-all-images">
							@csrf
							@method("delete")
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-danger">Eliminar toda la galería</button>
									</div>
								</div>
							</div>
						</form>
						@endif
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

@push('extra-js')
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<script src="{{ asset('dashboard/assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script type="text/javascript">
	$('.delete-image').submit(function(e){
		e.preventDefault();
		Swal.fire({
			title: '¿Estas seguro de eliminar la imágen?',
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

<script type="text/javascript">
	$('.destroy-all-images').submit(function(e){
		e.preventDefault();
		Swal.fire({
			title: '¿Estas seguro de eliminar toda la galería?',
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