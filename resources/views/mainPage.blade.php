@extends('layouts.app')

@section('content')
    <h1>Hello, world!</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-5 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/post">
                        @csrf
                        <div class="mb-3">
                            <label for="test" class="form-label">Email address</label>
                            <input type="text" name="test" class="form-control" id="test" aria-describedby="emailHelp">
                            <div id="test" class="form-text">Test input</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
