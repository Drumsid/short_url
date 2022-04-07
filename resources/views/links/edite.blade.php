@extends('layouts.app')

@section('content')
    <h1>Edite link</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route("links.update", ["link" => $link->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="Title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="Title" value="{{ $link->title }}">
        </div>
        <div class="form-group mb-3">
            <label for="Link" class="form-label">Link</label>
            <input type="text" name="long_link" class="form-control" id="Link" value="{{ $link->long_link }}">
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select class="form-control" data-placeholder="Choose tags" id="tags" name="tags[]" multiple="multiple">
                @foreach($tags as $id => $tag)
                    <option @if (in_array($id, $link->tags->pluck('id')->all())) selected @endif
                    value="{{$id}}">{{$tag}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>

@endsection
