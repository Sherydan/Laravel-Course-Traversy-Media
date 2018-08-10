@extends('layouts.app')

@section('content')
    @if(!empty($post))
        <div class="card mb-2">
            <div class="card-body">
                <h1 class="card-title">{{$post->title}}</h1>
                <!-- Colocar "!!" para que se muestre el html, de otra manera se mostrara el string sin las etiquetas -->
                <p class="card-text">{!!$post->body!!}</p>
                <small>Created at: {{$post->created_at}}</small>

                <a href="/posts" class="btn btn-primary btn-block mt-2">Go Back</a>
            </div>
            
        </div>
    @endif
@endsection