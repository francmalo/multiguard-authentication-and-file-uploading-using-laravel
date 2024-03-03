<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class CourseController extends Controller
{
    // public function index()
    // {
    //     $courses=Course::all();
    //     return view('admin.course')
    //     ->with('courses',$courses)
    //     ;
    // }
    public function index()
    {


            $courses = Course::all();
            return view('admin.course', compact('courses'));


        // Check if the user is an admin
        // if (Auth::guard('admin')->check()) {
        //     return view('admin.course', compact('courses'));
        // }
        // // Check if the user is a student
        // elseif (Auth::guard('student')->check()) {
        //     return view('student.home', compact('courses'));
        // }

        // // If the user has no specific role, handle accordingly (e.g., redirect or display an error)
        // return redirect()->route('home')->with('error', 'Unauthorized access');
    }
    public function store(Request $request)
    {
        $courses = new Course;
        $courses->name = $request->input('name');
        $courses->save();
        return redirect()->route('admin.course')->with('status', 'New Course Added');
    }

}
