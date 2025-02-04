@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Banner</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $banner->title }}</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('banners.update',$banner->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" aria-describedby="title"
                    value="{{$banner->title}}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Tagline</label>
                    <input type="text" class="form-control" name="tagline" value="{{$banner->tagline}}">
                    @error('tagline')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="banner_image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="banner_image" id="banner_image">
                    @error('banner_image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <img class="mt-4" style="width: 40em;" id="img-preview" src="{{ asset('storage'.$banner->image) }}" alt="">
                </div>

                <div class="mb-3 form-check">
                    <input name="active" type="checkbox" class="form-check-input" id="exampleCheck1"
                    {{ $banner->active ? 'checked' : '' }}>
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
           var img = $('#banner_image');
           img.on('change',function(event){
               var output = document.getElementById('img-preview');
               output.src = URL.createObjectURL(event.target.files[0]);
           });
       })
    </script>
@endpush
