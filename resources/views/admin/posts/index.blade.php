@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>
        @can('create blog posts')
            <a href="{{ route('posts.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Add New Post</a>
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
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts  as $post )
                    <tr>
                        <th scope="row"></th>
                        <td>
                            <a href="{{ route('post.show',[$post->slug]) }}">{{$post->title }}</a>
                        </td>
                        <td>{{ $post->category->name }}</td>
                        <td><img src="{{ '/storage/'.$post->featured_image }}" style="width: 4rem"/></td>
                        <td>
                            {{ $post->active ? 'active' : 'disabled' }}
                        </td>
                        <td>
                            @can('edit blog posts')
                            <a href="{{ route('posts.edit',[$post->id]) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit fa-sm"></i>
                            </a>
                            @endcan
                            @can('delete blog posts')
                            <button data-id="{{ $post->id }}" class="btn btn-danger btn-sm delete-category">
                                <i data-id="{{ $post->id }}" class="fas fa-trash"></i>
                            </button>
                            @endcan

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $posts->links() }}

        </div>
        @can('delete blog posts')
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
        @endcan
    </div>
@endsection

@push('scripts')
    @can('delete blog posts')
    <script>
        $(function () {
            var url = 'posts/';
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
