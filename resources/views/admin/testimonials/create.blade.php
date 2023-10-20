@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Testimonial</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Testimonial</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="name">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input name="designation" type="text" class="form-control" id="designation" aria-describedby="designation">
                    @error('designation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input name="description" type="text" class="form-control" id="description" aria-describedby="description">
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="comp_image" class="form-label">Company</label>
                    <input type="file" class="form-control" name="comp_image" id="comp_image">
                    @error('comp_image')
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
