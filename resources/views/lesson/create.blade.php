@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Створити новий урок')

@section('main.content')

<div class="container">
    <a href="{{ route('course.show', [$course]) }}">{{ __('main.back') }}</a>
    <div class="row mt-5">
        <div class="col-12 col-md-4 offset-md-4">
            <x-card class="rounded-5">
                <x-card-body>
                    <h3>{{ __('main.add_a_new_lesson') }}</h3>
                </x-card-body>

                <x-card-body class="pt-0">
                    <x-form action="{{ route('lesson.store', [$course->id]) }}">
                        <x-form-item>
                            <x-label required>
                                {{ __('main.name_of_the_lesson') }}
                            </x-label>
                            <x-input name="lesson_name"/>
                            <x-input type="hidden" name="course_id" value="{{ $course->id }}"/>
                        </x-form-item>
                        <x-form-item class="text-center">
                            <x-button class="rounded-5 mt-2" type="submit">
                                {{ __('main.add_a_lesson') }}
                            </x-button>
                        </x-form-item>
                    </x-form>
                </x-card-body>
            </x-card>
        </div>

    </div>
</div>

@endsection
