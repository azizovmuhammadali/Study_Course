<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'video',
        'slug',
        'category_id',
    ];
    public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function url(): Attribute
    {
        return Attribute::make(fn(): string => URL::to('storage/' . $this->video));
    }
}
