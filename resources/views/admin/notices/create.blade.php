@extends('layouts.admin')

@section('head')
Nueva noticia
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
						<div class="col-6">
							<h3 class="card-tittle">Nueva noticia</h3>
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

				<form method="POST" action="{{ route('notice.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="card-body pt-2">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="title">Título de la noticia</label>
									<input type="text" class="form-control" id="title" name="title" placeholder="Ingrese el título" value="{{ old('title') }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="subtitle">Subtítulo de la noticia (opcional)</label>
									<input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Ingrese el subtítulo" value="{{ old('subtitle') }}">
								</div>
							</div>
							<div class="col-md-4 d-flex align-items-center">
								<div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" id="publish" name="publish">
									<label class="form-check-label" for="publish">Publicar inmediatamente*</label>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12 mt-4">
									<div class="form-group">
										<label for="body" class="form-label">Cuerpo de la noticia</label>
										<textarea class="form-control" name="body" placeholder="Ingresa el cuerpo de la noticia" id="editor" style="display: none;">{!! old('body') !!}</textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 mb-1 mt-4">
									<div class="row">
										<p class="mb-2">Imágen de la noticia (opcional)</p>
									</div>
									<div class="row">
										<div class="input-group mb-3">
											<div class="input-group mb-3">
												<label class="input-group-text" for="image"><i class="bi bi-upload"></i></label>
												<input type="file" class="form-control" id="image" name="image">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex justify-content-end align-items-center">
									<div class="row">
										<p class="text-center" style="color: red;">*Si no selecciona "Publicar inmediatamente", la noticia estará como borrador y no aparecerá en el sitio web.</p>
									</div>
								</div>
							</div>

						</div>
						<div class="row mt-4">
							<div class="col-md-3">
								<button type="submit" class="btn btn-success">Crear noticia</button>
							</div>
						</div>
					</div>
				</form>

			</div>

		</section>
	</div>
</div>

@push('extra-js')

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

@endpush