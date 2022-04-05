@extends('layouts.app')

@section('content')
    <h1>Create link</h1>
    <form method="POST" action="{{ route("links.store") }}">
        @csrf
        <div class="mb-3">
            <label for="Link" class="form-label">Link</label>
            <input type="text" name="long_link" class="form-control" id="Link">
        </div>
        <div class="mb-3">
            <label for="Title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="Title">
        </div>
{{--        <div class="mb-3">--}}
{{--            <label for="Tags" class="form-label">Tags</label>--}}
{{--            <input type="text" name="tags" class="form-control" id="Tags">--}}
{{--        </div>--}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
