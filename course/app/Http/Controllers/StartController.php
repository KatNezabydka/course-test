<?php

namespace App\Http\Controllers;

use App\Http\Traits\StudentTrait;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class StartController extends Controller
{
use StudentTrait;

    /**
     * @return mixed
     */
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->take(10)->get();
        Session::forget('student');
        return view('index', compact('students'));
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function store(Request $request)
    {
        $this->student = Student::where('email', $request->email)->first();
        if ($this->student) {

            if (Input::has('avatar')) {
                if (isset($this->student->avatar)) Storage::disk('upload')->delete($this->student->avatar);
                $image = Student::UploadAvatar(Input::file('avatar'));
                if ($image['status']) {
                    $data['avatar'] = $image['fullFileName'];
                } else {
                    return redirect()->back()->withErrors(['image' => $image['status']]);
                }
            }
            $data['point'] = 0;
            $data['step_1'] = 0;
            $data['step_2'] = 0;
            $data['step_3'] = 0;
            $data['step_4'] = 0;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $this->student->update($data);
            
            Session::put('student', $this->student);
            
            return redirect()->route('step-1');
            
        } else {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:students',
                'avatar' => 'image'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            $data['email'] = $request->email;

            if (Input::has('avatar')) {
                $image = Student::UploadAvatar(Input::file('avatar'));
                if ($image['status'])
                    $data['avatar'] = $image['fullFileName'];
                else
                    return redirect()->back()->withErrors(['image' => $image['status']]);

            }

            $this->student = Student::create($data);
            if ($this->student) {
                Session::put('student', $this->student);
                return redirect()->route('step-1');
            } else
                return redirect()->back()->with('error', ['Ошибка, обратитесь к администратору']);

        }

    }


}
