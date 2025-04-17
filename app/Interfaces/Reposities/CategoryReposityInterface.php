<?php

namespace App\Interfaces\Reposities;

interface CategoryReposityInterface
{
   public function AllCategories();
   public function createCateories($data);
   public function getById($id);
   public function findById($id,$data);
   public function destroy($id);
}
