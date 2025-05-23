@extends('folder-main.app')

@section('title', 'Notes')

@section('content')
    <div class="col-6">

        <form class="m-5 p-5 border border-success rounded-5" action="{{ route('intern.note.store') }}" method="post"
            onsubmit="return confirm('Create note?');">
            @csrf
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h3>Create your Note</h3>
            <input type="hidden" name="user_id" value="{{ $user_id }}" />

            <label for="note-title" class="form-label mt-3">Title</label>
            <input type="text" class="form-control my-2 border border-success" id="note-title" name="title" />

            <label for="note-content" class="form-label mt-3">Description</label>
            <textarea type="text" class="form-control my-2 border border-success" id="note-content" name="content"></textarea>

            <input class="btn btn-success my-2 form-control mt-3" type="submit" value="Submit">
        </form>
    </div>

@endsection
