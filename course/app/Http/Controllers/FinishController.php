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
        return view('finish', compact('student'));
    }

    public function store(Request $request)
    {

        dd($request);
    }
}
