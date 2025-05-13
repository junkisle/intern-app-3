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
                    @foreach ($Tasks as $Task)
                        @if ($userId === $Task->user_id && $Task->status === 'Pending')
                            <div class="border border-warning rounded-4 my-2 px-3 pb-3 pt-2 h-25 overflow-hidden">
                                <h5 class="p-2 border-bottom border-success">{{ $Task->task_title }}</h5>
                                <p class="px-2">{{ Str::limit($Task->task_description, 35) }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Ongoing -->
            <div
                class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4 mx-1 border border-success rounded-5 p-3 d-flex flex-column">
                <h3 class="border-bottom border-success pb-2">Ongoing</h3>
                <div class="overflow-y-auto" style="height: 40vh">
                    @foreach ($Tasks as $Task)
                        @if ($userId === $Task->user_id && $Task->status === 'Ongoing')
                            <div class="border border-warning rounded-4 my-2 px-3 pb-3 pt-2 h-25 overflow-hidden">
                                <h5 class="p-2 border-bottom border-success">{{ $Task->task_title }}</h5>
                                <p class="px-2">{{ $Task->task_description }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Completed -->
            <div
                class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4 mx-1 border border-success rounded-5 p-3 d-flex flex-column">
                <h3 class="border-bottom border-success pb-2">Completed</h3>
                <div class="overflow-y-auto" style="height: 40vh">
                    @foreach ($Tasks as $Task)
                        @if ($userId === $Task->user_id && $Task->status === 'Completed')
                            <div class="border border-warning rounded-4 my-2 px-3 pb-3 pt-2 h-25 overflow-hidden">
                                <h5 class="p-2 border-bottom border-success">{{ $Task->task_title }}</h5>
                                <p class="px-2">{{ Str::limit($Task->task_description, 10) }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
