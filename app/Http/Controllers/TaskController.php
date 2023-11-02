<?php

namespace App\Http\Controllers;

use App\Models\CompletedTask;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Task;
use App\Models\TaskType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (is_admin()) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('user.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($course, $lesson)
    {
        $task_types = TaskType::query()->get();

        return view('task.create', compact('course', 'lesson', 'task_types'));
    }

    public function store($course, $lesson, Request $request)
    {

        $validated = $request->validate([
            'task_name' => ['required', 'string'],
            'task_body' => ['required'],
            'task_type' => ['required'],
            'task_image' => ['nullable'],
        ]);

        $task = Task::query()->create([
            'lesson_id' => $request->input('lesson_id'),
            'name' => $validated['task_name'],
            'body' => $validated['task_body'],
            'task_type' => $validated['task_type'],
            'task_image' => '',
        ]);


        if ($task) {
            session(['alert' => __('main.you_have_successfully_created_a_task_named')." {$validated['task_name']}"]);

            return redirect()->route('task.show', [$course, $lesson, $task->id]);
        } else {
            return redirect()->back()->withInput();
        }

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show($course, $lesson, $task)
    {
        $task = Task::find($task);

        if($task)
        {
            $completed = CompletedTask::query()->where(['user_id' => Auth::id(), 'task_id' => $task->id])->first();
            if($completed)
            {
                return redirect()->route('user.task.completed', [Auth::id(), $course, $lesson, $task]);
            }
            else
            {
                return view('task.show', compact('task', 'lesson', 'course'));
            }
        } else
        {
            return back();
        }



    }

    public function check(Request $request)
    {
        $completed = CompletedTask::query()->where(['user_id' => Auth::id(), 'task_id' => $request->task_id])->first();

        if($completed)
        {
            session(['alert' => __('main.you_have_already_completed_this_task')]);
            return redirect()->back();
        } else
        {
            $completedTask = CompletedTask::query()->create([
                'user_id' => Auth::id(),
                'task_id' => $request->task_id,
                'text' => $request->input('completed_task'),
                'percentage' => $request->percentage,
            ]);

            return redirect()->route('user.task.completed', [Auth::id(), $request->input('course_id'), $request->input('lesson_id'), $request->task_id]);
        }

    }

    public function showcompleted($user_id, $course, $lesson, $task)
    {
        $task = Task::find($task);
        $user = User::find($user_id);
        $completed = CompletedTask::query()->where(['task_id' => $task->id])->where(['user_id' => $user_id])->first();

        return view('task.completed', compact('task', 'completed', 'user', 'lesson', 'course'));
    }

    public function completed()
    {
        $completedTasks = CompletedTask::query()->paginate(20);

        return view('task.homework', compact('completedTasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($course, $lesson, $task)
    {

        $task = Task::find($task);

        return view('task.edit', compact('task', 'course', 'lesson'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $task = Task::find($request->id);

        $task->update([

            'name' => $request->name,
            'body' => $request->body

        ]);

        return redirect()->route('task.show', [$task->lesson->course->id, $task->lesson->id, $task->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($course, $lesson, $task)
    {
        $task = Task::find($task);
        foreach ($task->completedTasks as $completed) {
            $completed->delete();
        }
        session(['alert' => __('main.you_have_successfully_deleted_the_task_called')." {$task->name}"]);
        $task->delete();
        return back();
    }
}
