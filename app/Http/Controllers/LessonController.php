<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
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
            'name' => ['required', 'string'],
        ]);

        $lesson = Lesson::query()->create([
            'course_id' => $request->course_id,
            'name' => $validated['name'],
        ]);

        if($lesson)
        {
            session(['alert' => __('main.you_have_successfully_created_a_lesson')." {$validated['name']}"]);

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
        $tasks = $lesson->tasks;
        if($course->id == $lesson->course_id)
        {
            return view('lesson.show', compact('tasks', 'course', 'lesson'));
        }
        else
        {
            return redirect()->route('lesson.show', ['course' => $lesson->course->id, 'lesson' => $lesson->id]);
        }

    }

    public function update(Request $request, $course, $lesson)
    {
        $lesson = Lesson::find($lesson);
        $validated = $request->validate([
            'name' => ['required'],
        ]);
        $lesson->update(['name' => $validated['name']]);
        session(['alert' => __('main.you_have_successfully_changed_the_name_of_the_lesson_to')." {$validated['name']}"]);
        return back();
    }

    public function destroy($course, $lesson)
    {
        $lesson = Lesson::find($lesson);
        foreach ($lesson->tasks as $task) {
            foreach($task->completedTasks as $completed)
            {
                $completed->delete();
            }
            $task->delete();
        }
        session(['alert' => __('main.you_have_successfully_deleted_a_lesson_called')." {$lesson->name} ".__('main.and_all_the_tasks_that_were_in_it')]);
        $lesson->delete();
        return back();
    }
}
