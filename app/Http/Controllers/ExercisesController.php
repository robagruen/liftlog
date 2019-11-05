<?php

namespace App\Http\Controllers;

use App\Set;
use Auth;
use App\Exercise;
use App\Entry;
use App\Category;
use App\ExerciseCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExercisesController extends Controller
{
    public function index()
    {
        if (Auth::check() == true) {
            $exercises = Exercise::where('user_id', Auth::id())->getModels();
            $categories = Category::where('user_id', Auth::id())->getModels();
            $exerciseCategories = ExerciseCategories::all();
            return view('exercises', ['exercises' => $exercises, 'categories' => $categories, 'exerciseCategories' => $exerciseCategories, 'pageTitle' => 'Dashboard']);
        }
        else {
            return view('auth.login');
        }
    }

    public function viewAddExercise()
    {
        if (Auth::check() == true) {
            $categories = Category::where('user_id', Auth::id())->getModels();
            return view('add-exercise', ['page_title' => 'Add Exercise', 'categories' => $categories]);
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
        for ($i = 0; $i < $request->category_count; $i++) {
            $curr_checkbox = 'category_' . $i;
            $checkbox = $request->$curr_checkbox;
            if ($checkbox):
                $exerciseCategory = new ExerciseCategories();
                $exerciseCategory->exercise_category_id = $checkbox;
                $exerciseCategory->exercise_id = $exercise->id;
                $exerciseCategory->save();
            endif;
        }
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
        // This view has the exercise object
        if (Auth::check() && Auth::id() == $exercise->user_id)
        {
            $entries = Entry::where('exercise_id', $exercise->id)->getModels();
            $sets = Set::where('exercise_id', $exercise->id)->getModels();
            $highest_weight = 0;
            foreach ($sets as $set):
                if ($set->weight > $highest_weight):
                    $highest_weight = $set->weight;
                endif;
            endforeach;
            return view('single-exercise', ['exercise' => $exercise, 'entries' => $entries, 'sets' => $sets, 'page_title' => $exercise->name, 'highest_weight' => $highest_weight]);
        }
        else {
            return redirect('/');
        }
    }

    public function viewAddEntry($exerciseID) {
        if (Auth::check()) {
            return view('add-entry', ['exercise' => $exerciseID]);
        }
        else {
            return view('auth.login');
        }
    }

    public function addEntry(Request $request) {
        if (Auth::check()) {
            $entry = new Entry();
            $entry->exercise_id = $request->exercise_id;
            $set_count = $request->set_count;
            $entry->save();
            for ($i = 1; $i <= $set_count; $i++):
                $weight = 'weight_' . $i;
                $reps = 'reps_' . $i;

                $set = new Set();
                $set->exercise_id = $request->exercise_id;
                $set->exercise_entry_id = $entry->id;
                $set->weight = $request->$weight;
                $set->repetitions = $request->$reps;
                $set->save();
            endfor;
            $redirect_url = '/single-exercise/' . $request->exercise_id . '/';
            return redirect($redirect_url);
        }
        else {
            return view('auth.login');
        }
    }

    public function viewCategories() {
        if (Auth::check()) {
            $categories = Category::where('user_id', Auth::id())->getModels();
            $cat_count_arr = array();
            $exerciseCategories = ExerciseCategories::all();
            foreach ($categories as $category):
                $cat_count = 0;
                foreach ($exerciseCategories as $exerciseCategory):
                    if ($category->id == $exerciseCategory->exercise_category_id):
                        $cat_count++;
                    endif;
                endforeach;
                array_push($cat_count_arr, $cat_count);
            endforeach;
            return view('categories', ['categories' => $categories, 'count' => $cat_count_arr]);
        }
        else {
            return view('auth.login');
        }
    }

    public function viewAddCategory() {
        if (Auth::check()) {
            return view('add-category', ['page_title' => 'Add Category']);
        }
        else {
            return view('auth.login');
        }
    }

    public function addCategory(Request $request) {
        if (Auth::check()) {
            $category = new Category();
            $category->name = $request->name;
            $category->user_id = Auth::id();
            $category->save();
            return redirect('/categories/');
        }
        else {
            return view('auth.login');
        }
    }

    public function viewSingleCategory(Category $category) {
        $exerciseCategories = ExerciseCategories::all();
        $exercises = Exercise::where('user_id', Auth::id())->getModels();
        $categories = Category::where('user_id', Auth::id())->getModels();
        $exercise_results = array();
        foreach ($exercises as $exercise):
            foreach ($exerciseCategories as $exerciseCategory):
                if ($exercise->id == $exerciseCategory->exercise_id && $category->id == $exerciseCategory->exercise_category_id):
                    array_push($exercise_results, $exercise);
                endif;
            endforeach;
        endforeach;
        return view('exercises', ['exercises' => $exercise_results, 'categories' => $categories, 'exerciseCategories' => $exerciseCategories, 'pageTitle' => $category->name]);
    }
}
