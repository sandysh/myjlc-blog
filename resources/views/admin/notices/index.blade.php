@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        <a href="{{ route('notices.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Add New Notice</a>
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
                    <th scope="col">Date</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($notices as $index => $notice)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $notice->title }}</td>
                        <td>{{ $notice->date }}({{ \Carbon\Carbon::parse($notice->date)->diffForHumans() }})</td>
                        <td>{{ \Carbon\Carbon::parse($notice->from)->format('g:i A') }}</td>
                        <td>{{ \Carbon\Carbon::parse($notice->to)->format('g:i A') }}</td>
                        <td>
                            @if($notice->active)
                                <i class="fas fa-check-circle text-success fa-fw"></i>
                            @else
                                <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('notices.edit',[$notice->id]) }}" class="btn btn-info btn-sm">Edit</a>
                            <button data-id="{{ $notice->id }}" class="btn btn-danger btn-sm delete-category">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $notices->links() }}
        </div>
        <div class="modal" id="delete-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Notice ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure, you want to delete this notice ?.</p>
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
            var url = 'notices/';
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
