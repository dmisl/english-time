@extends('layouts.main')

@section('main.title', env('APP_NAME').' | Авторизація')

@section('main.content')


<div class="container">


    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <x-card>
                    <x-card-body class="d-flex justify-content-between">
                        <h2>Авторизація</h2>
                        <x-slot name="right">
                            <a href="{{ route('register.index') }}">
                                Реєстрація
                            </a>
                        </x-slot>
                    </x-card-body>
                    <x-card-body>

                        <x-form action="{{ route('login.store') }}">
                            <x-form-item>
                                <x-label required>Пошта</x-label>
                                <x-input name="email" type="email"/>
                            </x-form-item>

                            <x-form-item>
                                <x-label required>Пароль</x-label>
                                <x-input name="password" type="password" />
                            </x-form-item>

                            <x-form-item>
                                <x-checkbox name="remember">Запамятати мене</x-checkbox>
                            </x-form-item>

                            <x-button type="submit">Ввійти</x-button>
                    </x-form>
                </x-card-body>
            </x-card>
        </div>

    </div>

</div>

@endsection
