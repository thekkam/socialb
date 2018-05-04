@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h1 class="text-center">{{ $page->title }}</h1>
			</div>
			<div class="card-body">
				{!! $page->content !!}
			</div>
		</div>
	</div>
@endsection

@section('title')
	 {{ $page->title }} - 
@endsection