@extends('layouts.app')

@section('content')
    <h1>Show tag</h1>
    <p>Tag Name: {{ $tag->name }}</p>
    <p>Tag Date: {{ $tag->updated_at }}</p>

    <a class="btn btn-primary mt-5 mb-5"
       href="{{ route("tags.edit", ["tag" => $tag->id]) }}"
       role="button">Edite tag</a>

@endsection
