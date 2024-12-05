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

        $course = Course::query()->create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
        ]);

        if($course)
        {
            session(['alert' => __('main.you_have_successfully_created_a_course_called')." {$request->input('name')}"]);

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

    public function update(Request $request, $course)
    {
        $course = Course::find($course);
        $validated = $request->validate([
            'name' => ['required', 'min:4'],
        ]);
        $course->update(['name' => $validated['name']]);
        session(['alert' => __('main.you_have_successfully_changed_the_course_name_to')." {$validated['name']}"]);
        return back();
    }

    public function destroy($course)
    {
        $course = Course::find($course);
        foreach ($course->lessons as $lesson) {
            foreach ($lesson->tasks as $task) {
                foreach ($task->completedTasks as $completed) {
                    $completed->delete();
                }
                $task->delete();
            }
            $lesson->delete();
        }
        $acceses = Access::query()->where(['course_id' => $course->id])->get();
        foreach ($acceses as $access) {
            $access->delete();
        }
        session(['alert' => __('main.you_have_successfully_deleted_the_course_called')." {$course->name}, ".__('main.all_lessons_and_all_assignments_that_were_in_it')]);
        $course->delete();
        return back();
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
