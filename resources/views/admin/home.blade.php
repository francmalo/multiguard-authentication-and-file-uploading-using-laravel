@extends('layouts.master')

@section('title')
Dashboard Admin
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Student Records</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>Admission Number</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Photo</th>
                            <th>Birth Certificate</th>
                            <!-- Add more columns based on your requirements -->
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->admission_number }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->student_email }}</td>
                                <td>{{ $student->student_gender }}</td>
                                <td>{{ $student->student_phone }}</td>
                                <td>
                                    <img src="{{ asset($student->photo) }}" alt="Student Photo" width="50">
                                </td>
                                <td>
                                    <a href="{{ asset($student->birth_certificate) }}" target="_blank">View Birth Certificate</a>
                                </td>
                                <!-- Add more cells based on your requirements -->
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
