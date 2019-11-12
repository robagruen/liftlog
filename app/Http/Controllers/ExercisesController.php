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
            $exercises = Exercise::where('user_id', Auth::id())->orderBy('name', 'asc')->getModels();
            $categories = Category::where('user_id', Auth::id())->orderBy('name', 'asc')->getModels();
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
            $categories = Category::where('user_id', Auth::id())->orderBy('name', 'asc')->getModels();
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

    public function viewSingleExercise(Exercise $exercise)
    {
        // This view has the exercise object
        if (Auth::check() && Auth::id() == $exercise->user_id)
        {
            $entries = Entry::where('exercise_id', $exercise->id)->latest()->getModels();
            $sets = Set::where('exercise_id', $exercise->id)->getModels();
            $highest_weight = 0;
            $top_entry_info = array();
            foreach ($sets as $set):
                if ($set->weight > $highest_weight):
                    $highest_weight = $set->weight;
                    $time = date('F d, Y', strtotime($set->updated_at));
                    $top_entry_info = array('weight' => $highest_weight, 'time' => $time);
                endif;
            endforeach;
            return view('single-exercise', ['exercise' => $exercise, 'entries' => $entries, 'sets' => $sets, 'page_title' => $exercise->name, 'top_entry_info' => $top_entry_info]);
        }
        else {
            return redirect('/');
        }
    }

    public function viewAddEntry($exerciseID) {
        if (Auth::check()) {
            $exercise = Exercise::where('id', $exerciseID)->getModels();
            return view('add-entry', ['exercise' => $exerciseID, 'exercise_name' => $exercise]);
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

    public function deleteEntry(Exercise $exercise, Entry $entry) {
        Set::where('exercise_entry_id', $entry->id)->delete();
        Entry::where('id', $entry->id)->delete();
        $redirectLink = '/single-exercise/' . $exercise->id . '/';
        return redirect($redirectLink);
    }

    public function viewCategories() {
        if (Auth::check()) {
            $categories = Category::where('user_id', Auth::id())->orderBy('name', 'asc')->getModels();
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
        $exercises = Exercise::where('user_id', Auth::id())->orderBy('name', 'asc')->getModels();
        $categories = Category::where('user_id', Auth::id())->orderBy('name', 'asc')->getModels();
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

    public function viewSettings() {
        if (Auth::check()) {
            $exercises = Exercise::where('user_id', Auth::id())->orderBy('name', 'asc')->getModels();
            $categories = Category::where('user_id', Auth::id())->orderBy('name', 'asc')->getModels();
            return view('settings', ['exercises' => $exercises, 'categories' => $categories]);
        }
        else {
            return view('auth.login');
        }
    }

    public function deleteExercise(Exercise $exercise) {
        if (Auth::check()) {
            Set::where('exercise_id', $exercise->id)->delete();
            Entry::where('exercise_id', $exercise->id)->delete();
            ExerciseCategories::where('exercise_id', $exercise->id)->delete();
            Exercise::where('id', $exercise->id)->delete();
            return redirect('/settings/');
        }
        else {
            return view('auth.login');
        }
    }

    public function deleteCategory(Category $category) {
        if (Auth::check()) {
            ExerciseCategories::where('exercise_category_id', $category->id)->delete();
            Category::where('id', $category->id)->delete();
            return redirect('/settings/');
        }
        else {
            return view('auth.login');
        }
    }
}
