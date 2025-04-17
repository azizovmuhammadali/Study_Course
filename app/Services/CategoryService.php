<?php

namespace App\Services;

use App\Interfaces\Reposities\CategoryReposityInterface;
use App\Interfaces\Services\CategoryServiceInterface;
use App\Models\Category;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    public function __construct(protected CategoryReposityInterface $categoryReposityInterface)
    {
        //
    }
    public function index(){
     return $this->categoryReposityInterface->AllCategories();
    }
    public function create($categoryDTO)
    {
        $slug = $this->generateUniqueSlug($categoryDTO->name,Category::class);
    $data = [
    'name' => $categoryDTO->name,
    'parent_id' => $categoryDTO->parent_id ?? null,
    'slug' => $slug,
    ];
    return $this->categoryReposityInterface->createCateories($data);
    }
    public function show($id){
     return $this->categoryReposityInterface->getById($id);
    }
    public function update($id, $categoryDTO){
        $slug = $this->generateUniqueSlug($categoryDTO->name,Category::class);
        $data = [
        'name' => $categoryDTO->name,
        'parent_id' => $categoryDTO->parent_id ?? null,
        'slug' => $slug,
        ];
        return $this->categoryReposityInterface->findById($id,$data);
    }
    public function delete($id){
    return $this->categoryReposityInterface->destroy($id);
    }
}