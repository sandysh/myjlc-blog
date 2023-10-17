@extends('admin.layouts.app')


@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Courses</h1>
        <a href="{{ route('courses.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Add New Course</a>
    </div>
    @include('admin.shared.alert')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Students</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($courses  as $course )
                    <tr>
                        <th scope="row"></th>
                        <td>
                            <a href="{{ route('courses.show',[$course->slug]) }}">{{$course->title }}</a>
                        </td>
                        <td>{{ $course->category->name }}</td>
                        <td>{{ $course->students }}</td>
                        <td>
                            {{ $course->active ? 'active' : 'disabled' }}
                        </td>
                        <td>
                            <a href="{{ route('courses.edit',[$course->id]) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit fa-sm"></i>
                            </a>
                            <button data-id="{{ $course->id }}" class="btn btn-danger btn-sm delete-category">
                                <i class="fas fa-trash"></i>
                            </button>
                            <a href="{{ route('courses.curriculum.create',$course->id) }}" data-id="{{ $course->id }}" class="btn btn-success btn-sm">
                                <i class="fas fa-file"></i>
                            </a>
                            <a href="{{ route('courses.faqs.index',$course->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-question"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $courses->links() }}

        </div>
        <div class="modal" id="delete-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Post ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure, you want to delete this post.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-close">Close</button>
                        <form id="delete" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-primary" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function(){
            var url = 'posts/';
            var myModal = new bootstrap.Modal(document.getElementById('delete-modal'))
            $('.delete-category').click(function(event){
                var id = event.target.getAttribute('data-id');
                myModal.show();
                $('#delete').attr('action',url+id)
            })
            $('.btn-close').click(function(){
                myModal.hide();
            })
        })
    </script>

@endpush
