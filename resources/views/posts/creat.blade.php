@extends('layout.app')

@section('content')
    <h1 style="width:20%; margin:auto;"> Add new post </h1>
    <form action="{{ route('post.store') }}" method="POST" class="col-4" style="margin:auto;">
        @csrf
        <div class="mb-3">
            <label class="form-label">Post Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Body</label>
            <input type="text" name='body' class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Detailes</label>
            <input type="text" name="details" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Image</label>
            <input type="text" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
