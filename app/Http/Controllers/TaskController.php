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
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{

    public function index()
    {
        if (is_admin()) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('user.index');
        }
    }

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
            'upload' => ['nullable'],
        ]);

        if($request->upload)
        {

            foreach ($request->upload as $id => $file) {

                $storaged = Storage::put("task_images", $file);

                $path = asset('storage/'.$storaged);

                $validated['task_body'] = str_replace("change{$id}", $path, $validated['task_body']);

                $str = $_SERVER['DOCUMENT_ROOT'];
                $strlen = strlen($str);

                $str = substr($str, 0, $strlen-7);

                copy("{$str}/storage/app/public/{$storaged}", "{$str}/public/storage/{$storaged}");

            }

        }

        $tasks_count = Lesson::find($lesson)->tasks->count();

        $task = Task::query()->create([
            'lesson_id' => $request->input('lesson_id'),
            'name' => $validated['task_name'],
            'body' => $validated['task_body'],
            'task_type' => $validated['task_type'],
            'task_image' => '',
            'position' => $tasks_count + 1,
        ]);

        if ($task) {
            session(['alert' => __('main.you_have_successfully_created_a_task_named')." {$validated['task_name']}"]);

            return redirect()->route('task.show', [$course, $lesson, $task->id]);
        } else {
            return redirect()->back()->withInput();
        }

        return redirect()->back()->withInput();
    }

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
        if($completed)
        {

            return view('task.completed', compact('task', 'completed', 'user', 'lesson', 'course'));

        } else if($task)
        {

            return redirect()->route('task.show', [$task->lesson->course->id, $task->lesson->id, $task->id]);

        }

    }

    public function completed()
    {
        $completedTasks = CompletedTask::query()->paginate(20);

        return view('task.homework', compact('completedTasks'));
    }

    public function edit($course, $lesson, $task)
    {

        $task = Task::find($task);

        return view('task.edit', compact('task', 'course', 'lesson'));

    }

    public function update(Request $request, string $id)
    {

        $task = Task::find($request->id);
        foreach ($task->completedTasks as $completed) {
            $completed->delete();
        }

        $validated = $request->validate([

            'name' => ['string', 'required'],
            'body' => ['required'],
            'task_type' => ['required'],
            'upload' => ['nullable'],

        ]);

        if($request->upload)
        {

            foreach ($request->upload as $id => $file) {

                $storaged = Storage::put("task_images", $file);


                $path = asset('storage/'.$storaged);

                $validated['body'] = str_replace("change{$id}", $path, $validated['body']);

                $str = $_SERVER['DOCUMENT_ROOT'];
                $strlen = strlen($str);

                $str = substr($str, 0, $strlen-7);

                copy("{$str}/storage/app/public/{$storaged}", "{$str}/public/storage/{$storaged}");

            }

        }

        $task->update([

            'name' => $validated['name'],
            'body' => $validated['body']

        ]);

        return redirect()->route('task.show', [$task->lesson->course->id, $task->lesson->id, $task->id]);

    }

    public function destroy($course, $lesson, $task)
    {
        $task = Task::find($task);

        // CHANGING POSITION OF EXISTING ELEMENTS
        $tasks = Task::query()->where('position', '>', $task->position)->get();
        foreach ($tasks as $t) {

            $t->update([
                'position' => $t->position-1,
            ]);

        }
        // DELETING COMPLETED TASKS OF THIS
        foreach ($task->completedTasks as $completed) {
            $completed->delete();
        }
        session(['alert' => __('main.you_have_successfully_deleted_the_task_called')." {$task->name}"]);
        $task->delete();
        return back();
    }

    public function position(Request $request)
    {

        foreach ($request->position as $id => $position) {

            Task::find($id)->update([
                'position' => $position
            ]);

        }

        return back();

    }

    public function uploadImage(Request $request)
    {

        if($request->hasFile('upload'))
        {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('storage/task_images'), $fileName);

            $url = asset('storage/task_images/'.$fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);

        }

    }

}
