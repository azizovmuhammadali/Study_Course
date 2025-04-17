<?php

namespace App\Http\Controllers\V1\api\Admin;

use App\DTO\CategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Interfaces\Services\CategoryServiceInterface;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ResponseTrait;
   public function __construct(protected CategoryServiceInterface $categoryServiceInterface){}
    public function index()
    {
       $categories = $this->categoryServiceInterface->index();
       return $this->success(CategoryResource::collection($categories->load('parent','children')),__('messages.category.index'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $categoryDTO = new CategoryDTO($request->name,$request->parent_id,);
       $category = $this->categoryServiceInterface->create($categoryDTO);
       return $this->success(new CategoryResource($category),__('messages.category.create'),201);
    }

    public function show(string $id)
    {
       $category = $this->categoryServiceInterface->show($id);
       return $this->success(new CategoryResource($category->load('parent','children')),__('messages.category.show'));
    }

    public function update(CategoryUpdateRequest $request, string $id)
    {
        $categoryDTO = new CategoryDTO($request->name,$request->parent_id,);
        $category = $this->categoryServiceInterface->update($id,$categoryDTO);
        return $this->success(new CategoryResource($category),__('messages.category.update'));
    }

    public function destroy(string $id)
    {
       $category = $this->categoryServiceInterface->delete($id);
       return $this->success([],__('messages.category.delete'),204);
    }
}
