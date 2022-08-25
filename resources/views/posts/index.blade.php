@extends('layout.app')

@section('title')
    Home
@endsection

@section('content')
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->body }}</td>
                        <td>{{ $p->details }}</td>
                        <td><img src="{{ asset('postimages\/') . $p->image }}" width="50px" height="50px"></td>
                        <td><a href="{{ route('post.show', $p->id) }}" class="btn btn-primary">Show</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('post.create') }}" class="btn btn-success">Create new post</a>
    </div>
@endsection
