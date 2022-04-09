@extends('layouts.app')

@section('content')
    <h1>Statistics index</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Short link</th>
            <th scope="col">Long link</th>
            <th scope="col">Total views</th>
            <th scope="col">Uniq views</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($statistics as $key => $stat)
            <tr>
                <th>{{ $key + 1 }}</th>
                <td>{{ $stat->title }}</td>
                <td>{{ $stat->short_link }}</td>
                <td>{{ $stat->long_link }}</td>
                <td>{{ $stat->linkStatistics->count() }}</td>
                <td>{{ $stat->linkStatistics->groupBy("user_ip")->count() }}</td>
            </tr>
        @empty
            <td>No links</td>
        @endforelse

        </tbody>
    </table>

@endsection
