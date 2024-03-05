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
                            <th>Student Email</th>
                            <th>Student Gender</th>
                            <th>Student Phone No.</th>
                            <th>Student ID No.</th>
                            <th>Student Photo</th>
                            <th>Birth Certificate</th>
                            <th>Kcse Certificate</th>
                            <th>Guardian Name</th>
                            <th>Guardian Email</th>
                            <th>Guardian Gender</th>
                            <th>Guardian Phone No.</th>
                            <th>Guardian ID No.</th>
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
                                <td>{{ $student->student_id }}</td>
                                <td>
                                    <img src="{{ asset($student->photo) }}" alt="Student Photo" width="50">
                                </td>
                                <td>
                                    <a href="{{ asset($student->birth_certificate) }}" target="_blank">View Birth Certificate</a>
                                </td>
                                <td>
                                    <a href="{{ asset($student->kcse_certificate) }}" target="_blank">View Kcse Certificate</a>
                                </td>
                                <td>{{ $student->guardian_name }}</td>
                                <td>{{ $student->guardian_email }}</td>
                                <td>{{ $student->guardian_gender }}</td>
                                <td>{{ $student->guardian_phone }}</td>
                                <td>{{ $student->guardian_id }}</td>
                                <td>{{ $student->guardian_relation }}</td>
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
