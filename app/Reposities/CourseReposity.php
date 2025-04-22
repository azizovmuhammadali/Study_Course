<?php

namespace App\Reposities;

use App\Interfaces\Reposities\CourseReposityInterface;
use App\Models\Course;

class CourseReposity implements CourseReposityInterface
{
    public function AllCourses(){
 $courses = Course::all();
 return $courses;
    }
    public function createCourses($data){
  $course = new Course();
  $course->name = $data['name'];
  $course->description = $data['description'];
  $course->video = $data['video'];
  $course->slug = $data['slug'];
  $course->category_id = $data['category_id'];
  $course->save();
  return $course;
    }
    public function getById($id){
    $course = Course::where('slug',$id)->firstOrFail();
    return $course;
    }
    public function findById($id, $data){
    $course = Course::findOrFail($id);
    $course->name = $data['name'];
    $course->description = $data['description'];
    $course->video = $data['video'];
    $course->slug = $data['slug'];
    $course->category_id = $data['category_id'] ?? $course->category_id;
    $course->save();
    return $course;
    }
    public function destroy($id){
        $course = Course::findOrFail($id);
        $course->delete();
    }
}

