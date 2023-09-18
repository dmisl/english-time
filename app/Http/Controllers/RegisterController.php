<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'max:20', 'confirmed'],
        ]);

        $user = User::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        if($user)
        {
            if($user->id == 1)
            {
                $user->update([
                    'active' => 1,
                    'admin' => 1,
                ]);
            }
            session(['alert' => __('main.you_have_successfully_registered')]);
            Auth::login($user, true);

            if(is_admin())
            {
                return redirect()->route('admin.index');
            }
            else
            {
                return redirect()->route('user.index');
            }
        }
        else
        {
            return redirect()->back()->withInput();
        }


    }
}
