@extends('main')

@section('title', '| All Tags')

@section('content')

	<div class="row">

		<div class="col-md-12">
			<div class="well">
				<h2>New Memo</h2>
				{!! Form::open(['route' => 'memos.store', 'method' => 'POST']) !!}

				{{ Form::label('memo', 'Memo:') }}
				{{ Form::textarea('memo', null, ['class' => 'form-control', 'rows' => '4']) }}
				{{ Form::submit('Create New Memo', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

				{!! Form::close() !!}
			</div>
		</div>



		<div class="col-md-12">
			<h1>Memos</h1>
			<table id="mytable" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="50px">IDX</th>
						<th>Memo</th>
						<th width="10%">Created</th>
						<th width="70px">Action</th>

					</tr>
				</thead>

				<tbody>
					@foreach ($memos as $memo)
					<tr>
						<th>{{ $cnt-- }}</th>
						<th><pre>{{ $memo->memo }}</pre></th>
						<th width="10%">{{ Carbon\Carbon::parse($memo->created_at)->format('Y-m-d') }}</th>
						<th>
							<div>
								<div style="float: left;">
									<a href="{{ route('memos.edit', $memo->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								</div>
								<div style="float: right">
									{{--<a href="{{ route('memos.destroy', $memo->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>--}}
									{!! Form::open(['route' => ['memos.destroy', $memo->id], 'method' => 'DELETE', 'class'=>'form-horizontal','onsubmit' => 'return confirm("are you sure ?")']) !!}
									{{--{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}--}}

									{{Form::button('<i class=""></i>', array('type' => 'Delete', 'class' => 'btn btn-xs btn-danger glyphicon glyphicon-trash'))}}

									{!! Form::close() !!}
								</div>
							</div>


						</th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->


	</div>


@endsection

