<?php

use App\Models\Access;
use App\Models\CompletedTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

if(!function_exists('is_active'))
{
    function active_link(string $name) : string
    {
        return Route::is($name) ? 'text-decoration-underline' : '';
    }
}

if (!function_exists('is_active')) {
    function is_active()
    {
        if (Auth::check() && Auth::user()->active == 1) {
            return true;
        }
        else
        {
            return false;
        }
    }
}

if (!function_exists('is_admin')) {
    function is_admin()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            return true;
        } else {
            return false;
        }
    }
}

if(!function_exists('completed'))
{
    function completed($task_id)
    {
        $completed = CompletedTask::query()->where(['user_id' => Auth::id()])->where(['task_id' => $task_id])->first();
        if($completed)
        {
            return true;
        } else
        {
            return false;
        }
    }
}

if (!function_exists('completed_id')) {
    function completed_id($task_id, $user_id)
    {
        return CompletedTask::query()->where(['user_id' => $user_id])->where(['task_id' => $task_id])->first('user_id');
    }
}

if (!function_exists('has_access')) {
    function has_access($course)
    {
        $access = Access::query()->where(['user_id' => Auth::id()])->where(['course_id' => $course])->first();
        if($access)
        {
            return true;
        } else
        {
            return false;
        }
    }
}

if (!function_exists('selected')) {
    function selected($name, $needed)
    {
        if($name == $needed)
        {
            return 'selected';
        }
    }
}

// darkmode

if(!function_exists('dark_mode'))
{
    function dark_mode()
    {
        if(Cookie::get('dark_mode') == 'dark')
        {
            return 'checked';
        } else
        {
            return '';
        }
    }
}

// dark mode text

if(!function_exists('dark_mode_text'))
{
    function dark_mode_text()
    {
        if (Cookie::get('dark_mode') == 'dark') {
            return 'text-light';
        } else {
            return 'text-dark';
        }
    }
}

// locale

if(!function_exists('locale'))
{
    function locale()
    {
        return Config::get('app.locale');
    }
}

?>
