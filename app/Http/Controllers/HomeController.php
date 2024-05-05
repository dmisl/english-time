<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index()
    {

        $locale = App::currentLocale();

        if($locale == 'en')
        {

            return view('home.en');

        } else if($locale == 'ua')
        {

            return view('home.ua');

        } else if($locale == 'pl')
        {

            return view('home.pl');

        } else
        {

            return view('home.en');

        }

    }

    public function locale(Request $request)
    {
        if(in_array($request->locale, ['ua', 'en', 'pl']))
        {
            session(['locale' => $request->locale]);
            return back();
        } else
        {
            session(['alert' => 'error']);
            return back();
        }
    }

    public function dark_mode(Request $request)
    {
        if($request->has('dark_mode'))
        {
            $cookie = Cookie::forget('dark_mode');
            $cookie = Cookie::forever('dark_mode', 'dark');
        } else
        {
            $cookie = Cookie::forget('dark_mode');
            $cookie = Cookie::forever('dark_mode', 'light');
        }
        $response = new Response(back());

        return $response->withCookie($cookie);
    }

    public function file(Request $request)
    {

        dd(1);
        dd($request->all());

        return back();

    }

}
