@extends('layouts.admin')

@section('head')
Crear nuevo usuario
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
							<h3 class="card-tittle">Nuevo usuario</h3>
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
				<form action="{{ route('users.store') }}" method="POST">
					@csrf
					<div class="card-body pt-2">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Nombre</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Ingresa el nombre" value="{{ old('name') }}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Correo electrónico</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Ingresa el correo electrónico" value="{{ old('email') }}">
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-4">
								<div class="form-group">
									<label for="password">Contraseña</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Ingresa la contraseña">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="password_confirmation">Repetir Contraseña</label>
									<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repite la contraseña">
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group mt-4">
									<label class="input-group-text" for="role">Selecciona un rol</label>
									<select class="form-select" id="role" name="role">
										<option value="administrator">Administrador</option>
										<option value="moderator">Moderador</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-3">
								<button type="submit" class="btn btn-success">Agregar usuario</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>

</div>
@endsection