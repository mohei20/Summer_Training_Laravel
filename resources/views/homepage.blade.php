@extends('layout.app')

@section('title')
    Home
@endsection

@section('table')
    <table class="table">
        <h1> All Posts </h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $p)
                    <tr>
                        <td> {{ $p['title'] }} </td>
                        <td> {{ $p['body'] }} </td>
                        <td> {{ $p['details'] }} </td>
                    </tr>
                @endforeach
        </table>
    @endsection
