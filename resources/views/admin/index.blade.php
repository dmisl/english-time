@extends('layouts.main')

@section('main.title')

{{ env('APP_NAME') }}
 |
{{ __('main.admin_profile') }}

@endsection

@section('main.content')

<div class="container">
    <h1>{{ __('main.my_courses') }}</h1>
    <div class="row py-5">
        <div class="col-6 col-md-4">
            <x-card>
                <a class="text-decoration-none" href="{{ route('active.index') }}">
                    <x-card-body>
                        <h4>
                            {{ __('main.applications_for_registration') }}
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
                            {{ __('main.access_to_the_course') }}
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
                            {{ __('main.check_tasks') }}
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

        <h3>{{ __('main.you_have_not_created_any_courses_yet') }}</h3>
        <h4>{!! __('main.to_create_a_course_click_the_button') !!}</h4>

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
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.change_the_name_of_the_lesson') }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <x-form action="{{ route('course.update', [$course->id]) }}" method="PUT">
                                <div class="modal-body">
                                    <x-label>{{ __('main.enter_a_new_course_name') }}</x-label>
                                    <x-input type="text" name="name" value="{{ $course->name }}" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('main.change') }}</button>
                                </x-form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteCourseModal{{ $course->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.deleting_a_course') }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4>{{ __('main.do_you_really_want_to_delete_a_course_called') }} <span class="text-danger">"{{ $course->name }}"</span>, {{ __('main.all_the_lessons_and_all_the_tasks_that_are_in_it') }}</h4>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.no') }}</button>
                                <x-form action="{{ route('course.destroy', [$course->id]) }}" method="DELETE">
                                    <button type="submit" class="btn btn-primary">{{ __('main.delete') }}</button>
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
