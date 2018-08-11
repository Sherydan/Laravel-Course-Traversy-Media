@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col col-md-12 col-lg-9 col-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="/posts/create" class="btn btn-primary mb-2">Create Post</a>
                    <h3>Your Blog Posts</h3>

                    @if (count($posts)>0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <a href="">
                                                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                                                    {!!Form::hidden('_method', 'DELETE')!!}
                                                    {!!Form::submit('Delete', ['class'=> 'btn btn-danger'])!!}
                                                {!! Form::close() !!}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @else
                        <p>No posts found</p>
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
@endsection
