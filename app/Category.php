<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Category extends Model
{
    protected $table = 'exercise_category';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
