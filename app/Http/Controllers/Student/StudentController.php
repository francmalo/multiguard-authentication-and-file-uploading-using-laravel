<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Add this line

class StudentController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'student_name'=>'required',
            'student_email'=>'required|email|unique:students,student_email',
            'password'=>'required|min:6|max:15',
            'cpassword'=>'required|min:5|max:30|same:password'

        ]);
         $student = new Student();
         $student -> student_name= $request->student_name;
         $student -> student_email=$request->student_email;
         $student -> password=Hash::make($request->password);
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

}
