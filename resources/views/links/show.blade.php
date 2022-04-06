@extends('layouts.app')

@section('content')
    <h1>Show link</h1>

    <p>Link title: {{ $link->title }}</p>
    <p>Short link: <a href="/{{ $link->short_link }}" target="_blank">{{ $link->short_link }}</a></p>
    <p>Long link: {{ $link->long_link }}</p>
    <p>Link Tags: {{$link->tags->pluck('name')->join(', ')}}</p>
    <p>Link Date: {{ $link->updated_at }}</p>

    <a class="btn btn-primary mt-5 mb-5"
       href="{{ route("links.edit", ["link" => $link->id]) }}"
       role="button">Edite link</a>

    <h1>Show link statistic</h1>
    <p>Total views: {{ $link->linkStatistics->count() }}</p>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Short link</th>
            <th scope="col">Long link</th>
            <th scope="col">Tags</th>
            <th scope="col">User agent</th>
            <th scope="col">User ip</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($link->sort() as $key => $stat)
            <tr>
                <th>{{ $key + 1 }}</th>
                <td>{{ $link->title }}</td>
                <td><a href="/{{ $link->short_link }}" target="_blank">{{ $link->short_link }}</a></td>
                <td>{{ $link->long_link }}</td>
                <td>{{$link->tags->pluck('name')->join(', ')}}</td>
                <td>{{ $stat->user_agent }}</td>
                <td>{{ $stat->user_ip }}</td>
                <td>{{ $stat->updated_at }}</td>
            </tr>
        @empty
            <td>No links</td>
        @endforelse

        </tbody>
    </table>

@endsection
