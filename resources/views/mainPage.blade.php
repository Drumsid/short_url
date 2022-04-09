@extends('layouts.app')

@section('content')
    <h1>Create new short link!</h1>
    <a class="btn btn-sm btn-primary" href="{{ route("links.create") }}">Create!</a>

@endsection
