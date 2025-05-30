@extends('folder-main.app')

@section('title', 'Tasks')

@section('content')

    @php
        use Illuminate\Support\Str;
    @endphp

    <div class="container-fluid px-3">
        <div class="row justify-content-between align-items-center mb-3 border-bottom border-success-subtle pb-2">
            <div class="col d-flex justify-content-between align-items-center">
                <h1 class="m-0">Tasks</h1>
                <a href="{{ route('intern.task.create', ['user_id' => $userId]) }}" class="text-success fs-2">
                    <i class="bi bi-plus-square"></i>
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Pending -->
            <div
                class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4 mx-1 border border-success rounded-5 p-3 d-flex flex-column">
                <h3 class="border-bottom border-success pb-2">Pending</h3>
                <div class="overflow-y-auto" style="height: 40vh">
                    @foreach ($Tasks as $index => $Task)
                        @if ($userId === $Task->user_id && $Task->status === 'Pending')
                            <a href="#task-content-{{ $index }}" onclick="showTask({{ $index }})"
                                class="text-decoration-none">
                                <div class="card border border-warning rounded-4 my-2 px-3 pb-3 pt-2 h-25 overflow-hidden">
                                    <h5 class="p-2 border-bottom border-success">{{ $Task->task_title }}</h5>
                                    <p class="px-2 pb-2">{{ Str::limit($Task->task_description, 35) }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Ongoing -->
            <div
                class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4 mx-1 border border-success rounded-5 p-3 d-flex flex-column">
                <h3 class="border-bottom border-success pb-2">Ongoing</h3>
                <div class="overflow-y-auto" style="height: 40vh">
                    @foreach ($Tasks as $index => $Task)
                        @if ($userId === $Task->user_id && $Task->status === 'Ongoing')
                            <a href="#task-content-{{ $index }}" onclick="showTask({{ $index }})"
                                class="text-decoration-none">
                                <div class="card border border-warning rounded-4 my-2 px-3 pb-3 pt-2 h-25 overflow-hidden">
                                    <h5 class="p-2 border-bottom border-success">{{ $Task->task_title }}</h5>
                                    <p class="px-2">{{ Str::limit($Task->task_description, 35) }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Completed -->
            <div
                class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4 mx-1 border border-success rounded-5 p-3 d-flex flex-column">
                <h3 class="border-bottom border-success pb-2">Completed</h3>
                <div class="overflow-y-auto" style="height: 40vh">
                    @foreach ($Tasks as $index => $Task)
                        @if ($userId === $Task->user_id && $Task->status === 'Completed')
                            <a href="#task-content-{{ $index }}" onclick="showTask({{ $index }})"
                                class="text-decoration-none">
                                <div class="card border border-warning rounded-4 my-2 px-3 pb-3 pt-2 h-25 overflow-hidden">
                                    <h5 class="p-2 border-bottom border-success">{{ $Task->task_title }}</h5>
                                    <p class="px-2">{{ Str::limit($Task->task_description, 35) }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>

        <div class="col-12">
            @foreach ($Tasks as $index => $Task)
                @if ($userId === $Task->user_id)
                    <div class="task-content border border-primary rounded-4 my-2 px-3 pb-3 pt-2 h-25 overflow-hidden"
                        id="task-content-{{ $index }}" style="display: {{ $loop->first ? 'block' : 'none' }};">
                        <span class="d-flex justify-content-between align-items-center pb-2 border-bottom border-success">
                            <div>
                                <h3 class="">
                                    {{ $Task->task_title }}
                                </h3>
                                <form action="{{ route('intern.task.update-status', ['task' => $Task->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" id="status"
                                        class="form-control border border-success bg-light-subtle "
                                        onchange="this.form.submit()" style="width: 10vw;">
                                        <optgroup label="Status">
                                            <option value="Pending" {{ $Task->status == 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="Ongoing" {{ $Task->status == 'Ongoing' ? 'selected' : '' }}>
                                                Ongoing</option>
                                            <option value="Completed" {{ $Task->status == 'Completed' ? 'selected' : '' }}>
                                                Completed</option>
                                        </optgroup>
                                    </select>
                                </form>
                            </div>

                            <div class="d-flex">
                                <a href="{{ route('intern.task.edit', ['task' => $Task->id]) }}"
                                    class="btn btn-primary mx-1">Edit</a>
                                <form action="{{ route('intern.task.destroy', ['task' => $Task->id]) }}" method="post"
                                    onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('delete')
                                    <input value="Delete" type="submit" class="mx-1 btn btn-danger" />
                                </form>
                            </div>

                        </span>
                        <h6 class="px-2 pt-2">Deadline: {{ $Task->deadline }}</h6>
                        <p class="p-2">{{ $Task->task_description }}</p>
                    </div>
                @endif
            @endforeach
        </div>

    </div>

    <script>
        function showTask(index) {
            document.querySelectorAll('.task-content').forEach(div => {
                div.style.display = 'none';
            });

            const selectedContent = document.getElementById(`task-content-${index}`);
            if (selectedContent) {
                selectedContent.style.display = 'block';
            }
        }
    </script>
@endsection
