<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index')->withCookie('color', 'blue');
    }

    public function dark_mode(Request $request)
    {
        $response = new Response(back());
        $response->withCookie(cookie('name', 'blue', 1));

        // if($request->dark_mode)
        // {
        //     dd($request->dark_mode);
        // } else
        // {

        // }
        return $response;
    }
}
