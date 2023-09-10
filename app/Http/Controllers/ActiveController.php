<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->where(['active' => false])->paginate(20);
        return view('active.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('active.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer'],
            'action' => ['required', 'in:accept,deny'],
        ]);

        if($validated['action'] == 'accept')
        {
            User::query()
            ->where(['id' => $validated['user_id']])
            ->update(['active' => 1]);

            session(['alert' => "Ви успішно активували користувача з ID {$validated['user_id']}"]);
            return back();
        } else if($validated['action'] == 'deny')
        {
            User::query()
            ->where(['id' => $validated['user_id']])
            ->update(['active' => 4]);

            session(['alert' => "Ви успішно відмовили користувачу з ID {$validated['user_id']}"]);
            return back();
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('active.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
