<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exercise;
use App\Category;

class ExerciseCategories extends Model
{
    protected $table = 'exercise_categories';

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
