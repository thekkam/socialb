@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
			<h3 class="float-left">Lista de Roles</h3>
			@can('roles.create')
				<a href="{{ route('roles.create') }}" class="btn btn-primary float-right">Crear Rol</a>
			@endcan
		</div>
		<div class="card-body">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($roles as $role)
						<tr>
							<td>{{ $role->id }}</td>
							<td>{{ $role->name }}</td>
							@can('role.edit')
								@if($role->id == 1 || $role->id == 2)
								 	<td></td>
								@else
								<td><a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-light">Editar</a></td>
								@endif
							@endcan
							@can('role.destroy')
								@if($role->id == 1 || $role->id == 2)
									<td></td>
								@else
								<td><a href="{{ route('roles.destroy', ['id' => $role->id]) }}" class="btn btn-danger">Eliminar</a></td>
								@endif
							@endcan
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		</div>
	</div>
	<div class="mt-4 container d-flex justify-content-center">
		{{ $roles->links() }}
	</div>
@endsection

@section('title')
	Indice de Roles -
@endsection