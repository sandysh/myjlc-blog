@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reviews</h1>
        @can('add reviews')
        <a href="{{ route('reviews.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Add New Review</a>
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
                    <th scope="col">Designation</th>
                    <th scope="col">Company</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Review</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($reviews as $index => $review)
                    <tr>
                        <th scope="row">{{ $reviews->firstItem() + $index }}</th>
                        <td>{{ $review->name }}</td>
                        <td>{{ $review->designation }}</td>
                        <td>{{ $review->company }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($review->description,50) }}</td>
                        <td>
                            @if($review->active)
                                <i class="fas fa-check-circle text-success fa-fw"></i>
                            @else
                                <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            @can('edit reviews')
                                <a href="{{ route('reviews.edit',[$review->id]) }}" class="btn btn-info btn-sm">Edit</a>
                            @endcan
                            @can('delete reviews')
                                <button data-id="{{ $review->id }}" class="btn btn-danger btn-sm delete-category">
                                    Delete
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $reviews->links() }}
        </div>
        @can('delete reviews')
            <div class="modal" id="delete-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Review ?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure, you want to delete this review ?.</p>
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
    @can('delete reviews')
        <script>
            $(function () {
                url = 'reviews/';
                var myModal = new bootstrap.Modal(document.getElementById('delete-modal'))
                $('.delete-category').click(function (event) {
                    var id = event.target.getAttribute('data-id');
                    myModal.show();
                    $('#delete').attr('action', url + id)
                    console.log(url + id)
                })
                $('.btn-close').click(function () {
                    myModal.hide();
                })
            })
        </script>
    @endcan
@endpush
