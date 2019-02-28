<?php
namespace  App\Http\Traits;

trait StudentTrait
{
    protected $student;

    public function getStudent(){
        $this->student = \Illuminate\Support\Facades\Session::get('student');
        return $this->student;
    }
}