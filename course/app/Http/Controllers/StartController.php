<?php

namespace App\Http\Controllers;

use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StartController extends Controller
{

    public function index()
    {
        Session::forget('email');
        $students = Student::orderBy('created_at', 'desc')->take(10)->get();
        return view('index', compact('students'));
    }

    public function store(Request $request)
    {
        $student = Student::where('email', $request->email)->first();
        if ($student) {

            if (Input::has('avatar')) {
                if (isset($student->avatar)) Storage::disk('upload')->delete($student->avatar);
                $image = Student::UploadAvatar(Input::file('avatar'));
                if ($image['status'] === true) {
                    $data['avatar'] = $image['fullFileName'];
                } else {
                    return redirect()->back()->withErrors(['image' => $image['status']]);
                }
            }
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $student->update($data);
            Session::put('email', $student->email);
            
            return redirect()->route('step-1');
        } else {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:students',
                'avatar' => 'image'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator);
            }

            $data['email'] = $request->email;

            if (Input::has('avatar')) {
                $image = Student::UploadAvatar(Input::file('avatar'));
                if ($image['status'] === true) {
                    $data['avatar'] = $image['fullFileName'];
                } else {
                    return redirect()->back()->withErrors(['image' => $image['status']]);
                }
            }

            $student = Student::create($data);
            if ($student) {

                Session::put('email', $data['email']);
                return redirect()->route('step-1');
            } else
                return redirect()->back()->with('error', ['Ошибка, обратитесь к администратору']);

        }

    }

}
