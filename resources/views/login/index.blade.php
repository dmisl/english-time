@extends('layouts.main')

@section('main.title', env('APP_NAME').' | '. __('main.authorization'))

@section('main.content')

<div class="container">


    <div class="row">
        <div class="col-12 col-md-4 offset-md-4 mt-5">
            <x-card>
                <x-card-body class="d-flex justify-content-between">
                    <h2>{{ __('main.authorization') }}</h2>
                    <x-slot name="right">
                        <a href="{{ route('register.index') }}">
                            {{ __('main.registration') }}
                        </a>
                    </x-slot>
                </x-card-body>
                <x-card-body>

                    <x-form action="{{ route('login.store') }}">
                        <x-form-item>
                            <x-label required>{{ __('main.email') }}</x-label>
                            <x-input name="email" type="email"/>
                        </x-form-item>

                        <x-form-item>
                            <x-label required>{{ __('main.password') }}</x-label>
                            <x-input name="password" type="password" />
                        </x-form-item>

                        <x-form-item>
                            <x-checkbox name="remember">{{ __('main.remember_me') }}</x-checkbox>
                        </x-form-item>

                        <x-button type="submit">{{ __('main.login') }}</x-button>
                    </x-form>

                </x-card-body>

            </x-card>
        </div>

    </div>

</div>

@endsection
