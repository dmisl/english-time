@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Створити новий урок')

@section('main.content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <x-card>
                <x-card-body>
                    <h3>Добавити новий урок</h3>
                </x-card-body>

                <x-card-body>
                    <x-form action="{{ route('lesson.store', [$course->id]) }}">
                        <x-form-item>
                            <x-label required>
                                Назва уроку
                            </x-label>
                            <x-input name="name"/>
                            <x-input type="hidden" name="course_id" value="{{ $course->id }}"/>
                        </x-form-item>
                        <x-form-item>
                            <x-button type="submit">
                                Добавити урок
                            </x-button>
                        </x-form-item>
                    </x-form>
                </x-card-body>
            </x-card>
        </div>

    </div>
</div>

@endsection
