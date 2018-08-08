
@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>

    @if(!empty($services))
        @foreach($services as $service)
            <ul class="list-group">
                <li class="list-group-item">{{$service}}</li>
            </ul>
        @endforeach
    @endif

@endsection
