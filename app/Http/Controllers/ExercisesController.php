<?php

namespace App\Http\Controllers;

use Auth;
use App\Exercise;
use App\Entry;
use Illuminate\Http\Request;

class ExercisesController extends Controller
{
    public function index()
    {
        if (Auth::check() == true) {
            $exercises = Exercise::where('user_id', Auth::id())->getModels();
            return view('exercises', ['exercises' => $exercises]);
        }
        else {
            return view('auth.login');
        }
    }

    public function viewAddExercise()
    {
        if (Auth::check() == true) {
            return view('add-exercise');
        }
        else {
            return view('auth.login');
        }
    }

    public function addExercise(Request $request)
    {
        $exercise = new Exercise();
        $exercise->name = $request->name;
        $exercise->user_id = Auth::id();
        $exercise->save();
        return redirect('/');
    }

    protected  function checkExercise(String $exerciseName):bool
    {
        $check = Exercise::where('name', $exerciseName)->getModels();
        if ($check){
            return true;
        }
        return false;
    }

    public function viewSingleExercise(Exercise $exercise)
    {
        if (Auth::check() && Auth::user()->id == $exercise->user_id)
        {
            $entries = Entry::where('exercise-id', $exercise->id)->getModels();
            return view('single-exercise', ['exercise' => $exercise, 'entries' => $entries]);
        }
        else {
            return redirect('/');
        }
    }
}
