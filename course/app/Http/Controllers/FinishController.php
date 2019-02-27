<?php

namespace App\Http\Controllers;


class FinishController extends StartController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $start = $this->student->created_at;
        $end = $this->student->updated_at;
        $time = $start->diffInSeconds($end);
        return view('finish', ['student' => $this->student, 'time' => $time]);
    }

}
