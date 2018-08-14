@extends('layouts.app')

@section('content')
    @if(!empty($posts))
        @foreach($posts as $post)
            <div class="card mb-2">
                    
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-4">
                                <img style="width: 100%" class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
                        </div>

                        <div class="col col-md-8">
                                <h1 class="card-title"> <a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
                                <p class="card-text">{!!$post->body!!}</p>
                                <small>Created at: {{$post->created_at}} by: {{$post->user->name}}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @endif
@endsection