@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">Crear Pagina</div>
			<div class="card-body">
				<form action="{{ route('pages.store') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="title">Titulo de la Pagina</label>
						<input type="text" name="title" class="form-control">
					</div>
					<div class="form-group">
						<label for="content">Contenido de la Pagina</label>
						<textarea name="content" id="" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="state">Estado</label>
						<select name="state" class="form-control" id="state">
							<option value="active">Activo</option>
							<option value="inactive">Inactivo</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary float-right">Crear</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('title')
	Crear Pagina -
@endsection