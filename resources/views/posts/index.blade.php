@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row">

		<div class="col-md-12">

			<form action="" method="GET" onsubmit="search()" id="frmsearch">

				<table class="table tabled-bordered">
					<tr>
						<td width="20%"  ><h1 style="margin-top: 10px;">All Posts</h1></td>
						<td style="width:35%;vertical-align:middle;">
							<input type="text" name="keyword" class="form-control"  placeholder="Search"  value="<?=Request::input('keyword')?>" />
						</td>
						<td style="width:10%;vertical-align:middle;">
							<button type="submit" class="btn btn-search">
								<i class="fa fa-search"></i>Search
							</button>
						</td>

						<td style="width:15%;vertical-align:middle;">
							{{--<a  href="{ route('posts.create') }" class="btn btn-primary btn-sm pull-right">Create New Post</a>--}}
							<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary" >Create New Post</a>
						</td>

					</tr>
				</table>

			</form>

		</div>


		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Hide</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>

					@forelse ($posts as $post)

						<tr>
							<th>{{ str_replace('-','',(($posts->currentpage()-1) *10) - ($cnt--))  }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
							<td>{{ $post->hide === 1 ? "Yes":"No" }}</td>
							<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a></td>
						</tr>
					@empty
						<p> There is no Records.</p>
					@endforelse
				</tbody>
			</table>



			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>

@stop