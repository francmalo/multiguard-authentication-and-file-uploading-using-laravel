
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
                <form action="{{ route('student.create') }}" method="POST">

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
                        <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">

                        <span class="text-danger">@error('password'){{ $message }}@enderror</span></div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                            <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
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
