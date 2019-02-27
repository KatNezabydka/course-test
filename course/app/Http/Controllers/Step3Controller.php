<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Step3Controller extends StartController
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
        return ($this->student->step_3) ? redirect()->route('step-4') : view('step-3');

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = [];
        $count = count($request->except('_token', '_method', 'basic'));
        
        if (($count > 0) && (!$request->only('basic'))) {
            $data['point'] = $this->student->point + 1;
        }

        $data['step_3'] = true;
        $this->student->update($data);
        return ($this->student) ? redirect()->route('step-4') : redirect()->back()->with('error', ['Что-то пошло не так :(']);
    }
}
