@extends('layouts.admin')

@section('head')
Galería de imágenes
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
							<h3 class="card-tittle">Galería de imágenes</h3>
						</div>
					</div>
				</card-header>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<h5 style="color: red;">Esta noticia no tiene galería de imágenes</h5>
						</div>
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
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-success">Crear galería</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>