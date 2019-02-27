<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Step1Controller extends StartController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return ($this->student->step_1) ? redirect()->route('step-2') : view('step-1');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data['point'] = (int)$this->student->point + 1;
        $data['step_1'] = true;
        $this->student->update($data);
        return ($this->student) ? redirect()->route('step-2') : redirect()->back()->with('error', ['Ошибка, обратитесь к администратору']);
        
    }
}
