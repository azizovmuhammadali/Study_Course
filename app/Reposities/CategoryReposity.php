<?php

namespace App\Reposities;

use App\Interfaces\Reposities\CategoryReposityInterface;
use App\Models\Category;

class CategoryReposity implements CategoryReposityInterface
{
  public function AllCategories(){
   $categories = Category::all();
   return $categories;
  }
  public function createCateories($data){
  $category = new Category();
  $category->name = $data['name'];
  $category->parent_id = $data['parent_id'];
  $category->slug = $data['slug'];
  $category->save();
  return $category;
  }
  public function getById($id){
  $category = Category::where('slug',$id)->firstOrFail();
  return $category;
  }
   public function findById($id, $data){
   $category = Category::findOrFail($id);
   $category->name = $data['name'] ?? $category->name;
   $category->parent_id = $data['parent_id'] ?? $category->parent_id;
   $category->slug = $data['slug'];
   $category->save();
   return $category;
   }
   public function destroy($id){
    $category = Category::findOrFail($id);
    $category->delete();
   }
}
