@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Roles</h1>
        @can('add roles')
        <a href="{{ route('roles.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Add New Role</a>
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
                    <th width="30%" scope="col">Name</th>
                    <th width="30%" scope="col">Total Users</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $index => $role)
                    <tr>
                        <th scope="row">{{ $roles->firstItem() + $index }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->users_count }}</td>
                        <td>
                            @can('edit roles')
                                <a href="{{ route('roles.edit',[$role->id]) }}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{ route('roles.permissions.edit',[$role->id]) }}" class="btn btn-info btn-sm">Permissions</a>
                            @endcan
                            @can('delete roles')
                                <button data-id="{{ $role->id }}" class="btn btn-danger btn-sm delete-category">Delete
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $roles->links() }}
        </div>
        @can('delete roles')
            <div class="modal" id="delete-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Role ?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure, you want to delete this role.</p>
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
    @can('delete roles')
        <script>
            $(function () {
                var url = 'roles/';
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
