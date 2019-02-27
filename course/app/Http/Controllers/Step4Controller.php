<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Step4Controller extends StartController
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
        $weeks = [
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота',
            0 => 'Воскресенье',];
        return ($this->student->step_4) ? redirect()->route('finish') : view('step-4', compact('weeks'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $today = Carbon::now()->dayOfWeek;
        if ($request->day == $today)
            $data['point'] = $this->student->point + 1;
        $data['step_4'] = true;

        $this->student->update($data);
        return ($this->student) ? redirect()->route('finish') : redirect()->back()->with('error', ['Что-то пошло не так :(']);
        
    }
}
