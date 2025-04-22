<?php

namespace App\Interfaces\Reposities;

interface CourseReposityInterface
{
    public function AllCourses();
    public function createCourses($data);
    public function getById($id);
    public function findById($id,$data);
    public function destroy($id);
}
