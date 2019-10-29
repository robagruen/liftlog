<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Entry;

class Set extends Model
{
    protected $table = 'exercise_entry_sets';

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }
}
