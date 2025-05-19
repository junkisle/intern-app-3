@extends('folder-main.app')

@section('title', 'Notes')

@section('content')
    <div class="container-fluid px-3">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="border-bottom border-success">
                    Notes
                </h1>
            </div>
        </div>

        <div class="row g-3 justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 border border-danger rounded-3 px-2 py-1 overflow-y-scroll"
                style="height: 50vh;">
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
                <button class="btn btn-primary w-100 py-2 my-1">Notes</button>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 border border-danger rounded-3 p-3 overflow-y-scroll"
                style="height: 50vh;">
                <h3>Title</h3>
                <h6>Date created: 121212</h6>
                <p>Note content</p>
            </div>
        </div>

    </div>
@endsection
