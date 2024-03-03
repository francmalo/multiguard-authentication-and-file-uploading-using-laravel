
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
<body>


    <div class="container">
        <div class="row">
            <h2 style="margin-top: 30px">Student Registration</h2>
            <div class="col-md-5">
                @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
              @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
                <form action="{{ route('student.create') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="mb-3">
                        <label for="student_name" class="form-label">Student Full Name</label>
                        <input type="text" class="form-control" id="student_name" name="student_name"
                        placeholder="Enter Student_name" value="{{ old('student_name') }}">
                      <span class="text-danger">@error('student_name'){{ $message }}@enderror</span>
                    </div>
                        <div class="mb-3">
                        <label for="student_email" class="form-label">Student Email</label>
                        <input type="email" class="form-control" id="student_email" name="student_email"
                        placeholder="Enter Student_Email" value="{{ old('student_email') }}">
                        <span class="text-danger">@error('student_email'){{ $message }}@enderror</span>
                    </div>
                    <!-- ... (your existing HTML) -->

                        <div class="mb-3">
                            <label for="student_gender" class="form-label">Student Gender</label>
                            <select class="form-select" id="student_gender" name="student_gender">
                                <option value="male" {{ old('student_gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('student_gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            <span class="text-danger">@error('student_gender'){{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="student_phone" class="form-label">Student Phone Number</label>
                            <input type="text" class="form-control" id="student_phone" name="student_phone" placeholder="Enter Phone Number" value="{{ old('student_phone') }}">
                            <span class="text-danger">@error('student_phone'){{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student ID Number</label>
                            <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter ID Number" value="{{ old('student_id') }}">
                            <span class="text-danger">@error('student_id'){{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="guardian_relation" class="form-label">Guardian Relation</label>
                            <select class="form-select" id="guardian_relation" name="guardian_relation">
                                <option value="parent" {{ old('guardian_relation') == 'parent' ? 'selected' : '' }}>Parent</option>
                                <option value="sponsor" {{ old('guardian_relation') == 'sponsor' ? 'selected' : '' }}>Sponsor</option>
                            </select>
                            <span class="text-danger">@error('guardian_relation'){{ $message }}@enderror</span>
                        </div>


                        <!-- ... (your existing HTML) -->

                        <!-- Guardian Information -->
                        <div class="mb-3">
                            <label for="guardian_name" class="form-label">Guardian Full Name</label>
                            <input type="text" class="form-control" id="guardian_name" name="guardian_name" placeholder="Enter Guardian Name" value="{{ old('guardian_name') }}">
                            <span class="text-danger">@error('guardian_name'){{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="guardian_gender" class="form-label">Guardian Gender</label>
                            <select class="form-select" id="guardian_gender" name="guardian_gender">
                                <option value="male" {{ old('guardian_gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('guardian_gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            <span class="text-danger">@error('guardian_gender'){{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="guardian_email" class="form-label">Guardian Email</label>
                            <input type="email" class="form-control" id="guardian_email" name="guardian_email" placeholder="Enter Guardian Email" value="{{ old('guardian_email') }}">
                            <span class="text-danger">@error('guardian_email'){{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="guardian_phone" class="form-label">Guardian Phone Number</label>
                            <input type="text" class="form-control" id="guardian_phone" name="guardian_phone" placeholder="Enter Guardian Phone Number" value="{{ old('guardian_phone') }}">
                            <span class="text-danger">@error('guardian_phone'){{ $message }}@enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="guardian_id" class="form-label">Guardian ID Number</label>
                            <input type="text" class="form-control" id="guardian_id" name="guardian_id" placeholder="Enter Guardian ID Number" value="{{ old('guardian_id') }}">
                            <span class="text-danger">@error('guardian_id'){{ $message }}@enderror</span>
                        </div>






                        <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">

                        <span class="text-danger">@error('password'){{ $message }}@enderror</span></div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                            <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="mb-3">
                    <label for="photo" class="form-label">Upload Passport size photo</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    {{-- <span class="text-danger">@error('passport_photo'){{ $message }}@enderror</span> --}}

                        </div>
                        <div class="mb-3">
                        <label for="birth_certificate" class="form-label">Upload Birth Certificate</label>
                        <input type="file" class="form-control" id="birth_certificate" name="birth_certificate">
                        {{-- <span class="text-danger">@error('passport_photo'){{ $message }}@enderror</span> --}}

                            </div>
                            <div class="mb-3">
                            <label for="kcse_certificate" class="form-label">Upload KCSE CERTIFICATE</label>
                            <input type="file" class="form-control" id="kcse_certificate" name="kcse_certificate">

                    </div>

                        <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        Already Registered<a href="{{ route('student.login') }}">Login Here</a>
                    </form>
                    </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
