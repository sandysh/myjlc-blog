@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Notice</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $notice->title }}</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('notices.update',[$notice->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" aria-describedby="title"
                           value="{{$notice->title}}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <label for="date" class="form-label">Date</label>
                            <input name="date" type="date" class="form-control" id="date" aria-describedby="date"
                                   value="{{$notice->date}}">
                            @error('date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <label for="from" class="form-label">From</label>
                            <input name="from" type="time" class="form-control" id="from" aria-describedby="from"
                                   value="{{$notice->from}}">
                            @error('from')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="to" class="form-label">To</label>
                            <input name="to" type="time" class="form-control" id="to" aria-describedby="to"
                                   value="{{$notice->to}}">
                            @error('to')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="mb-3 form-check">
                    <input name="active" type="checkbox" class="form-check-input" id="exampleCheck1"
                        {{ $notice->active ? 'checked' : '' }}>
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
