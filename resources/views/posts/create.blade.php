@extends('layout.app')


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 style="width:20%; margin:auto;"> Add new post </h1>
    <form action="{{ route('posts.store') }}" method="POST" class="col-4" style="margin:auto;" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Post Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Post Body</label>
            <input type="text" name='body' class="form-control" value="{{ old('body') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Post Detailes</label>
            <input type="text" name="details" class="form-control" value="{{ old('details') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Post Image</label>
            <input type="file" name="image" value="{{ old('image') }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
