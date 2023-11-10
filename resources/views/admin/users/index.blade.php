@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        @can('add users')
        <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Add New User</a>
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
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Role</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <th scope="row">{{ $users->firstItem() + $index }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->roles[0]->name }}</td>
                        <td>
                            @if($user->active)
                                <i class="fas fa-check-circle text-success fa-fw"></i>
                            @else
                                <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            @can('edit users')
                            <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-info btn-sm">Edit</a>
                            @endcan
                            @can('delete users')
                            <button data-id="{{ $user->id }}" class="btn btn-danger btn-sm delete-category">Delete</button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $users->links() }}
        </div>
        @can('delete users')
        <div class="modal" id="delete-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure, you want to delete this user ?.</p>
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
    @can('delete users')
    <script>
        $(function(){
            url = 'users/';
            var myModal = new bootstrap.Modal(document.getElementById('delete-modal'))
            $('.delete-category').click(function(event){
                var id = event.target.getAttribute('data-id');
                myModal.show();
                $('#delete').attr('action',url+id)
                console.log(url+id)
            })
            $('.btn-close').click(function(){
                myModal.hide();
            })
        })
    </script>
    @endcan
@endpush
