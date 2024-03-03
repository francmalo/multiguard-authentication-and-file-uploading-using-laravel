@extends('layouts.master')


@section('title')
Dashboard Admin
@endsection




@section('content')







<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        {{-- <form action="/store" method="POST"> --}}
            {{-- <form action="{{ route('admin.store') }}" method="POST" > --}}
                <form action="{{ url('/admin/store') }}" method="POST">

                {{-- <form action="{{ route('admin.store') }}" method="POST"> --}}
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="col-form-label">Course Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

      </div>
    </div>
  </div>



<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">COURSES
            <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal" >ADD COURSE </button>
          </h4>

          @if(session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>ID</th>
                <th>Name</th>
                <th>EDIT</th>
                <th>DELETE</th>
              </thead>
              <tbody>
                @foreach ($courses as $data)
                <tr>
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->name }}</td>
                    <td><a href="#" class="btn btn-success">EDIT</a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-danger">DELETE</a>
                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection



@section('scripts')

@endsection
