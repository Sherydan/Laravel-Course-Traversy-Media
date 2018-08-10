@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col col-md-12 col-lg-9 col-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="/posts/create" class="btn btn-primary mb-2">Create Post</a>
                    <h3>Your Blog Posts</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
