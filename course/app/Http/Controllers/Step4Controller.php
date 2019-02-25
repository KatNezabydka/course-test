<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class Step4Controller extends Controller
{
    public function index(Request $request)
    {
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

    public function store(Request $request)
    {
        $student = Student::where('email', Session::get('email'))->first();
        $today = Carbon::now()->dayOfWeek;
        if ($request->day == $today)
            $data['point'] = $student->point + 1;
        $data['step_4'] = true;

//        $start = $student->created_at;
//        $end = $student->updated_at;
//        $difference = $start->diff($end);
//        dd($difference);
        $student->update($data);
        if ($student) {
            return redirect()->route('finish');
        } else
            return redirect()->back()->with('error', ['Что-то пошло не так :(']);


    }
}
