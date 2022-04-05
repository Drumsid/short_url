@extends('layouts.app')

@section('content')
    <h1>Links index</h1>
    <a class="btn btn-primary" href="{{ route("links.create") }}" role="button">Create link</a>

@endsection
