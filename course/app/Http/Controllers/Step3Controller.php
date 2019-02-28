<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Step3Controller extends StartController
{

    /**
     * @return mixed
     */
    public function index()
    {
        return ($this->getStudent()->step_3) ? redirect()->route('step-4') : view('step-3');

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
            $data['point'] = $this->getStudent()->point + 1;
        }

        $data['step_3'] = true;
        $this->getStudent()->update($data);
        return ($this->getStudent()) ? redirect()->route('step-4') : redirect()->back()->with('error', ['Что-то пошло не так :(']);
    }
}
