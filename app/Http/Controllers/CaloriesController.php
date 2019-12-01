<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class CaloriesController extends Controller
{
    public function viewCalories() {
        if (Auth::check()) {
            $calories = 1;
            return view('calories', ['exercises' => $calories]);
        }
        else {
            return view('auth.login');
        }
    }

    public function viewAddCaloriesEntry() {
        if (Auth::check()) {
            return view('add-calories-entry');
        }
        else {
            return view('auth.login');
        }
    }

    public function viewSingleCaloriesEntry() {
        if (Auth::check()) {
            return view('single-calories-entry');
        }
        else {
            return view('auth.login');
        }
    }
}
