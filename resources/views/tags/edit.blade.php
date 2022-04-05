@extends('layouts.app')

@section('content')
    <h1>Create tag</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route("tags.update", ["tag" => $tag->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Link" class="form-label">Tag name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="Link" value="{{ $tag->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
