@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-8 offset-2">
				<div class="card">
					<div class="card-header">
						<h3>Editar Rol</h3>
					</div>
					<div class="card-body">
						<form action="{{ route('roles.update', $role->id) }}" method="post">
							@method('PUT')
							@csrf
							<div class="form-group">
								<label for="name">Nombre</label>
								<input type="text" name="name" class="form-control" value="{{ $role->name }}">
							</div>
							<div class="form-group">
								<label for="description">Descripción</label>
								<textarea name="description" class="form-control">{{ $role->description }}</textarea> 
							</div>
							<div class="form-group">
								<label>Permisos Personalizados</label>
								<div class="form-group">
									@foreach($permissions as $permission)
										@php $x = 1; $y = 1; @endphp
										@foreach($role->permissions as $rpermission)
											@if($rpermission->id == $permission->id)
												@php $x = $x + 1; @endphp
												<div class="form-check">
													<input type="checkbox" name="{{ $permission->id }}" class="form-check-input" checked>
													<label for="{{ $permission->id }}" class="form-check-label text-muted"> {{ $permission->name }}({{ $permission->description }})</label>
												</div>
											@endif
										@endforeach
										@if($x == $y)
											<div class="form-check">
												<input type="checkbox" name="{{ $permission->id }}" class="form-check-input">
												<label for="{{ $permission->id }}" class="form-check-label text-muted"> {{ $permission->name }}({{ $permission->description }})</label>
											</div>
										@endif
									@endforeach
								</div>
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
	Editar Rol - 
@endsection