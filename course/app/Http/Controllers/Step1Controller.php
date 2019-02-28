<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Step1Controller extends StartController
{
    /**
     * @return mixed
     */
    public function index()
    {
        return ($this->getStudent()->step_1) ? redirect()->route('step-2') : view('step-1');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data['point'] = (int)$this->getStudent()->point + 1;
        $data['step_1'] = true;
        $this->getStudent()->update($data);
        return ($this->getStudent()) ? redirect()->route('step-2') : redirect()->back()->with('error', ['Ошибка, обратитесь к администратору']);
        
    }
}
