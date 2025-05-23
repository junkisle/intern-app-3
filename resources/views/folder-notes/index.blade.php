@extends('folder-main.app')

@section('title', 'Notes')

@section('content')
    <div class="container-fluid px-3">
        <div class="row justify-content-between align-items-center mb-3 border-bottom border-success-subtle pb-2">
            <div class="col d-flex justify-content-between align-items-center">
                <h1 class="m-0">Notes</h1>
                <a href="{{ route('intern.note.create', ['user_id' => $user_id]) }}" class="text-success fs-2">
                    <i class="bi bi-plus-square"></i>
                </a>
            </div>
        </div>

        <div class="row g-3 justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 border border-danger rounded-3 px-2 py-1 h-75">
                <div class="overflow-y-scroll">
                    @foreach ($Notes as $Note)
                        @if ($user_id == $Note->user_id)
                            <a class="btn btn-primary w-100 py-2 my-1">{{ $Note->title }}</a>
                        @endif
                    @endforeach
                </div>

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 border border-danger rounded-3 p-3 overflow-y-scroll ">
                <div class="h-75">
                    <h3>Title</h3>
                    <h6>Date created: 121212</h6>
                    <p>Note content</p>
                </div>

            </div>
        </div>

    </div>
@endsection
