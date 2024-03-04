<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // Add this line
use App\Admin;
use App\Course;
use App\CourseApplication;


class AdminController extends Controller
{

    public function dologin(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:admins,email',
           'password'=>'required|min:5|max:30'
        ],
        [
            'email.exists'=>'This email is not registered in our system'
        ]);

        $check = $request->only('email','password');

        if( Auth::guard('admin')->attempt($check) ){
            return redirect()->route('admin.home')->with('success','welcome to admin dashboard');
        }else{
            return redirect()->route('admin.login')->with('error','Incorrect Credentials');
        }
    }



    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }



    public function viewCourseApplications()
    {
        $courseApplications = CourseApplication::with(['student', 'course'])->get();

        return view('admin.applications', compact('courseApplications'));
    }

    public function approveApplication(Request $request)
    {
        $applicationId = $request->input('applicationId');
        $application = CourseApplication::findOrFail($applicationId);
        $application->status = 'approved';
        $application->save();

        return redirect()->back()->with('success', 'Application approved successfully');
    }
    public function rejectApplication(Request $request)
{
    $applicationId = $request->input('applicationId');
    $application = CourseApplication::findOrFail($applicationId);
    $application->status = 'rejected';
    $application->save();

    return redirect()->back()->with('success', 'Application rejected');
}


}

