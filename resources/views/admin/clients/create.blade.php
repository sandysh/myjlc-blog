@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Client</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Client</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="name">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="client_image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="client_image" id="client_image">
                    @error('client_image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <img class="mt-4" style="width: 40em;" id="img-preview" src="" alt="">
                </div>

                <div class="mb-3 form-check">
                    <input name="active" type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function(){
            var img = $('#client_image');
            img.on('change',function(event){
                var output = document.getElementById('img-preview');
                output.src = URL.createObjectURL(event.target.files[0]);
            });
        })
    </script>
@endpush
