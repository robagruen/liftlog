<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ExerciseCategories;
use App\Entry;

class Exercise extends Model
{
    protected $table = 'exercises';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exerciseCategories()
    {
        return $this->belongsTo(ExerciseCategories::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
