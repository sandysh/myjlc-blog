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
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Add New Curriculum
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form method="POST" action="{{ route('courses.curriculum.store',$course->id) }}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="title" class="form-control" id="title" aria-describedby="title">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label><br>
                    <textarea id="editor" name="description"></textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <h4>{{ $course->title }} Curriculums</h4>
    <div class="card card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($course->curriculums as $c => $curry)
            <tr>
                <th scope="row">{{ $c + 1 }}</th>
                <td>{{ $curry->title }}</td>
                <td>{{ $curry->active }}</td>
                <td>
                    <a href="{{ route('courses.curriculum.edit',[$course->id,$curry->id]) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-edit fa-sm"></i>
                    </a>
                    <button data-id="{{ $curry->id }}" class="btn btn-danger btn-sm delete-category">
                        <i class="fas fa-trash"></i>
                    </button>
                    <a href="{{ route('courses.curriculum.create',$curry->id) }}" data-id="{{ $curry->id }}" class="btn btn-success btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
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
