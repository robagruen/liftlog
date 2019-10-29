<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exercise;
use App\Set;

class Entry extends Model
{
    protected $table = 'exercise_entries';

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function sets()
    {
        return $this->hasMany(Set::class);
    }
}
