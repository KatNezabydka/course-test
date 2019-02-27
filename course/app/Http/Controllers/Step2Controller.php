<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Step2Controller extends StartController
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
        $val_1 = rand(10, 99);
        $val_2 = rand(10, 99);
        return ($this->student->step_2) ? redirect()->route('step-3') : view('step-2', compact('val_1', 'val_2'));
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'result' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $res = (int)$request->val_1 + (int)$request->val_2;
        if ($res == $request->result) $data['point'] = $this->student->point + 1;
        $data['step_2'] = true;
        $this->student->update($data);
        return  ($this->student) ? redirect()->route('step-3') : redirect()->back()->with('error', ['Ошибка, обратитесь к администратору']);
    }
}
