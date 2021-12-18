@extends('layouts.admin')

@section('head')
{{ $notice->title }}
@endsection

@push('extra-css')
<script type="text/javascript" src="{{ asset('dashboard/assets/vendors/ckeditor/ckeditor.js') }}"></script>
@endpush

@section('content')
<div id="main">

	<x-header-admin></x-header-admin>

	<div class="page-content">
		<section class="section">
			<div class="card">
				<card-header class="my-4 mx-4">
					<div class="row">
						<div class="col-12">
							<h3 class="card-tittle">Editar Noticia - {{ $notice->title }}</h3>
						</div>
					</div>
					@if($errors->any())
					<div class="alert alert-danger alert-dismissible show fade mt-2">
						<ul class="mb-0">
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
				</card-header>

				<form method="POST" action="{{ route('notice.update', $notice->slug) }}" enctype="multipart/form-data">
					@csrf
					@method("PUT")
					<div class="card-body pt-2">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="title">Título de la noticia</label>
									<input type="text" class="form-control" id="title" name="title" placeholder="Ingrese el título" value="{{ $notice->title }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="subtitle">Subtítulo de la noticia (opcional)</label>
									<input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Ingrese el subtítulo" value="{{ $notice->subtitle }}">
								</div>
							</div>
							<div class="col-md-4 d-flex align-items-center">
								<div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" id="publish" name="publish" {{ $notice->publish == 1 ? 'checked' : '' }}>
									<label class="form-check-label" for="publish">Publicar inmediatamente*</label>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12 mt-4">
									<div class="form-group">
										<label for="body" class="form-label">Cuerpo de la noticia</label>
										<textarea class="form-control" name="body" placeholder="Ingresa el cuerpo de la noticia" id="editor" style="display: none;">{!! $notice->body !!}</textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mb-1 mt-4">
									<div class="row">
										<div class="col-md-12">
											<p class="mb-2">Imágen de la noticia (opcional)</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="input-group mb-3">
												<div class="input-group mb-3">
													<label class="input-group-text" for="image"><i class="bi bi-upload"></i></label>
													<input type="file" class="form-control" id="image" name="image">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<p class="text-center" style="color: red;">*Si no selecciona "Publicar inmediatamente", la noticia estará como borrador y no aparecerá en el sitio web.</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 mt-4 d-flex">
											<div class="col-md-6"><button type="submit" class="btn btn-info">Actualizar noticia</button></div>
											<div class="col-md-6 d-flex justify-content-end"><a href="{{ route('gallery.create', $notice->slug) }}" type="button" class="btn btn-success">Galería de imágenes</a></div>
										</div>
									</div>
								</div>
							</form>
							@if($notice->image != null)
							<div class="col-md-6">
								<form action="{{ route('notice.deleteImage', $notice->slug) }}" class="form-delete" method="POST">
									@csrf
									@method("DELETE")
									<div class="row">
										<div class="col-md-12 mt-4 mb-2">
											<p class="mb-0 text-center">Imágen actual</p>
										</div>
									</div>
									<div class="row d-flex justify-content-center">
										<div class="col-md-6">
											<img src="{{ asset('imagenes/noticias/'.$notice->image) }}" class="img-fluid">
										</div>
									</div>
									<div class="row d-flex justify-content-center">
										<div class="col-md-8 mt-2">
											<button type="submit" class="btn btn-danger btn-block">Eliminar imágen</button>
										</div>
									</div>
								</div>
							</form>
							@else
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12 mt-4">
										<h5 class="text-center" style="color: red;">Esta noticia no cuenta con ninguna imágen.</h5>
									</div>
								</div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

@push('extra-js')
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<script src="{{ asset('dashboard/assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script>
	ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.then( editor => {
		console.log( editor );
	} )
	.catch( error => {
		console.error( error );
	} );
</script>

<script type="text/javascript">
	$('.form-delete').submit(function(e){
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

@endpush