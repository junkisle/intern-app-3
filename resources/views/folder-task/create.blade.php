@extends('folder-main.app')

@section('title', 'Tasks')

@section('content')
    <div class="col-6">

        <form class="m-5 p-5 border border-success rounded-5" action="{{ route('intern.task.store') }}" method="post"
            onsubmit="return confirm('Are you sure you want to create this task?');">
            @csrf
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h3>Create a Task</h3>
            <input type="hidden" name="user_id" value="{{ $user_id }}" />

            <label for="task-title" class="form-label mt-3">Title</label>
            <input type="text" class="form-control my-2 border border-success" id="task-title" name="task_title" />

            <input type="hidden" name="status" value="Pending" />

            <label for="task-description" class="form-label mt-3">Description</label>
            <textarea type="text" class="form-control my-2 border border-success" id="task-description" name="task_description"></textarea>

            <label for="deadline" class="form-label mt-3">Deadline</label>
            <input type="date" class="form-control my-2 border border-success" id="deadline" name="deadline" />

            <input class="btn btn-success my-2 form-control mt-3" type="submit" value="Submit">
        </form>
    </div>

@endsection
