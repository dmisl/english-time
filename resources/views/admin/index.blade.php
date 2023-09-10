@extends('layouts.main')

@section('main.title', env('APP_NAME').' | Кабінет адміністратора')

@section('main.content')

<div class="container">
    <h1>Мої курси</h1>
    <div class="row py-5">
        <div class="col-6 col-md-4">
            <x-card>
                <a class="text-decoration-none" href="{{ route('active.index') }}">
                    <x-card-body>
                        <h4>
                            Заявки на реєстрацію
                        </h4>
                    </x-card-body>
                </a>
            </x-card>
        </div>
        <div class="col-6 col-md-4">
            <x-card>
                <a class="text-decoration-none" href="{{ route('access.index') }}">
                    <x-card-body>
                        <h4>
                            Доступ до курсу
                        </h4>
                    </x-card-body>
                </a>
            </x-card>
        </div>
        <div class="col-6 col-md-4">
            <x-card>
                <a class="text-decoration-none" href="{{ route('task.homework') }}">
                    <x-card-body>
                        <h4>
                            Перевірити завдання
                        </h4>
                    </x-card-body>
                </a>
            </x-card>
        </div>
    </div>

    <x-card>
        <a class='text-decoration-none text-success' href="{{ route('course.create') }}">
            <x-card-body>
                <h1>
                    +
                </h1>
            </x-card-body>
        </a>
    </x-card>
    <div class="row pt-5">
        @if($courses->count() == 0)

        <h3>На даний момент ви ще не створили жодного курсу</h3>
        <h4>Для того аби створити курс, нажміть кнопку <span style="color: green;">+</span></h4>

        @else

        @foreach ($courses as $course)
        <div class="col-12 col-md-4 py-3">
            <x-card>
                <a class="text-decoration-none" href="{{ route('course.show', $course->id) }}">
                    <x-card-body class="border-bottom">
                        <h3 class="m-0 p-0">
                            {{ $course->name }}
                        </h3>
                        <p class="small text-muted m-0 p-0">{{ $course->created_at }}</p>
                    </x-card-body>
                </a>
                    <x-card-body class="py-1 d-flex">
                        <div class="w-50">
                            <img class="my-0" style="width: 30px; cursor: pointer" data-bs-toggle="modal" data-bs-target="#editCourseModal{{ $course->id }}" src="{{ asset('storage/icons/edit.png') }}" alt="delete">
                        </div>
                        <div class="w-50">
                            <img class="my-0" style="width: 30px; cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteCourseModal{{ $course->id }}" src="{{ asset('storage/icons/delete_red.png') }}" alt="delete">
                        </div>
                    </x-card-body>
                    <div class="modal fade" id="editCourseModal{{ $course->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Зміна назви уроку</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <x-form action="{{ route('course.update', [$course->id]) }}" method="PUT">
                                <div class="modal-body">
                                    <x-label>Впишіть нову назву курсу</x-label>
                                    <x-input type="text" name="name" value="{{ $course->name }}" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                                    <button type="submit" class="btn btn-primary">Змінити</button>
                                </x-form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteCourseModal{{ $course->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Видалення уроку</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Ви дійсно хочете видалити курс під назвою <span class="text-danger">"{{ $course->name }}"</span>, всі уроки і всі завдання, які в ньому знаходяться?</h4>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ні</button>
                                <x-form action="{{ route('course.destroy', [$course->id]) }}" method="DELETE">
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
    </div>
</div>

@endsection
