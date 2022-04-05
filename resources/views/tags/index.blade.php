@extends('layouts.app')

@section('content')
    <h1>Tags index</h1>
    <a class="btn btn-primary mt-5 mb-5" href="{{ route("tags.create") }}" role="button">Create tag</a>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($tags as $key => $tag)
            <tr>
                <th>{{ $key + 1 }}</th>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->updated_at }}</td>
                <td style="white-space: nowrap; ">
                    <a class="btn btn-primary btn-sm float-left mr-1"
                       href="{{ route("tags.show", ['tag' => $tag->id]) }}">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-primary btn-sm float-left mr-1"
                       href="{{ route("tags.edit", ['tag' => $tag->id]) }}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <form action="{{ route('tags.destroy', $tag) }}" method="post"
                          class="float-left d-inline-block" title="Удалить">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Подтвердите удаление')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <td>No tags</td>
        @endforelse

        </tbody>
    </table>

@endsection
