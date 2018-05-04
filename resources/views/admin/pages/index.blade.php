@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
			<h3 class="float-left">Lista de Paginas</h3>
			@can('pages.create')
				<a href="{{ route('pages.create') }}" class="btn btn-primary float-right">Crear Pagina</a>
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
					@foreach($pagesi as $page)
						<tr>
							<td>{{ $page->id }}</td>
							<td>{{ $page->title }}</td>
							@can('pages.edit')
								<td><a href="{{ route('pages.edit', ['id' => $page->id]) }}" class="btn btn-light">Editar</a></td>
							@endcan
							@can('pages.destroy')
								<td><a href="{{ route('pages.destroy', ['id' => $page->id]) }}" class="btn btn-danger">Eliminar</a></td>
							@endcan
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		</div>
	</div>
	<div class="mt-4 container d-flex justify-content-center">
		{{ $pagesi->links() }}
	</div>
@endsection

@section('title')
	Indice de Paginas -
@endsection