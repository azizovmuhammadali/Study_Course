<?php

namespace App\Interfaces\Services;

interface CategoryServiceInterface
{
    public function index();
    public function create($categoryDTO);
    public function show($id);
    public function update($id,$categoryDTO);
    public function delete($id);
}
