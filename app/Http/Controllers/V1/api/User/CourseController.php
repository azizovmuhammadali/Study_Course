<?php

namespace App\Http\Controllers\V1\api\User;

use App\Trait\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Interfaces\Services\CourseServiceInterface;

class CourseController extends Controller
{
    use ResponseTrait;
    public function __construct(protected CourseServiceInterface $courseServiceInterface){}
    public function index()
    {
        $courses = $this->courseServiceInterface->index();
        return $this->success(CourseResource::collection($courses),__('messages.course.index'));
    }
    public function show(string $id)
    {
        $course = $this->courseServiceInterface->show($id);
        return $this->success(new CourseResource($course),__('messages.course.show'));
    }
}
