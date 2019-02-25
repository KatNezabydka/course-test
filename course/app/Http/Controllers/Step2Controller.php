<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Step2Controller extends Controller
{
    public function index()
    {
        $student = Student::where('email', Session::get('email'))->first();
        if ($student->step_2) return redirect()->route('step-3');
        else {
            $val_1 = rand(10, 99);
            $val_2 = rand(10, 99);
            return view('step-2', compact('student', 'val_1', 'val_2'));
        }
    }

    public function store(Request $request)
    {
        $student = Student::where('email', Session::get('email'))->first();

        $validator = Validator::make($request->all(), [
            'result' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $res = (int)$request->val_1 + (int)$request->val_2;
        if ($res == $request->result) $data['point'] = $student->point + 1;
        $data['step_2'] = true;
        $student->update($data);
        if ($student) {
            return redirect()->route('step-3');
        } else
            return redirect()->back()->with('error', ['Ошибка, обратитесь к администратору']);
    }
}
