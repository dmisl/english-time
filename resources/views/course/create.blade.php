@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Добавити новий курс')

@section('main.content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <x-card>
                <x-card-body>
                    <h3>Добавити новий курс</h3>
                </x-card-body>

                <x-card-body>
                    <x-form action="{{ route('course.store') }}">
                        <x-form-item>
                            <x-label required>
                                Назва курсу
                            </x-label>
                            <input type="hidden" value="{{ Auth::id() }}">
                            <x-input name="name" />
                        </x-form-item>
                        <x-form-item>
                            <x-button type="submit">
                                Добавити курс
                            </x-button>
                        </x-form-item>
                    </x-form>
                </x-card-body>
            </x-card>
        </div>

    </div>
</div>

@endsection
