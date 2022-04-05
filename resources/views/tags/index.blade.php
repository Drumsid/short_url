@extends('layouts.app')

@section('content')
    <h1>Tags index</h1>
    <a class="btn btn-primary" href="{{ route("tags.create") }}" role="button">Create tag</a>

@endsection
