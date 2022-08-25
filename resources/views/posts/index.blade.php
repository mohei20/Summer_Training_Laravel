@extends('layout.app')

@section('title')
    Posts
@endsection

@section('content')
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delet</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $p)
                    <tr>
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->body }}</td>
                        <td>{{ $p->details }}</td>
                        <td><img src='{{ asset('postimages/' . $p->image) }}' width="50px" height="50px"></td>
                        <td><a href="{{ route('posts.show', $p->id) }}" class="btn btn-primary">Show</a></td>
                        <td><a href="{{ route('posts.edit', $p->id) }}" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="{{ route('posts.destroy', $p->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create new post</a>
    </div>
@endsection
