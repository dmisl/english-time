<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{

    public function index()
    {
        if (is_admin()) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('user.index');
        }
    }

    public function create($id)
    {
        $course = Course::find($id);
        return view('lesson.create', compact('course'));
    }


    public function store($id, Request $request)
    {
        $validated = $request->validate([
            'lesson_name' => ['required', 'string'],
        ]);

        $lesson = Lesson::query()->create([
            'course_id' => $request->course_id,
            'name' => $validated['lesson_name'],
        ]);

        if($lesson)
        {
            session(['alert' => __('main.you_have_successfully_created_a_lesson')." {$validated['lesson_name']}"]);

            return redirect()->route('course.show', [$request->course_id]);
        }
        else
        {
            return redirect()->back()->withInput();
        }


    }

    public function show($course, $lesson)
    {
        $lesson = Lesson::find($lesson);
        $course = $lesson->course;
        $tasks = Task::query()->where(['lesson_id' => $lesson->id])->orderBy('position', 'asc')->get();
        if($course->id == $lesson->course_id)
        {
            return view('lesson.show', compact('tasks', 'course', 'lesson'));
        }
        else
        {
            return redirect()->route('lesson.show', ['course' => $lesson->course->id, 'lesson' => $lesson->id]);
        }

    }

    public function getData(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:lessons']
        ]);
        $user = User::find(Auth::id());
        $lesson = Lesson::find($request->id);
        if($user->id == $lesson->course->user_id)
        {
            return response()->json([
                'lesson' => $lesson->name
            ]);
        }
        return response()->json([
            'message' => 'Lesson doesnt exist or is not owned by autorized user'
        ]);
    }

    public function updatee(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:lessons'],
            'name' => ['required', 'min:5']
        ]);
        $user = User::find(Auth::id());
        $lesson = Lesson::find($request->id);
        if($user->id == $lesson->course->user_id)
        {
            $lesson->update([
                'name' => $request->name,
            ]);
            return response()->json([
                'message' => 'something'
            ]);
        } else
        {
            return response()->json([
                'message' => 'Lesson is not owned by the authorized user'
            ], 404);
        }
    }

    public function deletee(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:lessons']
        ]);
        $user = User::find(Auth::id());
        $lesson = Lesson::find($request->id);
        if($user->id == $lesson->course->user_id)
        {
            foreach ($lesson->tasks as $task) {
                $task->delete();
            }
            $lesson->delete();
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'Lesson doesnt exist, or is not owned by authorized user'
        ], 404);
    }

}
