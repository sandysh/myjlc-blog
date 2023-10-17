@extends('admin.layouts.app')
@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
    </style>
@endpush
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Curriculum</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('courses.curriculum.update',[$course->id,$curriculum->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" aria-describedby="title" value="{{ $curriculum->title  }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label><br>
                    <textarea id="editor" name="description">{{ $curriculum->description }}</textarea>
                </div>

                <div class="mb-3 form-check">
                    <input name="active" type="checkbox" class="form-check-input" id="exampleCheck1" {{ $curriculum->active ? 'checked' : '' }}>
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
