

@extends('layouts.master')

@section('title')
Student Applications
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Student Applications</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>Student Name</th>
        <th>Course Name</th>
        <th>Status</th>
        <th>Action</th>
                            <!-- Add more columns based on your requirements -->
                        </thead>
                        <tbody>
                            @foreach ($courseApplications as $application)
                            <tr>
                                <td>{{ $application->student->student_name }}</td>
                                <td>{{ $application->course->name }}</td>
                                <td>{{ $application->status }}</td>
                                <td>
                                    @extends('layouts.master')

                                    @section('title')
                                    Student Applications
                                    @endsection

                                    @section('content')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Student Applications</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="text-primary">
                                                                <th>Student Name</th>
                                                                <th>Course Name</th>
                                                                <th>Status</th>
                                                                <th>Approve</th>
                                                                <th>Reject</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($courseApplications as $application)
                                                                <tr>
                                                                    <td>{{ $application->student->student_name }}</td>
                                                                    <td>{{ $application->course->name }}</td>
                                                                    <td>{{ $application->status }}</td>
                                                                    <td>

                                                                        {{-- @if ($application->status == 'pending') --}}
                                                                        {{-- <form action="{{ route('admin.approveApplication', ['applicationId' => $application->id]) }}" method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-success">Approve</button>
                                                                        </form> --}}
                                                                        <form action="{{ route('admin.approveApplication') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="applicationId" value="{{ $application->id }}">
                                                                            <button type="submit" class="btn btn-success">Approve</button>
                                                                        </form>
                                                                    </td>
                                                                    <td>
                                                                        <form action="{{ route('admin.rejectApplication') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="applicationId" value="{{ $application->id }}">
                                                                            <button type="submit" class="btn btn-danger">Reject</button>
                                                                        </form>
                                                                    {{-- @endif --}}

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
