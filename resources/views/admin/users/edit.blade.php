@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-6 offset-3">
			<div class="card">
				<div class="card-header">
					<h3>Editar Usuario</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('users.update', $user->id) }}" method="post">
						@method('PUT')
						@csrf
						<div class="form-group">
							<label for="name">Nombre</label>
							<input type="text" name="name" value="{{ $user->name }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="name">Correo Electronico</label>
							<input type="text" name="email" value="{{ $user->email }}" class="form-control">
						</div>
						<div class="form-group">
							<label for="rol">Rol</label>
							<select name="rol" id="" class="form-control">
								@forelse($user->roles as $urole)
									@foreach($roles as $role)
										@if($role->id == $urole->id)
											<option value="{{ $role->id }}">{{ $role->name }}</option>
										@endif
									@endforeach
									@foreach($roles as $role)
										@if($role->id != $urole->id)
											<option value="{{ $role->id }}">{{ $role->name }}</option>
										@endif
									@endforeach
									<option value="none">Quitar Rol</option>
								@empty
									<option value="none">Sin Rol</option>
									@foreach($roles as $role)
										<option value="{{ $role->id }}">{{ $role->name }}</option>
									@endforeach
								@endforelse
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
@endsection

@section('title')
	Editar Usuario -
@endsection