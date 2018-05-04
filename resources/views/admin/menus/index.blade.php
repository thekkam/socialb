@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<h3 class="float-left">Lista de Menús</h3>
			@can('menus.create')
			<a href="{{ route('menus.create') }}" class="btn btn-primary float-right">Crear Menú</a>
			@endcan
		</div>
		<div class="card-body">
			<table class="table">
				<thead>
					<tr>
						<th>Orden</th>
						<th>Nombre</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($menus as $menu)
						<tr>
							<td>{{ $menu->order }}</td>
							<td>{{ $menu->name }}</td>
							@can('menus.edit')
								<td><a href="{{ route('menus.edit', [$menu->id]) }}" class="btn btn-light">Editar</a></td>
							@endcan
							@can('menus.destroy')
								<td><a href="{{ route('menus.destroy', ['id' => $menu->id]) }}" class="btn btn-danger">Eliminar</a></td>
							@endcan
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('title')
	Administrar Menús
@endsection