@extends('layouts.main')

@section('main.title', env('APP_NAME').' | Реєстрація')

@section('main.content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto mt-3">
            <x-card>
                <x-card-body class="d-flex justify-content-between">
                    <h2>Реєстрація</h2>
                    <x-slot name="right">
                            <a href="{{ route('login.index') }}">
                                Авторизація
                            </a>
                        </x-slot>
                </x-card-body>
                <x-card-body>
                    <x-form action="{{ route('register.store') }}">
                        <x-form-item>
                            <x-label required>Пошта</x-label>
                            <x-input name="email" type="email" />
                        </x-form-item>
                        <x-form-item>
                            <x-label required>Імя користувача</x-label>
                            <x-input name="name" />
                        </x-form-item>
                        <x-form-item>
                            <x-label required>Пароль</x-label>
                            <x-input name="password" type="password" />
                        </x-form-item>
                        <x-form-item required>
                            <x-label>Повторити пароль</x-label>
                            <x-input name="password_confirmation" type="password" />
                        </x-form-item>
                        {{-- <x-form-item required>
                            <x-checkbox name="confirmation">Я згоджуюсь з правилами сайту</x-checkbox>
                        </x-form-item> --}}
                        <x-button type="submit">
                            Зареєструватись
                        </x-button>
                    </x-form>
                </x-card-body>
            </x-card>
        </div>
    </div>
</div>

@endsection
