<?php

namespace App\DTO;

class CourseDTO
{
    /**
     * Create a new class instance.
     */
    public $name;
    public $description;
    public $video;
    public $category_id;
    public function __construct($name,$description,$video,$category_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->video = $video;
        $this->category_id = $category_id;
    }
}
