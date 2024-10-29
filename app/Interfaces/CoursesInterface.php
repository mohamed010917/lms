<?php

namespace App\Interfaces;

interface CoursesInterface
{
    public function allCourse();
    public function YourCourse();
    public function topCourse();
    public function showCourse($id);
    public function intoCourse($id);
    public function outCourse($id);
    public function revieCourse($request);
}
