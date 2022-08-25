@extends('layout.app')

@section('content')

    <h1> Edit Post: {{ $post->title }} </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('posts.update', $post->id) }}" class="col-4" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label">Post Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Post Body</label>
            <input type="text" name='body' class="form-control" value="{{ $post->body }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Post Detailes</label>
            <input type="text" name="details" class="form-control" value="{{ $post->details }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Post Image</label>
            <input type="text" name="image" class="form-control" value="{{ $post->image }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
