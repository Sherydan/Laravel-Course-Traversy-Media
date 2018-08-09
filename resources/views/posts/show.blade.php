@extends('layouts.app')

@section('content')
    @if(!empty($post))
        <div class="card mb-2">
            <div class="card-body">
                <h1 class="card-title">{{$post->title}}</h1>
                <p class="card-text">{{$post->body}}</p>
                <small>{{$post->created_at}}</small>

                <a href="/posts" class="btn btn-primary btn-block mt-2">Go Back</a>
            </div>
            
        </div>
    @endif
@endsection