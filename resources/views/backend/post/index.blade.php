@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Titel</th>
                                <th scope="col">Datum</th>
                                <th scope="col">Aktionen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <a href="{{ route('post.detail', ['post' => $post->id]) }}">Ansehen</a>
                                        <a href="{{ route('post.edit', ['post' => $post->id]) }}">Bearbeiten</a>
                                        <a href="{{ route('post.delete', ['post' => $post->id]) }}">Löschen</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $posts->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection