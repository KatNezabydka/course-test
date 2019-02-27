<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\Session;

class FinishController extends StartController
{
    public function index()
    {
        $start = $this->student->created_at;
        $end = $this->student->updated_at;
        $time = $start->diffInSeconds($end);
        return view('finish', [
            'student' => $this->student,
            'time' => $time
        ]);
    }

}
