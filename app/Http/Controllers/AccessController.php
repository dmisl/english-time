<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->where(['active' => true])->paginate(20);
        $courses = Course::query()->where('user_id', '=', Auth::id())->get();
        $courses_id = [];
        $course_model = Course::query();
        foreach($courses as $course)
        {
            $courses_id[] = $course->id;
        }

        return view('access.index', compact('users', 'courses', 'courses_id', 'course_model'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'select' => ['required', 'in:store,delete'],
            'user_id' => ['required'],
        ]);

        if($validated['select'] == 'store')
        {
            $access = Access::query()->create([
                'user_id' => $validated['user_id'],
                'course_id' => $request->course_store,
            ]);

            session(['alert' => __('main.you_have_successfully_granted_the_user_with_ID')." {$validated['user_id']} ".__('main.access_to_the_course_with_ID')." {$request->course_store}"]);
        } else if($validated['select'] == 'delete')
        {
            $access = Access::query()
                ->where('user_id', '=', $validated['user_id'])
                ->where('course_id', '=', $request->course_delete)
                ->delete();
            session(['alert' => __('main.you_have_successfully_removed_access_to_the_course_with_ID')." {$validated['user_id']} ".__('main.from_the_user_with_ID')." {$request->course_delete}"]);

        } else
        {
            session(['alert' => __('main.you_have_not_chosen_a_course')]);
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
        return view('access.edit');
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
