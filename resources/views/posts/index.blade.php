@extends('layouts.app')

@section('content')
    @if(!empty($posts))
        @foreach($posts as $post)
            <div class="card mb-2">
                <div class="card-body">
                    <h1 class="card-title"> <a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
                    <p class="card-text">{!!$post->body!!}</p>
                    <small>Created at: {{$post->created_at}} by: {{$post->user->name}}</small>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @endif
@endsection