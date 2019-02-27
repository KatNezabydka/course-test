<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Step1Controller extends StartController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->student->step_1) return redirect()->route('step-2');
        else
            return view('step-1', compact('student'));
    }

    public function store(Request $request)
    {

        $data['point'] = (int)$this->student->point + 1;
        $data['step_1'] = true;
        $this->student->update($data);
        if ($this->student) {
            return redirect()->route('step-2');
        } else
            return redirect()->back()->with('error', ['Ошибка, обратитесь к администратору']);
    }
}
