@extends('main')

@section('title', '| Blog')

@section('content')

	<div class="row">
		<div class="col-md-12">

				<h2>Blog List</h2>
			<div class="col-md-12">

				<form action="" method="GET" onsubmit="search()" id="frmsearch">

					<table class="table tabled-bordered">
						<tr>

							<td>
								<input type="text" name="keyword" class="form-control"  placeholder="Search"  value="<?=Request::input('keyword')?>" />
							</td>
							<td>
								<button type="submit" class="btn btn-search btn-block">
									<i class="fa fa-search"></i>Search
								</button>
							</td>

						</tr>
					</table>

				</form>

			</div>

		</div>

		<div class="col-md-12">
			<table id="mytable" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>IDX</th>
						<th>Category</th>
						<th>Title</th>
						<th>Created</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
					<tr>
						<td>{{ str_replace('-','',(($posts->currentpage()-1) *15) - ($cnt--))  }}</td>
						<td>{{ $post->category->name }}</td>
						{{--<td>{{ $post->title }}</td>--}}
						<td><a href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a></td>
						<td>{{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>



		<div class="col-md-12">
			<h4>
				@foreach ($tags as $tag)
					<a href="{!! route('tags.show', $tag->id) !!}"><span class="label label-default">{{ $tag->name }}</span></a>
				@endforeach
			</h4>

		</div>

		<div class="text-center">
			{!! $posts->links() !!}
		</div>
	</div>


@endsection
