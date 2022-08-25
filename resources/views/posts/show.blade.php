@extends('layout.app')

@section('content')
    <h1 style="width: 20%; margin:auto;"> Post Info </h1>
    <div class="card" style="width: 50%; margin:auto;">
        <img src="{{ asset('postimages/' . $post->image) }}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Title: {{ $post->title }}</h5>
            <p class="card-text"> Body: {{ $post->body }}</p>
            <p class="card-text"> Details: {{ $post->details }}</p>
            <p class="card-text">created_at: {{ $post->created_at }}</p>
            <p class="card-text">updated_at: {{ $post->updated_at }}</p>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
