@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <!-- en el action, se le debe pasar un arreglo con el metodo y la id del post a actualizar -->
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class'=>'form-control', 'placeholder' => 'Post Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Post Body'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}

    
@endsection