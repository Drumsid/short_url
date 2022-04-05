@extends('layouts.app')

@section('content')
    <h1>Links index</h1>
    <a class="btn btn-primary" href="{{ route("links.create") }}" role="button">Create link</a>

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
        @forelse ($links as $key => $link)
            <tr>
                <th>{{ $key + 1 }}</th>
                <td>{{ $link->name }}</td>
                <td>{{ $link->updated_at }}</td>
                <td style="white-space: nowrap; ">
                    <a class="btn btn-primary btn-sm float-left mr-1"
                       href="{{ route("links.show", ['tag' => $link->id]) }}">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-primary btn-sm float-left mr-1"
                       href="{{ route("links.edit", ['tag' => $link->id]) }}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <form action="{{ route('links.destroy', $link) }}" method="post"
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
            <td>No links</td>
        @endforelse

        </tbody>
    </table>
@endsection
