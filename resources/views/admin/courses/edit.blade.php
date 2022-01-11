@extends('layouts.admin')

@section('head')
Editar carrera - {{ $course->name }}
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
							<h3 class="card-tittle">{{ $course->name }}</h3>
						</div>
					</div>
				</card-header>

				<form method="POST" action="{{ route('course.update', $course->slug) }}" enctype="multipart/form-data">
					@method("PUT")
					@csrf
					<div class="card-body pt-2">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Nombre de la carrera</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre de la carrera" value="{{ $course->name }}">
								</div>
							</div>

							<div class="col-md-6">
								<p class="mb-0">Imágen de la carrera</p>
								<div class="input-group mb-3">
									<label class="input-group-text" for="image"><i class="bi bi-upload"></i></label>
									<input type="file" class="form-control" id="image" name="image">
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6 mt-4">
									<div class="form-group">
										<label for="description" class="form-label">Descripción</label>
										<textarea class="form-control" name="description" placeholder="Ingresa la descripción de la carrera" style="resize: none;" rows="5">{{ $course->description }}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row d-flex justify-content-center">
										<div class="col-md-4 mt-4">
											<img src="{{ asset('imagenes/carreras/'.$course->image) }}" class="img-fluid">
										</div>
									</div>
								</div>
							</div>

							

						</div>
						<div class="row mt-4">
							<div class="col-md-3">
								<button type="submit" class="btn btn-info">Actualizar datos</button>
							</div>
						</div>
					</div>
				</form>

			</div>
		</section>
	</div>
</div>