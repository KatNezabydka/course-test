<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Step3Controller extends StartController
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $student = Student::where('email', Session::get('email'))->first();
        if ($this->student->step_3) return redirect()->route('step-4');
        else {
            return view('step-3');
        }
    }

    public function store(Request $request)
    {
        $data = [];
        $count = count($request->except('_token', '_method', 'basic'));
        if (($count > 0) && (!$request->only('basic'))) {
            $data['point'] = $this->student->point + 1;
        }
        $data['step_3'] = true;
        $this->student->update($data);
        if ($this->student) {
            return redirect()->route('step-4');
        } else
            return redirect()->back()->with('error', ['Что-то пошло не так :(']);

    }
}
