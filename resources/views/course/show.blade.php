@extends('layouts.main')
@section('main.title', env('APP_NAME').' | '.$course->name)

@section('main.content')

<div class="container">
    <h1>{{ $course->name }}</h1>

    @if(is_admin())
    <a class="my-2" href="{{ route('admin.index') }}">Назад</a>
    <x-card>
        <a class='text-decoration-none text-success' href="{{ route('lesson.create', [$course->id]) }}">
            <x-card-body>
                <h1>
                    +
                </h1>
            </x-card-body>
        </a>
    </x-card>

    @if($lessons->count() == 0)

    <h3>Ви ще не створити жодного уроку у цьому курсі</h3>
    <h4>Для створення уроку використувуйте кнопку <span class="text-success">+</span></h4>

    @else

    @foreach ($lessons as $lesson)
    <div class="col-12 col-md-6 py-3">

    <x-card>
        <a class="text-decoration-none" href="{{ route('lesson.show', ['course' => $course->id, 'lesson' => $lesson->id]) }}">
            <x-card-body class="border-bottom">
                <p class="p-0 m-0" style="font-size: 19px;">
                    {{ $lesson->name }}
                </p>
                <p class="small text-muted m-0 p-0">{{ $lesson->created_at }}</p>
            </x-card-body>
        </a>
        <x-card-body class="py-1 d-flex">
            <div class="w-50">
                <img class="my-0" style="width: 30px; cursor: pointer" data-bs-toggle="modal" data-bs-target="#editLessonModal{{ $lesson->id }}" src="{{ asset('storage/icons/edit.png') }}" alt="delete">
            </div>
            <div class="w-50">
                <img class="my-0" style="width: 30px; cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteLessonModal{{ $lesson->id }}" src="{{ asset('storage/icons/delete_red.png') }}" alt="delete">
            </div>
        </x-card-body>
        <div class="modal fade" id="editLessonModal{{ $lesson->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Зміна назви уроку</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <x-form action="{{ route('lesson.update', [$course->id, $lesson->id]) }}" method="PUT">
                    <div class="modal-body">
                        <x-label>Впишіть нову назву уроку</x-label>
                        <x-input type="text" name="name" value="{{ $lesson->name }}" />
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="submit" class="btn btn-primary">Змінити</button>
                    </x-form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteLessonModal{{ $lesson->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Видалення уроку</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Ви дійсно хочете видалити урок з назвою <span class="text-danger">"{{ $lesson->name }}"</span> і всі завдання які знаходяться в ньому?</h4>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ні</button>
                    <x-form action="{{ route('lesson.destroy', [$course->id, $lesson->id]) }}" method="DELETE">
                        <button type="submit" class="btn btn-primary">Видалити</button>
                    </x-form>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    </div>

    @endforeach

    @endif

    @else

    @if(has_access($course->id))

    @foreach ($lessons as $lesson)
    <a class="my-2" href="{{ route('user.index') }}">Назад</a>
    <div class="col-12 col-md-6 py-3">

    <x-card>
        <a class="text-decoration-none" href="{{ route('user.lesson.show', ['course' => $course->id, 'lesson' => $lesson->id]) }}">
            <x-card-body>
                <p class="p-0 m-0" style="font-size: 19px;">
                    {{ $lesson->name }}
                </p>
                <p class="small text-muted m-0 p-0">{{ $lesson->created_at }}</p>
            </x-card-body>
        </a>
    </x-card>

</div>

    @endforeach

    @else


    @endif


    @endif

</div>

@endsection
