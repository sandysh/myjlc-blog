@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        @can('add categories')
            <a href="{{ route('categories.create') }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Add New Category</a>
        @endcan
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
                    <th scope="col">Name</th>
                    <th scope="col">Parent</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent ? $category->parent->name : '' }}</td>
                        <td>
                            @if($category->active)
                                <i class="fas fa-check-circle text-success fa-fw"></i>
                            @else
                                <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            @can('edit categories')
                                <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-info btn-sm">Edit</a>
                            @endcan
                            @can('delete categories')
                                <button data-id="{{ $category->id }}" class="btn btn-danger btn-sm delete-category">
                                    Delete
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $categories->links() }}
        </div>
        @can('delete categories')
        <div class="modal" id="delete-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Category ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure, you want to delete this category.</p>
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
        @endcan
    </div>
@endsection

@push('scripts')
    @can('delete categories')
    <script>
        $(function () {
            var url = 'categories/';
            var myModal = new bootstrap.Modal(document.getElementById('delete-modal'))
            $('.delete-category').click(function (event) {
                var id = event.target.getAttribute('data-id');
                myModal.show();
                $('#delete').attr('action', url + id)
            })
            $('.btn-close').click(function () {
                myModal.hide();
            })
        })
    </script>
    @endcan
@endpush
