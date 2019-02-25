<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FinishController extends Controller
{
    public function index()
    {
        $student = Student::where('email', Session::get('email'))->first();
        $start = $student->created_at;
        $end = $student->updated_at;
        $time = $start->diffInSeconds($end);
        return view('finish', compact('student', 'time'));
    }
    
}
