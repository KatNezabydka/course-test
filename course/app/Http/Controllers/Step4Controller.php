<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class Step4Controller extends Controller
{


    public function index()
    {
        $student = Student::where('email', Session::get('email'))->first();
        if ($student->step_4) return redirect()->route('finish');
        else {
            $weeks = [
                1 => 'Понедельник',
                2 => 'Вторник',
                3 => 'Среда',
                4 => 'Четверг',
                5 => 'Пятница',
                6 => 'Суббота',
                0 => 'Воскресенье',];
            return view('step-4', compact('weeks'));
        }
    }

    public function store(Request $request)
    {
        $student = Student::where('email', Session::get('email'))->first();
        $today = Carbon::now()->dayOfWeek;
        if ($request->day == $today)
            $data['point'] = $student->point + 1;
        $data['step_4'] = true;

        $student->update($data);
        if ($student) {
            return redirect()->route('finish');
        } else
            return redirect()->back()->with('error', ['Что-то пошло не так :(']);


    }
}
