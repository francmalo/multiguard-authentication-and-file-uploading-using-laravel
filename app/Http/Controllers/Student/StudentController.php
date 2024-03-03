<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Course;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Add this line

class StudentController extends Controller
{


    public function create(Request $request){
        $request->validate([
            // 'admission_number'=>'required',
            'student_name'=>'required',
            'student_email'=>'required|email|unique:students,student_email',
            'password'=>'required|min:6|max:15',
            'cpassword'=>'required|min:5|max:30|same:password',
             'photo' => 'nullable|mimes:doc,pdf,docx,zip,png,jpeg,jpg,webp',
             'birth_certificate' => 'nullable|mimes:doc,pdf,docx,zip,png,jpeg,jpg,webp',
             'kcse_certificate' => 'nullable|mimes:doc,pdf,docx,zip,png,jpeg,jpg,webp',
             'student_gender' => 'required|in:male,female', // Gender should be either male or female
             'student_phone' => 'required|string|max:20', // Assuming phone number is a string with a max length of 20
             'student_id' => 'required|string|max:20', // Assuming ID number is a string with a max length of 20
             'guardian_relation' => 'required|in:parent,sponsor', // Assuming relation is a string with a max length of 255
             'guardian_name' => 'required|string|max:255', // Assuming guardian name is a string with a max length of 255
             'guardian_gender' => 'required|in:male,female', // Guardian gender should be either male or female
             'guardian_email' => 'required|email|unique:students,guardian_email', // Unique guardian email in the students table
             'guardian_phone' => 'required|string|max:20', // Assuming guardian phone number is a string with a max length of 20
             'guardian_id' => 'required|string|max:20', // Assuming guardian ID is a string with a max length of 20
        ]);
                if($request->has('photo')){
                    $file=$request->file('photo');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $path='uploads/students/photos';
                    $file->move($path,$filename);
                }

                // Upload 'birth_certificate'
                if ($request->has('birth_certificate')) {
                    $birthCertificateFile = $request->file('birth_certificate');
                    $birthCertificateExtension = $birthCertificateFile->getClientOriginalExtension();
                    $birthCertificateFilename = time() . '_birth_certificate.' . $birthCertificateExtension;
                    $birthCertificatePath = 'uploads/students/birth_certificates';
                    $birthCertificateFile->move($birthCertificatePath, $birthCertificateFilename);

                }

                // Upload 'kcse_certificate'
                if ($request->has('kcse_certificate')) {
                    $kcseCertificateFile = $request->file('kcse_certificate');
                    $kcseCertificateExtension = $kcseCertificateFile->getClientOriginalExtension();
                    $kcseCertificateFilename = time() . '_kcse_certificate.' . $kcseCertificateExtension;
                    $kcseCertificatePath = 'uploads/students/kcse_certificates';
                    $kcseCertificateFile->move($kcseCertificatePath, $kcseCertificateFilename);

                }







         $admissionNumber = 'ADMISSION' . rand(1000, 9999);

         $student = new Student();

         $student->admission_number = $admissionNumber;
         $student -> student_name= $request->student_name;
         $student -> student_email=$request->student_email;
         $student -> password=Hash::make($request->password);
         $student->photo = $path.'/'.$filename;
         $student->birth_certificate = $birthCertificatePath . '/' . $birthCertificateFilename;
         $student->kcse_certificate = $kcseCertificatePath . '/' . $kcseCertificateFilename;
         $student->student_gender = $request->student_gender;
         $student->student_phone = $request->student_phone;
         $student->student_id = $request->student_id;



         $student->guardian_relation = $request->guardian_relation;
         $student->guardian_name = $request->guardian_name;
         $student->guardian_gender = $request->guardian_gender;
         $student->guardian_email = $request->guardian_email;
         $student->guardian_phone = $request->guardian_phone;
         $student->guardian_id = $request->guardian_id;



         $data=$student->save();
         if($data){
            return redirect()->back()->with('success','you have registered successfully');
         }else{
            return redirect()->back()->with('error','Registration failed');
         }



    }

    public function dologin(Request $request){
        //Validate Inputs
        $request->validate([
           'student_email'=>'required|email|exists:students,student_email',
           'password'=>'required|min:5|max:30'
        ]);

        $check = $request->only('student_email','password');

        if( Auth::guard('student')->attempt($check) ){
            return redirect()->route('student.home')->with('success','welcome to student dashboard');
        }else{
            return redirect()->route('student.login')->with('error','Incorrect Credentials');
        }
    }



    public function logout(){
        Auth::guard('student')->logout();
        return redirect('/');
    }
    public function viewCourses()
{
    $courses = Course::all();
    return view('student.home', compact('courses'));
}




   public function showStudentRecords()
    {
        $students = Student::all(); // Fetch all students

        return view('admin.home', compact('students'));
    }
}




