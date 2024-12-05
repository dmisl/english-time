@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Добавити новий курс')

@section('main.content')

<div class="container">
    <a href="{{ route('admin.index') }}">{{ __('main.back')}}</a>
    <div class="row mt-5">
        <div class="col-12 col-md-4 offset-md-4">
            <x-card class="rounded-5">
                <x-card-body>
                    <h3>{{ __('main.add_a_new_course') }}</h3>
                </x-card-body>

                <x-card-body class="pt-0">
                    <x-form action="{{ route('course.store') }}">
                        <x-form-item>
                            <x-label required>
                                {{ __('main.course_name') }}
                            </x-label>
                            <input type="hidden" value="{{ Auth::id() }}">
                            <x-input name="name" />
                        </x-form-item>
                        <x-form-item class="text-center">
                            <x-button class="rounded-5 px-3 mt-1" type="submit">
                                {{ __('main.add_a_course') }}
                            </x-button>
                        </x-form-item>
                    </x-form>
                </x-card-body>
            </x-card>
        </div>

    </div>
</div>

@endsection
