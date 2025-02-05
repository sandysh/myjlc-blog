@extends('admin.layouts.app')


@section('content')
<style>
td{
    text-align:center;
}
.custom-switch{
    margin:0;
    padding:0;
}
.custom-switch-input {
  width: 40px;
  height: 20px;
  appearance: none;
  background-color: #ffffff; 
  border-radius:10px;
  cursor: pointer;
  position: relative;
  transition: background-color 0.2s;
}

.custom-switch-input:checked {
  background-color: #007bff;
  
}

.custom-switch-input:checked::before {
  transform: translateX(20px);
}

.custom-switch-input::before {
  content: '';
  width: 20px;
  height: 20px;
  background-color: rgb(0, 0, 0);
  border-radius: 50%;
  position: absolute;
  top: 0;
  left: 0;
  transition: transform 0.2s;
}


</style>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Courses</h1>
        @can('add courses')
            <a href="{{ route('courses.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Add New Course</a>
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
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Students</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($courses  as $course )
                    <tr>
                        <td scope="row">{{$loop->index+1}}</td>
                        <td>
                            <a href="{{ route('courses.show',[$course->slug]) }}">{{$course->title }}</a>
                        </td>
                        <td >{{ $course->category->name }}</td>
                        <td>{{ $course->students }}</td>
                        
                        <td>
                            <div class="custom-switch">
                                
                                <input class="custom-switch-input status"  
                                value="{{$course->active}}"
                                 type="checkbox" 
                                 data-id="{{$course->id}}"
                                 {{ $course->active === 1 ? 'checked' : '' }}
                                 />
                               
                            </div>
                        </td>
                        <td>
                            @can('edit courses')
                                <a href="{{ route('courses.edit',[$course->id]) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit fa-sm"></i>
                                </a>
                            @endcan
                            @can('delete courses')
                                <button data-id="{{ $course->id }}" class="btn btn-danger btn-sm delete-category">
                                    <i class="fas fa-trash"></i>
                                </button>
                            @endcan
                            @can('edit courses')
                                <a href="{{ route('courses.curriculum.create',$course->id) }}"
                                   data-id="{{ $course->id }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-file"></i>
                                </a>
                                <a href="{{ route('courses.faqs.index',$course->id) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-question"></i>
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $courses->links() }}

        </div>
        @can('delete courses')
        <div class="modal" id="delete-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Post ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure, you want to delete this post.</p>
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
    @can('delete courses')
    <script>
        $(function () {
            console.log('{{ route('courses.update',$course->id) }}');
            var url = 'courses/';
            var myModal = new bootstrap.Modal(document.getElementById('delete-modal'))
            $('.delete-category').click(function (event) {
                var id = event.target.getAttribute('data-id');
                myModal.show();
                $('#delete').attr('action', url + id)
            })
            $('.btn-close').click(function () {
                myModal.hide();
            })
            $('.status').click(function(event) {
             var id = event.target.getAttribute('data-id');
             var checked = parseInt(event.target.value);
             console.log(checked);
             var active=checked==1?'off':'on';
            
             console.log(url);
             $.ajax({
                url:'courses/'+id, 
                method:'POST',
                data: {
                    '_token': '{{ csrf_token() }}',  
                    '_method': 'PUT',
                    'id': parseInt(id),  
                    'active': active  
                },
                success: function(data) {
                    console.log(data);  
                },
                error: function(xhr, status, error) {
                    console.log(xhr, status, error);  
                }
            });
        });

        })
        
    </script>
    @endcan
@endpush
