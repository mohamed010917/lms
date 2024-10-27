<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\course ;
use App\Models\opeside ;
use App\Models\course_user ;
class Courses extends Component
{
    public $courses ;
    public $bage ;
    public $course ;
    public $opeside ;
    public function render()
    {
        $this->courses = auth()->user()->courses()->get();
        return view('livewire.courses',["courses" => $this->courses]);
    }
    public function delete($id){
        course_user::where("course_id",$id)->where("user_id",auth()->user()->id)->delete();
    }
    public function go($id){
        $this->bage = 1 ;
        $this->course = course::find($id);
    }
    public function goOpeside($id){
        $this->bage = 2 ;
        $this->course = opeside::find($id);
    }
    public function back(){
        $this->bage = null ;
        $this->course = null;
   }
}
