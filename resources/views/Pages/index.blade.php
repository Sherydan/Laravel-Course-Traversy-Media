@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1 class="display-4">{{$title}}</h1>
      
        <hr class="my-4">
        <p>This is a laravel application from the "laravel from scratch" youtube series</p>
        
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg" role="button">{{ __('Login') }}</a>
        <a href="{{ route('register') }}" class="btn btn-success btn-lg" role="button">{{ __('Register') }}</a>
        
    </div>
@endsection

