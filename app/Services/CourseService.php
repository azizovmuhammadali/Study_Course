<?php

namespace App\Services;

use App\Interfaces\Reposities\CourseReposityInterface;
use App\Interfaces\Services\CourseServiceInterface;
use App\Models\Course;

class CourseService extends BaseService implements CourseServiceInterface
{

    public function __construct(protected CourseReposityInterface $courseReposityInterface)
    {
        //
    }
    public function index(){
    return $this->courseReposityInterface->AllCourses();
    }
    public function create($courseDTO){
        $slug = $this->generateUniqueSlug($courseDTO->name,Course::class);
    $data = [
        'name' => $courseDTO->name,
        'description' => $courseDTO->description,
        'video' => $courseDTO->video,
        'slug' => $slug,
        'category_id' => $courseDTO->category_id
    ];
    return $this->courseReposityInterface->createCourses($data);
    }
    public function show($id){
  return $this->courseReposityInterface->getById($id);
    }
    public function update($id, $courseDTO){
        $slug = $this->generateUniqueSlug($courseDTO->name,Course::class);
        $data = [
            'name' => $courseDTO->name,
            'description' => $courseDTO->description,
            'video' => $courseDTO->video,
            'slug' => $slug,
            'category_id' => $courseDTO->category_id
        ];
        return $this->courseReposityInterface->findById($id,$data);
    }
    public function delete($id){
   return $this->courseReposityInterface->destroy($id);
    }
}


