<?php

namespace App\Repositories;
use App\Interfaces\CoursesInterface;
use App\Models\course ;
use App\Models\course_user ;
class CoursesRepostry implements CoursesInterface
{
    public function allCourse()
    {
        return course::all();
    }
    public function YourCourse()
    {
        return auth()->user()->courses()->get();
    }
    public function topCourse()
    {
        return course::orderBy("discriper","desc")->take(10)->get();
    }
    public function showCourse($id)
    {
        return course::find($id);
    }
    public function intoCourse($id)
    {
        if($s = course::find($id)){
            course_user::create([
               "user_id" => auth()->user()->id ,
               "course_id" => $id 
            ]);
            course::where("id",$id)->update(["discriper" => $s->discriper + 1]) ;
            return true ;
        }
        return false ;
    }
    public function outCourse($id)
    {
        if(course::find($id)){

            course_user::where(
                "user_id" , auth()->user()->id )
                ->where(
                "course_id" , $id 
             )->delete();
            return true ;
        }
        return false ;
    }
    public function revieCourse($request)
    {
        if(course::find($request->course_id)){
            $course = $course::find($request->course_id) ;
            course::where("id" , $request->course_id)->update([
                "recomendCount" => $course->recomendCount + 1 ,
                "recomendNum" => $course->recomendNum +  $request->recomendNum ,
            ]);
            return true ;
        }
        return false ;
    }
}
