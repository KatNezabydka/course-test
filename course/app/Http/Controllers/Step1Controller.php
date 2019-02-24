<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Step1Controller extends Controller
{
    public function index()
    {
        $student = Student::where('email', Session::get('email'))->first();
        return view('step-1', compact('student'));
    }

    public function store(Request $request)
    {

        $student = Student::where('email', Session::get('email'))->first();
        $data['point'] = (int)$student->point + 1;
        $data['step_1'] = true;
        $student->update($data);
        if ($student) {
            return redirect()->route('step-2');
        } else
            return redirect()->back()->with('error', ['Ошибка, обратитесь к администратору']);
    }
}
