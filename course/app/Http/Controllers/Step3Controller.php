<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Step3Controller extends Controller
{
    public function index(Request $request)
    {
        return view('step-3');
    }

    public function store(Request $request)
    {
        $student = Student::where('email', Session::get('email'))->first();
        $data = [];
        $count = count($request->except('_token', '_method', 'basic'));
        if (($count > 0) && (!$request->only('basic'))) {
            $data['point'] = $student->point + 1;
        }
        $data['step_3'] = true;
        $student->update($data);
        if ($student) {
            return redirect()->route('step-4');
        } else
            return redirect()->back()->with('error', ['Что-то пошло не так :(']);

    }
}
