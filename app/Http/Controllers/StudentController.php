<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard');
    }
    public function courses()
    {
        return view('student.courses');
    }
    public function exams()
    {
        return view('student.exams');
    }
    public function result()
    {
        return view('student.result');
    }
    public function profile()
    {
        return view('student.profile');
    }
}
