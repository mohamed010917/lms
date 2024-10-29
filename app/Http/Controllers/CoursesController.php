<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CoursesInterface;
use  App\Http\Resources\CourseResource ;
class CoursesController extends Controller
{
    protected $course ;

    public function __construct(CoursesInterface $course){
        $this->course = $course ;
    }
    public function allCourse()
    {
        try{
            return  response()->
            json(["data"=>CourseResource::collection($this->course->allCourse())],200);

        }catch(Exeption $e){
            return response()->json(["data"=>false],402);
        }
    }
    public function YourCourse()
    {
        try{
            return  response()->
            json(["data"=>CourseResource::collection($this->course->YourCourse())]);

        }catch(Exeption $e){
            return response()->json(["data"=>false],402);
        }
        
    }
    public function topCourse()
    {
        try{
            return  response()->
            json(["data"=>CourseResource::collection($this->course->topCourse())]);

        }catch(Exeption $e){
            return response()->json(["data"=>false],402);
        }
        
    }
    public function showCourse($id)
    {
        try{
            return  response()->json(["data" =>
            new CourseResource($this->course->showCourse($id))]);
        }catch(Exeption $e){
            return response()->json(["data"=>false],402);
        }

    }
    public function intoCourse($id)
    {
        try{
            return response()->json(["data" =>$this->course->intoCourse($id)]);

        }catch(Exeption $e){
            return response()->json(["data"=>false],402);
        }
    }
    public function outCourse($id)
    {
        try{
            return response()->json(["data" =>$this->course->outCourse($id)]);

        }catch(Exeption $e){
            return response()->json(["data"=>false],402);
        }

    }
    public function revieCourse(Request $request)
    {
        try{
            return response()->json(["data" =>$this->course->revieCourse($request)]);

        }catch(Exeption $e){
            return response()->json(["data"=>false],402);
        }

    }
}
