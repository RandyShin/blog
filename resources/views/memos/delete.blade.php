@extends('main')

@section('title', '| DELETE Memo?')

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>DELETE THIS COMMENT?</h1>


			{{ Form::open(['route' => ['memos.destroy', $memo->id], 'method' => 'DELETE']) }}
				{{ Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) }}
			{{ Form::close() }}
		</div>
	</div>

@endsection