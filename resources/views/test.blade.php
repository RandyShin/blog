@extends('main')

@section('title', '| All Tags')

@section('content')


    <div class="container">
        <h1>List</h1>
            <hr>
                <ul>
                    @forelse($posts as $post)
                        <li>
                            {{ $post->title }}
                            <small>
                                and {{ $post->category->name}}

                            </small>
                        </li>
                    @empty
                        <p>there is no record</p>
                    @endforelse
                </ul>
        <hr>
        @if($posts->count())
            <div class="text-center">
                {!! $posts->render() !!}
            </div>
        @endif
    </div>  {{--end container--}}

@endsection

