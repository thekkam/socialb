@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-6 offset-3">
				<div class="card">
					<div class="card-header">
						<h3>Crear Menú</h3>
					</div>
					<div class="card-body">
						<form action="{{ route('menus.store') }}" method="post">
							@csrf
							<div class="form-group">
								<label for="name">Nombre</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="access">Acceso</label>
								<select name="access" class="form-control" id="access">
									<option value="public">Publico</option>
									<option value="private">Privado</option>
								</select>
							</div>
							<div class="form-group">
								<label for="state">Estado</label>
								<select name="state" class="form-control" id="state">
									<option value="active">Activo</option>
									<option value="inactive">Inactivo</option>
								</select>
							</div>
							<div class="form-group">
								<label for="order">Orden</label>
								<input type="number" name="order" class="form-control">
							</div>
							<div class="form-group">
								<label for="parent_id">Menú Padre</label>
								<select name="parent_id" class="form-control" id="parent_id">
									<option value="">Sin Menú Padre</option>
									@foreach($menus as $menu)
										<option value="{{ $menu->id }}">{{ $menu->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="page_id">Enlazar Pagina</label>
								<select name="page_id" class="form-control" id="page_id">
									<option value="">Sin Enlace</option>
									@foreach($pages as $page)
										<option value="{{ $page->id }}">{{ $page->title }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary float-right">Crear</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('title')
	Crear Menú - 
@endsection