<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;
use Auth;
use App\Exercises;

class ExercisesController extends Controller
{

    /**
     * The data/base table used by the model.
     *
     * @var string
     */
    protected $table = 'exercises';

    public function index()
    {
        $user = Auth::user();
        return view('exercises',compact('user'));
    }

    public function add()
    {
        return view('add-exercise');
    }

    public function create(Request $request)
    {
        $exercise = new Exercise();
        $exercise->name = $request->name;
        $exercise->user_id = Auth::id();
        $exercise->save();
        return redirect('/');
    }

    public function edit(Exercise $exercise)
    {
        if (Auth::check() && Auth::user()->id == $exercise->user_id)
        {
            return view('single-exercise', compact('exercise'));
        }
        else {
            return redirect('/');
        }
    }

    public function update()
    {

    }

}
