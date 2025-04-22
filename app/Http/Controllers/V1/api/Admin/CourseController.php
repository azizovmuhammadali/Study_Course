<?php

namespace App\Http\Controllers\V1\api\Admin;

use App\DTO\CourseDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Resources\CourseResource;
use App\Interfaces\Services\CourseServiceInterface;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    use ResponseTrait;
    public function __construct(protected CourseServiceInterface $courseServiceInterface){}
    public function index()
    {
        $courses = $this->courseServiceInterface->index();
        return $this->success(CourseResource::collection($courses),__('messages.course.index'));
    }

    public function store(CourseStoreRequest $request)
    {
        $courseDTO = new CourseDTO($request->name,$request->description,$request->file('video'),$request->category_id);
        $course = $this->courseServiceInterface->create($courseDTO);
        return $this->success(new CourseResource($course),__('messages.course.create'));
    }

    public function show(string $id)
    {
        $course = $this->courseServiceInterface->show($id);
        return $this->success(new CourseResource($course),__('messages.course.show'));
    }

    public function update(CourseUpdateRequest $request, string $id)
    {
        $courseDTO = new CourseDTO($request->name,$request->description,$request->file('video'),$request->category_id);
        $course = $this->courseServiceInterface->update($id,$courseDTO);
        return $this->success(new CourseResource($course),__('messages.course.update'));
    }

    public function destroy(string $id)
    {
        $course = $this->courseServiceInterface->delete($id);
        return $this->success([],__('messages.course.delete'));
    }
}
