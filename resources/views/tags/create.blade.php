@extends('layouts.app')

@section('content')
    <h1>Create tag</h1>
    <form method="POST" action="{{ route("tags.store") }}">
        @csrf
        <div class="mb-3">
            <label for="Link" class="form-label">Tag name</label>
            <input type="text" name="name" class="form-control" id="Link">
        </div>
{{--        <div class="mb-3">--}}
{{--            <label for="Title" class="form-label">Title</label>--}}
{{--            <input type="text" name="title" class="form-control" id="Title">--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <label for="Tags" class="form-label">Tags</label>--}}
{{--            <input type="text" name="tags" class="form-control" id="Tags">--}}
{{--        </div>--}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
