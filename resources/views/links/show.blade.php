@extends('layouts.app')

@section('content')
    <h1>Show link</h1>
    <p>Link title: {{ $link->title }}</p>
    <p>Short link: <a href="{{ $link->short_link }}" target="_blank">{{ $link->short_link }}</a></p>
    <p>Long link: {{ $link->long_link }}</p>
    <p>Link Tags: {{$link->tags->pluck('name')->join(', ')}}</p>
    <p>Link Date: {{ $link->updated_at }}</p>

    <a class="btn btn-primary mt-5 mb-5"
       href="{{ route("links.edit", ["link" => $link->id]) }}"
       role="button">Edite link</a>

@endsection
