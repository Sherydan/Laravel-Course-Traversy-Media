@extends('layouts.app')

@section('content')
    @if(!empty($post))
        <div class="card mb-2">
            <div class="card-body">
                <h1 class="card-title">{{$post->title}}</h1>
                <!-- Colocar "!!" para que se muestre el html, de otra manera se mostrara el string sin las etiquetas -->
                <p class="card-text">{!!$post->body!!}</p>
                <small>Created at: {{$post->created_at}} by: {{$post->user->name}}</small>

                <a href="/posts" class="btn btn-primary btn-block mt-2 mb-2">Go Back</a>
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary float-left">Edit</a>

                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}

                    {!!Form::hidden('_method', 'DELETE')!!}
                    {!!Form::submit('Delete', ['class'=> 'btn btn-danger'])!!}

                {!! Form::close() !!}
            </div>
            
        </div>
    @endif
@endsection