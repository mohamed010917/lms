<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\course ;
use App\Models\course_user ;

class Dashbord extends Component
{
    public $courses ;
    public function render()
    {
        $this->courses = course::all();
        return view('livewire.dashbord',["courses"=>$this->courses]);
    }

    public function joinCourse($id){
        course_user::create([
            "user_id" => auth()->user()->id ,
            "course_id" => $id ,
        ]);
    }
}
