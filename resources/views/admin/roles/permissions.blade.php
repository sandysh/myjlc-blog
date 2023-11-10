@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update permissions of role "{{$role->name}}"</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('roles.permissions.update',$role->id) }}">
                @csrf
                <div class="container">
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-3">
                                <div class="mb-3 form-check">
                                    <input {{ in_array($permission->name,$rolePermissions) ? 'checked' : '' }}
                                        name="permissions[{{$permission->name}}]" type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">{{ $permission->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
