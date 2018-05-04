@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-6 offset-3">
				<div class="card">
					<div class="card-header">
						<h3>Editar Menú</h3>
					</div>
					<div class="card-body">
						<form action="{{ route('menus.update', $menu->id) }}" method="post">
							@method('PUT')
							@csrf
							<div class="form-group">
								<label for="name">Nombre</label>
								<input type="text" name="name" class="form-control" value="{{ $menu->name }}">
							</div>
							<div class="form-group">
								<label for="access">Acceso</label>
								<select name="access" class="form-control" id="access">
									@if($menu->access == 'public')
										<option value="public">Publico</option>
										<option value="private">Privado</option>
									@else
										<option value="private">Privado</option>
										<option value="public">Publico</option>
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="state">Estado</label>
								<select name="state" class="form-control" id="state">
									@if($menu->state == 'active')
										<option value="active">Activo</option>
										<option value="inactive">Inactivo</option>
									@else
										<option value="inactive">Inactivo</option>
										<option value="active">Activo</option>
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="order">Orden</label>
								<input type="number" name="order" class="form-control" value="{{ $menu->order }}">
							</div>
							<div class="form-group">
								<label for="parent_id">Menú Padre</label>
								<select name="parent_id" class="form-control" id="parent_id">
									@if($menu->parent_id == null)
										<option value="">Sin Menú Padre</option>
										@foreach($menus as $menu)
											<option value="{{ $menu->id }}">{{ $menu->name }}</option>
										@endforeach
									@else
										@foreach($menus as $menuf)
											@if($menuf->id == $menu->parent_id)
												<option value="{{ $menuf->id }}">{{ $menuf->name }}</option>
											@endif
										@endforeach
										<option value="">Sin Menú Padre</option>
										@foreach($menus as $menuf)
											@if($menuf->id != $menu->parent_id)
												<option value="{{ $menuf->id }}">{{ $menuf->name }}</option>
											@endif
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="page_id">Enlazar Pagina</label>
								<select name="page_id" class="form-control" id="page_id">
									@if($menu->page_id == null)
										<option value="">Sin Enlace</option>
										@foreach($pages as $page)
											<option value="{{ $page->id }}">{{ $page->title }}</option>
										@endforeach
									@else
										@foreach($pages as $page)
											@if($page->id == $menu->page_id)
												<option value="{{ $page->id }}">{{ $page->title }}</option>
											@endif
										@endforeach
										<option value="">Sin Enlace</option>
										@foreach($pages as $page)
											@if($page->id != $menu->page_id)
												<option value="{{ $page->id }}">{{ $page->title }}</option>
											@endif
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary float-right">Editar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('title')
	Editar Menú
@endsection