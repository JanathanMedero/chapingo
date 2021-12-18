@extends('layouts.admin')

@section('head')
Editar usuario: {{ $user->name }}
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
							<h3 class="card-tittle">Usuario: {{ $user->name }}</h3>
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
				<form action="{{ route('users.update', $user->slug) }}" method="POST">
					@method("PUT")
					@csrf
					<div class="card-body pt-2">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="name">Nombre</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Ingresa el nombre" value="{{ $user->name }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="email">Correo electrónico</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Ingresa el correo electrónico" value="{{ $user->email }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group mt-4">
									<label class="input-group-text" for="role">Selecciona un rol</label>
									<select class="form-select" id="role" name="role">
										<option value="administrator" {{ $user->hasRole('administrator') ? 'selected' : '' }}>Administrador</option>
										<option value="moderator" {{ $user->hasRole('moderator') ? 'selected' : '' }}>Moderador</option>
										<option value="redactor" {{ $user->hasRole('redactor') ? 'selected' : '' }}>Redactor</option>
									</select>
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


		<form action="{{ route('user.password.update', $user->slug) }}" method="POST">
			@csrf
			@method("PUT")
			<div class="card">
				<card-header class="my-4 mx-4">
					<div class="row">
						<div class="col-6">
							<h3 class="card-tittle">Cambio de contraseña</h3>
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-md-4">
							<div class="form-group">
								<label for="password">Ingresa la nueva contraseña</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Ingresa la contraseña">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="password_confirmation">Repetir Contraseña</label>
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repite la contraseña">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 mt-4">
							<button type="submit" class="btn btn-danger">Actualizar contraseña</button>
						</div>
					</div>

				</card-header>
			</div>
		</form>

		<div class="card">
			<card-header class="my-4 mx-4">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<h3 class="card-tittle">Cambiar foto de perfil</h3>
						</div>
					</div>
				</div>

				
				<div class="col-md-6 mb-1 mt-4">
					<div class="row">
						<div class="col-md-12">
							<form action="{{ route('avatar.store', $user->slug) }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<p class="mb-2">Selecciona una foto de perfil</p>
								</div>
								<div class="row">
									<div class="input-group mb-3">
										<div class="input-group mb-3">
											<label class="input-group-text" for="image"><i class="bi bi-upload"></i></label>
											<input type="file" class="form-control" id="image" name="image">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4 mt-4">
										<button type="submit" class="btn btn-success">Actualizar foto de perfil</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				@if($user->avatar == 'no-image')
				<div class="col-md-6 d-flex justify-content-center align-items-center">
					<div class="row">
						<h3 style="color: red;">Este usuario no cuenta con foto de perfil</h3>
					</div>
				</div>
				@else
				<div class="col-md-6">
					<form>
						<div class="row d-flex justify-content-center">
							<div class="col-md-3">
								<div class="row">
									<div class="col-md-12">
										<img src="{{ asset('imagenes/avatars/'.$user->avatar) }}" class="img-fluid">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<p class="mb-0 text-center mt-2"><strong>Foto de perfíl actual</strong></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-danger">Actualizar contraseña</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				@endif
			</card-header>
		</div>
	</div>
</div>

</div>