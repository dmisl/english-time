@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Створити новий урок')

@section('main.content')

<div class="container">
    <a href="{{ route('course.show', [$course]) }}">{{ __('main.back') }}</a>
    <div class="row mt-5">
        <div class="col-12 col-md-6 offset-md-3">
            <x-card>
                <x-card-body>
                    <h3>{{ __('main.add_a_new_lesson') }}</h3>
                </x-card-body>

                <x-card-body>
                    <x-form action="{{ route('lesson.store', [$course->id]) }}">
                        <x-form-item>
                            <x-label required>
                                {{ __('main.name_of_the_lesson') }}
                            </x-label>
                            <x-input name="name"/>
                            <x-input type="hidden" name="course_id" value="{{ $course->id }}"/>
                        </x-form-item>
                        <x-form-item>
                            <x-button type="submit">
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
