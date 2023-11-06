<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        if(is_admin())
        {
            $courses = User::find(Auth::id())->courses;
            return view('admin.index')->with('courses', $courses);
        }
        else
        {
            $accesses = User::find(Auth::id())->accesses;
            $access = [];
            foreach ($accesses as $acces) {
                $access[] = $acces->course_id;
            }
            $courses = Course::query()->whereIn('id', $access)->get();
            return view('user.index')->with('courses', $courses);
        }


    }

    public function logout()
    {
        Auth::logout();
        session(['alert' => __('main.you_are_logged_out_of_your_account')]);
        return redirect()->route('home.index');
    }

}
