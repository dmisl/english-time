@extends('layouts.main')
@section('main.title', env('APP_NAME').' | '.$lesson->name)

@section('main.content')

<div class="container">
    <h1>{{ $lesson->name }}</h1>

    <div class="row">

        @if(is_admin())
        <a href="{{ route('course.show', [$course]) }}">Назад</a>
        <x-card>
            <a class='text-decoration-none text-success' href="{{ route('task.create', [$course->id, $lesson->id]) }}">
            <x-card-body>
                <h1>
                    +
                </h1>
            </x-card-body>
        </a>
    </x-card>
    @if($tasks->count() == 0)

    <h3>Ви ще не створити завдань в цьому уроці</h3>

    @else

    @foreach ($tasks as $task)
    @if(completed($task->id))
    <div class="col-12 col-md-6 py-3">
        <x-card style="user-select: none;">
            @php

            $user_id = completed_id($task->id, Auth::id())->user_id;

            @endphp
        <a class="text-decoration-none" href="{{ route('task.completed', [$user_id, $course->id, $lesson->id, $task->id]) }}">
            <x-card-body class="border-bottom">
                <p class="p-0 m-0" style="font-size: 19px;">{{ $task->name }}</p>
                <p class="small text-muted m-0 p-0">{{ $task->created_at }}</p>
            </x-card-body>
        </a>
            <x-card-body class="py-1">
                <img class="my-0" style="width: 30px; cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteTaskModal{{ $task->id }}" src="{{ asset('storage/icons/delete_red.png') }}" alt="delete">
            </x-card-body>
            <div class="modal fade" id="deleteTaskModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Видалення завдання</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Ви дійсно хочете видалити завдання з назвою <span class="text-danger">"{{ $task->name }}"</span></h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ні</button>
                      <x-form action="{{ route('task.destroy', [$course->id, $lesson->id, $task->id]) }}" method="DELETE">
                          <button type="submit" class="btn btn-primary">Видалити</button>
                      </x-form>
                    </div>
                  </div>
                </div>
              </div>
        </x-card>
        </div>
        @else

            <div class="col-12 col-md-6 py-3">

        <x-card>
            <a class="text-decoration-none" href="{{ route('task.show', [$course->id, $lesson->id, $task->id]) }}">
                <x-card-body class="border-bottom">
                    <p class="p-0 m-0" style="font-size: 19px;">{{ $task->name }}</p>
                    <p class="small text-muted m-0 p-0">{{ $task->created_at }}</p>
                </x-card-body>
            </a>
            <x-card-body class="py-1">
                <img class="my-0" style="width: 30px; cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteTaskModal{{ $task->id }}" src="{{ asset('storage/icons/delete_red.png') }}" alt="delete">
            </x-card-body>
            <div class="modal fade" id="deleteTaskModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Видалення завдання</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Ви дійсно хочете видалити завдання з назвою <span class="text-danger">"{{ $task->name }}"</span></h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ні</button>
                      <x-form action="{{ route('task.destroy', [$course->id, $lesson->id, $task->id]) }}" method="DELETE">
                          <button type="submit" class="btn btn-primary">Видалити</button>
                      </x-form>
                    </div>
                  </div>
                </div>
              </div>
        </x-card>
    </div>
    @endif
    @endforeach

    @endif

    @else

    <a href="{{ route('user.course.show', [$course]) }}">Назад</a>
    @if(has_access($course))
    @foreach ($tasks as $task)

    @if(completed($task->id))
    <div class="col-12 col-md-6 py-3">
    <x-card style="user-select: none;">
            @php

            $user_id = completed_id($task->id, Auth::id())->user_id;

            @endphp
            <a class="text-decoration-none" href="{{ route('user.task.completed', [$user_id, $course->id, $lesson->id, $task->id]) }}">
                <x-card-body class="border-bottom">
                    <p class="p-0 m-0" style="font-size: 19px;">{{ $task->name }}</p>
                    <p class="small text-muted m-0 p-0">{{ $task->created_at }}</p>
                </x-card-body>
                <x-card-body>
                    <p class="p-1 text-success">Completed</p>
                </x-card-body>
            </a>
        </x-card>
    </div>
    @else
    <div class="col-12 col-md-6 py-3">

    <x-card>
        <a class="text-decoration-none" href="{{ route('user.task.show', [$course->id, $lesson->id, $task->id]) }}">
            <x-card-body>
                <p class="p-0 m-0" style="font-size: 19px;">{{ $task->name }}</p>
                <p class="small text-muted m-0 p-0">{{ $task->created_at }}</p>
            </x-card-body>
        </a>
    </x-card>
</div>
    @endif

    @endforeach
    @else

    @endif


    @endif
</div>

</div>

<script>
    
</script>

@endsection
