@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clients</h1>
        <a href="{{ route('clients.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Add New Clients</a>
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
                    <th width="20%" scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clients as $index => $client)
                    <tr>
                        <th scope="row">{{ $clients->firstItem() + $index }}</th>
                        <td>{{ $client->name }}</td>
                        <td><img style="width: 2em" src="{{asset('storage/'.$client->image)}}" alt=""></td>
                        <td>
                            @if($client->active)
                                <i class="fas fa-check-circle text-success fa-fw"></i>
                            @else
                                <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('banners.edit',[$client->id]) }}" class="btn btn-info btn-sm">Edit</a>
                            <button data-id="{{ $client->id }}" class="btn btn-danger btn-sm delete-category">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $clients->links() }}
        </div>
        <div class="modal" id="delete-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete FAQ ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure, you want to delete this faq ?.</p>
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
            url = 'banners/';
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
@endpush
