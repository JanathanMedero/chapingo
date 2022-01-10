@extends('layouts.admin')

@section('head')
Panel de administración - Chapingo
@endsection

@section('content')
<div id="main">
	
	<x-header-admin>
		<x-alerts></x-alerts>
	</x-header-admin>


	<div class="page-content">
		<section class="section">
			<div class="card">
				<card-header class="my-4 mx-4">
					<div class="row">
						<div class="col-6">
							<h3 class="card-tittle">Imágenes del carousel principal</h3>
						</div>
					</div>
				</card-header>
				<div class="card-body">
					<div class="row">
						@if($images)
						<div class="col-md-12">
							<div class="row">
								@foreach($images as $image)
								<div class="col-md-3 d-flex align-items-center">
									<div class="row d-flex justify-content-center align-items-center">
										<div class="col-md-12 px-2 py-2 d-flex align-items-center" style="width: 150px; height: 150px; overflow: hidden;">
											<img src="{{ asset('imagenes/slider/'.$image->image) }}" class="img-fluid">
										</div>
										<div class="col-md-12 mt-4">
											<form method="POST" class="destroy-image" action="{{ route('slider.destroyImage', $image->image) }}" enctype="multipart/form-data">
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
						<div class="col-md-6">
							<form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="col-md-12 mb-1 mt-4">
									<div class="row">
										<p class="mb-2">Imágenes para el carousel principal</p>
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
								@if($images->isNotEmpty())
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<button type="submit" class="btn btn-info">Actualizar carousel</button>
										</div>
									</div>
								</div>
								@else
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<button type="submit" class="btn btn-success">Crear carousel</button>
										</div>
									</div>
								</div>
								@endif
							</form>
							@if($images->isNotEmpty())
							<form action="{{ route('slider.destroySlider') }}" method="POST" class="destroy-all-images">
								@csrf
								@method("delete")
								<div class="col-md-6 mt-4">
									<div class="row">
										<div class="col-md-12">
											<button type="submit" class="btn btn-danger">Eliminar todas las imágenes</button>
										</div>
									</div>
								</div>
							</form>
							@endif
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
	$('.destroy-image').submit(function(e){
		e.preventDefault();
		Swal.fire({
			title: '¿Estas seguro de eliminar esta imágen?',
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
			title: '¿Estas seguro de eliminar todas las imágenes?',
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