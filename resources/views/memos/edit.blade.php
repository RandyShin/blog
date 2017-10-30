@extends('main')

@section('title', '| Edit Comment')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Memo</h1>

            {{ Form::model($memo, ['route' => ['memos.update', $memo->id], 'method' => 'PUT']) }}

            {{ Form::label('memo', 'Memo:') }}
            {{ Form::textarea('memo', null, ['class' => 'form-control']) }}
            {{ Form::submit('Update Memo', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) }}

            {{ Form::close() }}
        </div>
    </div>

@endsection