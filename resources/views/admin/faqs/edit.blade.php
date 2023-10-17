@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit FAQ</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $faq->title }}</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('courses.faqs.update',[$course->id,$faq->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" aria-describedby="title"
                    value="{{ $faq->title }}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" class="form-control" id="" cols="30" rows="10">{{ $faq->body }}</textarea>
                    @error('body')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input name="active" type="checkbox" class="form-check-input" id="exampleCheck1"
                    {{ $faq->active ? 'checked' : '' }}>
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
