<?php

namespace App\DTO;

class CategoryDTO
{
    /**
     * Create a new class instance.
     */
    public $name;
    public $parent_id;
    public function __construct($name,$parent_id)
    {
        $this->name = $name;
        $this->parent_id = $parent_id;
    }
}
