@extends('layouts.main')
@section('main.title')

{{ __('main.access_to_the_course') }}

@endsection

@section('main.content')

@if(str_contains(strtolower($_SERVER["HTTP_USER_AGENT"]), 'mobile'))

<div class="container">
    <a href="{{ route('admin.index') }}">
        {{ __('main.back') }}
    </a>
    <h1>{{ __('main.access_to_the_course') }}</h1>

    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">username</th>
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
                $accessed_courses[] = $access->course_id;
            }

            $unallowed_courses = [];

            foreach($courses as $course)
            {
                $unallowed_courses[$course->id] = $course->name;
            }

            $unallowed_courses = array_diff($unallowed_courses, $accessed_courses);

            @endphp
            <tr>
                <td>{{ $user->name }}</td>
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
                                <div class="modal-header {{ dark_mode_text() }}">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.setting_up_access_to_courses_for_a_user_named') }} {{ $user->name }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <x-form action="{{ route('access.store') }}">
                                    <div class="modal-body {{ dark_mode_text() }}">
                                        <x-form-item>

                                            <div class="form-floating">
                                                <select name="select" class="form-select select{{ $user->id }}" id="floatingSelect" aria-label="Floating label select example">
                                                    <option selected></option>
                                                    <option value="store">{{ __('main.grant_access') }}</option>
                                                    <option value="delete">{{ __('main.remove_access') }}</option>
                                                </select>
                                                <label for="floatingSelect">{{ __('main.select_an_action') }}</label>
                                            </div>
                                        </x-form-item>

                                        <div hidden class="store{{$user->id}}">
                                            <x-form-item>
                                                <div class="form-floating">
                                                    <select name="course_store" class="form-select select{{ $user->id }}" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected></option>
                                                        @foreach($unallowed_courses as $id => $name)
                                                        <option value="{{ $id }}">
                                                            {{ $name }}
                                                        </option>
                                                        @endforeach
                                                        <x-input type="hidden" name="user_id" value="{{ $user->id }}"></x-input>
                                                    </select>
                                                    <label for="floatingSelect">{{ __('main.grant_access_to_the_course') }}</label>
                                                </div>
                                            </x-form-item>
                                        </div>

                                        <div hidden class="delete{{ $user->id }}">

                                            <div class="form-floating">
                                                <select name="course_delete" class="form-select select{{ $user->id }}" id="floatingSelect" aria-label="Floating label select example">
                                                    <option selected></option>
                                                    @foreach($user->accesses as $access)
                                                        <option value="{{ $access->course->id }}">
                                                            {{ $access->course->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="floatingSelect">{{ __('main.remove_access_from_the_course') }}</label>
                                            </div>

                                        </div>
<script>
    let select{{ $user->id }} = document.querySelector('.select' + {{ $user->id }})
    let store{{ $user->id}} = document.querySelector('.store' + {{ $user->id }})
    let del{{ $user->id }} = document.querySelector('.delete' + {{ $user->id }})
    select{{ $user->id }}.addEventListener('change', function() {
        if (select{{ $user->id }}.value == 'store') {
            store{{ $user->id }}.removeAttribute('hidden')
            del{{ $user->id }}.setAttribute('hidden', '')
        } else if (select{{ $user->id }}.value == 'delete') {
            store{{ $user->id }}.setAttribute('hidden', '')
            del{{ $user-> id }}.removeAttribute('hidden')
        } else {
            store{{ $user->id }}.setAttribute('hidden', '')
            del{{ $user->id }}.setAttribute('hidden', '')

        }
    })
</script>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                        <button type="submit" class="btn btn-primary">{{ __('main.save_changes') }}</button>
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

@else

<div class="container">
    <a href="{{ route('admin.index') }}">
        <div class="pt-3 pb-2">
            {{ __('main.back') }}
        </div>
    </a>
    <h1 class="fw-light">{{ __('main.access_to_the_course') }}</h1>

    @if($users->count() > 0)
        <table class="table table-primary mt-5">
            <thead>
                <tr>
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
                    $accessed_courses[] = $access->course_id;
                }

                $unallowed_courses = [];

                foreach($courses as $course)
                {
                    $unallowed_courses[$course->id] = $course->name;
                }

                $unallowed_courses = array_diff($unallowed_courses, $accessed_courses);

                @endphp
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->accesses as $access)
                            {{ $access->course->name }},
                        @endforeach
                    </td>
                    <td>
                        <img data-bs-toggle="modal" data-bs-target="#accessModal{{ $user->id }}" class="icon" src="{{ asset('storage/icons/access.png') }}" alt="">
                        <div class="modal fade" id="accessModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header {{ dark_mode_text() }}">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.setting_up_access_to_courses_for_a_user_named') }} {{ $user->name }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <x-form action="{{ route('access.store') }}">
                                        <div class="modal-body {{ dark_mode_text() }}">
                                            <x-form-item>

                                                <div class="form-floating">
                                                    <select name="select" class="form-select select{{ $user->id }}" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected></option>
                                                        <option value="store">{{ __('main.grant_access') }}</option>
                                                        <option value="delete">{{ __('main.remove_access') }}</option>
                                                    </select>
                                                    <label for="floatingSelect">{{ __('main.select_an_action') }}</label>
                                                </div>
                                            </x-form-item>

                                            <div hidden class="store{{$user->id}}">
                                                <x-form-item>
                                                    <div class="form-floating">
                                                        <select name="course_store" class="form-select select{{ $user->id }}" id="floatingSelect" aria-label="Floating label select example">
                                                            <option selected></option>
                                                            @foreach($unallowed_courses as $id => $name)
                                                            <option value="{{ $id }}">
                                                                {{ $name }}
                                                            </option>
                                                            @endforeach
                                                            <x-input type="hidden" name="user_id" value="{{ $user->id }}"></x-input>
                                                        </select>
                                                        <label for="floatingSelect">{{ __('main.grant_access_to_the_course') }}</label>
                                                    </div>
                                                </x-form-item>
                                            </div>

                                            <div hidden class="delete{{ $user->id }}">

                                                <div class="form-floating">
                                                    <select name="course_delete" class="form-select select{{ $user->id }}" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected></option>
                                                        @foreach($user->accesses as $access)
                                                            <option value="{{ $access->course->id }}">
                                                                {{ $access->course->id }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="floatingSelect">{{ __('main.remove_access_from_the_course') }}</label>
                                                </div>

                                            </div>
    <script>
        let select{{ $user->id }} = document.querySelector('.select' + {{ $user->id }})
        let store{{ $user->id}} = document.querySelector('.store' + {{ $user->id }})
        let del{{ $user->id }} = document.querySelector('.delete' + {{ $user->id }})
        select{{ $user->id }}.addEventListener('change', function() {
            if (select{{ $user->id }}.value == 'store') {
                store{{ $user->id }}.removeAttribute('hidden')
                del{{ $user->id }}.setAttribute('hidden', '')
            } else if (select{{ $user->id }}.value == 'delete') {
                store{{ $user->id }}.setAttribute('hidden', '')
                del{{ $user-> id }}.removeAttribute('hidden')
            } else {
                store{{ $user->id }}.setAttribute('hidden', '')
                del{{ $user->id }}.setAttribute('hidden', '')

            }
        })
    </script>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                            <button type="submit" class="btn btn-primary">{{ __('main.save_changes') }}</button>
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
    @else

        <h3>Nobody has been activated yet</h3>

    @endif

</div>

@endif

@endsection
