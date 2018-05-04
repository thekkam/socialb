@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-8 offset-2">
				<div class="card">
					<div class="card-header">
						<h3>Crear Rol</h3>
					</div>
					<div class="card-body">
						<form action="{{ route('roles.store') }}" method="post">
							@csrf
							<div class="form-group">
								<label for="name">Nombre</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="description">Descripción</label>
								<textarea name="description" class="form-control"></textarea> 
							</div>
							<div class="form-group">
								<label>Permisos Personalizados</label>
								<div class="form-group">
									@foreach($permissions as $permission)
									<div class="form-check">
										<input type="checkbox" name="{{ $permission->id }}" class="form-check-input">
										<label for="{{ $permission->id }}" class="form-check-label text-muted"> {{ $permission->name }}({{ $permission->description }})</label>
									</div>
									@endforeach
								</div>
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
	Crear Rol - 
@endsection