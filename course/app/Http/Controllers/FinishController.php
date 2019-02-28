<?php

namespace App\Http\Controllers;


class FinishController extends StartController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $start = $this->getStudent()->created_at;
        $end = $this->getStudent()->updated_at;
        $time = $start->diffInSeconds($end);
        return view('finish', ['student' => $this->getStudent(), 'time' => $time]);
    }

}
