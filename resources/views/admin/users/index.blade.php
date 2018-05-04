@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
			<h3 class="float-left">Lista de Paginas</h3>
			@can('users.create')
				<a href="{{ route('users.create') }}" class="btn btn-primary float-right">Crear Usuario</a>
			@endcan
		</div>
		<div class="card-body">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Rol</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>
								@forelse($user->roles as $role) 
									{{ $role->name }} 
								@empty
									Sin Rol
								@endforelse</td>
							@can('users.edit')
								<td><a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-light">Editar</a></td>
							@endcan
							@can('users.destroy')
								<td><a href="{{ route('users.destroy', ['id' => $user->id]) }}" class="btn btn-danger">Eliminar</a></td>
							@endcan
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		</div>
	</div>
	<div class="mt-4 container d-flex justify-content-center">
		{{ $users->links() }}
	</div>
@endsection

@section('title')
	Indice de Usuarios -
@endsection