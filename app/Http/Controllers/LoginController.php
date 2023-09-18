<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'email' => ['required', 'string', 'max:100', 'min:8'],
            'password' => ['required', 'string'],
        ]);


        if(Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], ($request->remember ? true : false)))
        {
            session(['alert' => __('main.you_have_successfully_logged_in_to_your_account')]);
            return redirect()->route('home.index');
        } else
        {
            session(['alert' => __('main.the_data_does_not_match')]);
            return redirect()->back()->withInput();
        }


    }
}
// курс
// заняття
// завдання
