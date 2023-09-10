@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Доступ до курсів')

@section('main.content')

<div class="container">
    <a href="{{ route('admin.index') }}">
        Назад
    </a>
    <h1>Доступ до курсів</h1>

        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">accesed_courses</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

                @php
                    $accessed_courses = [];

                    foreach($user->accesses as $access)
                    {
                        $accessed_courses[] = $access->course_id-1;
                    }

                    $unallowed_courses = [];

                    foreach($courses as $course)
                    {
                        $unallowed_courses[] = $course->id-1;
                    }

                    $unallowed_courses = array_diff($unallowed_courses, $accessed_courses);

                @endphp

                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->accesses as $access)
                        {{ $access->course_id }},
                        @endforeach
                    </td>
                    <td>
                        <img data-bs-toggle="modal" data-bs-target="#accessModal{{ $user->id }}" class="icon" src="{{ asset('storage/icons/access.png') }}" alt="">
                        <div class="modal fade" id="accessModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Налаштування доступу до курсів користувача {{ $user->name }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <x-form action="{{ route('access.store') }}">
                                    <div class="modal-body">
                                            <x-form-item>

                                                <div class="form-floating">
                                                    <select name="select" class="form-select select{{ $user->id }}" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected></option>
                                                        <option value="store">Надати доступ</option>
                                                        <option value="delete">Забрати доступ</option>
                                                    </select>
                                                    <label for="floatingSelect">Виберіть дію</label>
                                                </div>
                                            </x-form-item>

                                                <div hidden class="store{{$user->id}}">
                                                    <x-form-item>
                                                        <div class="form-floating">
                                                            <select name="course_store" class="form-select select{{ $user->id }}" id="floatingSelect" aria-label="Floating label select example">
                                                                <option selected></option>
                                                                @foreach($unallowed_courses as $course)
                                                                    <option value="{{ $courses[$course]->id }}">
                                                                        {{ $courses[$course]->name }}
                                                                    </option>
                                                                @endforeach
                                                                <x-input type="hidden" name="user_id" value="{{ $user->id }}"></x-input>
                                                            </select>
                                                            <label for="floatingSelect">Надати доступ до курсу</label>
                                                        </div>
                                                    </x-form-item>
                                                </div>

                                                <div hidden class="delete{{ $user->id }}">

                                                    <div class="form-floating">
                                                        <select name="course_delete" class="form-select select{{ $user->id }}" id="floatingSelect" aria-label="Floating label select example">
                                                            <option selected></option>
                                                            @foreach($accessed_courses as $course)
                                                                <option value="{{ $courses[$course]->id }}">
                                                                    {{ $courses[$course]->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="floatingSelect">Забрати доступ від курсу</label>
                                                    </div>

                                                </div>
                                                <script>
                                                    let select{{ $user->id }} = document.querySelector('.select'+{{ $user->id }})
                                                    let store{{ $user->id }} = document.querySelector('.store'+{{ $user->id }})
                                                    let del{{ $user->id }} = document.querySelector('.delete'+{{ $user->id }})
                                                    select{{ $user->id }}.addEventListener('change', function () {
                                                        if(select{{ $user->id }}.value == 'store')
                                                        {

                                                            store{{ $user->id }}.removeAttribute('hidden')
                                                            del{{ $user->id }}.setAttribute('hidden', '')

                                                        } else if(select{{ $user->id }}.value == 'delete')
                                                        {

                                                            store{{ $user->id }}.setAttribute('hidden', '')
                                                            del{{ $user->id }}.removeAttribute('hidden')

                                                        } else
                                                        {
                                                            store{{ $user->id }}.setAttribute('hidden', '')
                                                            del{{ $user->id }}.setAttribute('hidden', '')

                                                        }
                                                    })
                                                </script>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                                        <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                                    </div>
                                    </x-form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
        </tbody>
        </table>
        {{ $users->links() }}
</div>

@endsection
