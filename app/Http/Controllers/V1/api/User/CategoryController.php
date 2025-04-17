<?php

namespace App\Http\Controllers\V1\api\User;

use App\Trait\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Interfaces\Services\CategoryServiceInterface;

class CategoryController extends Controller
{
    use ResponseTrait;
   public function __construct(protected CategoryServiceInterface $categoryServiceInterface){}
    public function index()
    {
       $categories = $this->categoryServiceInterface->index();
       return $this->success(CategoryResource::collection($categories->load('parent','children')),__('messages.category.index'));
    }
    public function show(string $id)
    {
       $category = $this->categoryServiceInterface->show($id);
       return $this->success(new CategoryResource($category->load('parent','children')),__('messages.category.show'));
    }
}
