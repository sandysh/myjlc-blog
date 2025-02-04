@extends('admin.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Category</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">New</h6>
    </div>  
    <div class="card-body">
        <form method="POST" action="{{ route('categories.update',[$category->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">    
                <label for="parent">Parent</label>
                <select name="parent_id" class="form-select form-control" aria-label="Default select example">
                    <option selected disabled>Select parent category if you are creating a child category</option>
                    @foreach ($categories as $cat )
                        <option {{ $category->parent_id === $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="name" value="{{ $category->name  }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3 form-check">
                <input name="active" type="checkbox" class="form-check-input" id="exampleCheck1" {{ $category->active ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection