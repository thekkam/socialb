@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3>Editar Pagina</h3>
			</div>
			<div class="card-body">
				<form action="{{ route('pages.update', $page->id) }}" method="post">
					@method('PUT')
					@csrf
					<div class="form-group">
						<label for="title">Titulo de la Pagina</label>
						<input type="text" name="title" class="form-control" value="{{ $page->title }}">
					</div>
					<div class="form-group">
						<label for="title"></label>
						<textarea name="content" id="" class="form-control">{{ $page->content }}</textarea>
					</div>
					<div class="form-group">
						<label for="state">Estado</label>
						<select name="state" class="form-control" id="state">
							@if($page->state == 'active')
								<option value="active">Activo</option>
								<option value="inactive">Inactivo</option>
							@else
								<option value="inactive">Inactivo</option>
								<option value="active">Activo</option>
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
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('title')
	Editar Pagina -
@endsection