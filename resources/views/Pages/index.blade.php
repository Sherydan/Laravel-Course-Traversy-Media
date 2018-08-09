@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1 class="display-4">{{$title}}</h1>
      
        <hr class="my-4">
        <p>This is a laravel application from the "laravel from scratch" youtube series</p>
        
        <a href="#" class="btn btn-primary btn-lg" role="button">Login</a>
        <a href="#" class="btn btn-success btn-lg" role="button">Register</a>
        
    </div>
@endsection

