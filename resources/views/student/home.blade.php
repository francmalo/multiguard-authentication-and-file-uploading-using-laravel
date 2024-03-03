{{--
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
<body>


    <div class="container">
        <div class="row">
            <h2 style="margin-top: 30px">Student Dashboard</h2>
            <div class="col-md-5">
                @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <table class="table table-responsive">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                    <td>{{ Auth::guard('student')->user()->student_name }}</td>
                    <td>{{ Auth::guard('student')->user()->student_email }}</td>
                    <td>
                        <a href="{{ route('student.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('student.logout') }}" method="POST">
                            @csrf
                        </form>
                    </td>

                    </tr>
                    </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
{{-- </html> --}}

@extends('layouts.master2')


@section('title')
Dashboard Student
@endsection




@section('content')








<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">COURSES

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
                <th>NAME</th>
                <th>APPLY</th>

              </thead>
              <tbody>
                @foreach ($courses as $data)
                <tr>
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->name }}</td>
                    <td><a href="#" class="btn btn-success">Apply</a>
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
