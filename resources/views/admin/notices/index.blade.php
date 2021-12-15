@extends('layouts.admin')

@section('head')
Tabla de noticias
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
							<h3 class="card-tittle">Tabla de noticias</h3>
						</div>
						<div class="col-6 d-flex justify-content-end">
							<a href="{{ route('notice.create') }}" class="btn btn-success">Nueva noticia</a>
						</div>
					</div>
				</card-header>
				<div class="card-body">
					<div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
						<div class="dataTable-container">
							<table class="table table-striped dataTable-table">
								<thead>
									<tr>
										<th><a href="#" class="dataTable-sorter">Id</a></th>
										<th><a href="#" class="dataTable-sorter">Título</a></th>
										<th><a href="#" class="dataTable-sorter">Imágen</a></th>
										<th><a href="#" class="dataTable-sorter">Estatus</a></th>
										<th class="text-center"><a href="#" class="dataTable-sorter">Acciones</a></th>
									</tr>
								</thead>
								<tbody>
									@foreach($notices as $notice)
									<tr>
										<td>{{ $notice->id }}</td>
										<td>{{ $notice->title }}</td>
										<td>
											@if($notice->image == null)
												<p class="mb-0">No se insertó imágen</p>
											@else
											<img src="{{ asset('imagenes/noticias/'.$notice->image) }}" class="img-fluid" style="width: 70px;">
											@endif
										</td>
										<td>
											@if($notice->publish == 1)
											<span class="badge bg-success">Publicado</span>
											@else
											<span class="badge bg-danger">Borrador</span>
											@endif
										</td>
										<td>
											<div class="d-flex justify-content-around">
												<div class="col-4">
													<a href="#" class="btn btn-info btn-block">Editar</a>
												</div>
												<form method="POST" class="form-delete" action="#">
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
							{{-- {{ $users->links('custom-paginate') }} --}}
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>