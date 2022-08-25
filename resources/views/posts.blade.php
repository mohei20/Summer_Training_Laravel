@extends('layouts.app')

@section('content')
    <h1> All Posts </h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Details</th>
                <th>Image</th>
                <th>Post Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td> {{ $u['title'] }} </td>
                    <td> {{ $u['body'] }} </td>
                    <td> {{ $u['details'] }} </td>
                    <td><img src="{{ asset('postimages\/') . $post['image'] }}" alt=""></td>
                    <td> <a href="/posts/{{ $u['id'] }}" class="btn btn-primary">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
