<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function index()
    {
        if(is_admin())
        {
            return redirect()->route('admin.index');
        }
        else
        {
            return redirect()->route('user.index');
        }
    }

    public function create()
    {
        return view('course.create');
    }

    public function show(string $id)
    {
        $course = Course::find($id);
        $lessons = $course->lessons()->orderBy('created_at', 'asc')->get();

        return view('course.show', compact('course', 'lessons'));
    }

    public function store(Request $request)
    {

        $course = Course::create([
            'user_id' => Auth::id(),
            'name' => $request->course_name,
        ]);

        if($course)
        {
            session(['alert' => __('main.you_have_successfully_created_a_course_called')." {$request->course_name}"]);

            return redirect()->route('admin.index');
        }
        else
        {
            return back();
        }

    }

    public function edit(string $id)
    {
        return view('course.edit', $id);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:courses'],
            'name' => ['required', 'min:5']
        ]);
        $user = User::find(Auth::id());
        $course = Course::find($request->id);
        if($user->id == $course->user_id)
        {
            $course->update([
                'name' => $request->name,
            ]);
            return response()->json([
                'message' => 'something'
            ]);
        } else
        {
            return response()->json([
                'message' => 'Course is not owned by the authorized user'
            ], 404);
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:courses']
        ]);
        $user = User::find(Auth::id());
        $course = Course::find($request->id);
        if($user->id == $course->user_id)
        {
            foreach($course->lessons as $lesson)
            {
                foreach ($lesson->tasks as $task) {
                    $task->delete();
                }
                $lesson->delete();
            }
            $acceses = Access::query()->where(['course_id' => $course->id])->get();
            foreach ($acceses as $access) {
                $access->delete();
            }
            $course->delete();
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'Course doesnt exist, or is not owned by authorized user'
        ], 404);
    }

    public function lesson_create($id)
    {
        return view('lesson.create', compact('id'));
    }

    public function getData(Request $request)
    {
        $course = Course::select('name')->where('id', $request->id)->first();
        $user = User::find(Auth::id());
        if($course && $course->user_id = $user->id)
        {
            return response()->json([
                'course' => $course->name
            ]);
        }
        return response()->json([
            'message' => 'Course doesnt exist or is not owned by authenticated user' 
        ], 404);
    }
}
