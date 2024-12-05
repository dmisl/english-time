@extends('layouts.main')

@section('main.title', env('APP_NAME').' | '.__('main.registration'))

@section('main.content')

<div class="container">
    <div class="row mt-5">
        <div class="col-12 col-md-4 mx-auto mt-3">
            <x-card class="rounded-5">
                <x-card-body class="d-flex justify-content-between">
                    <h2>{{ __('main.registration') }}</h2>
                    <x-slot name="right">
                            <a href="{{ route('login.index') }}">
                                {{ __('main.authorization') }}
                            </a>
                        </x-slot>
                </x-card-body>
                <x-card-body class="pt-0">
                    <x-form action="{{ route('register.store') }}">
                        <x-form-item>
                            <x-label required>{{ __('main.email') }}</x-label>
                            <x-input placeholder="Your email address" name="email" type="email" />
                        </x-form-item>
                        <x-form-item>
                            <x-label required>{{ __('main.user_name') }}</x-label>
                            <x-input placeholder="Your name" name="name" />
                        </x-form-item>
                        <x-form-item>
                            <x-label required>{{ __('main.password') }}</x-label>
                            <x-input placeholder="Your password" name="password" type="password" />
                        </x-form-item>
                        <x-form-item required>
                            <x-label>{{ __('main.password_confirmation') }}</x-label>
                            <x-input placeholder="Repeat the password" name="password_confirmation" type="password" />
                        </x-form-item>
                        {{-- <x-form-item required>
                            <x-checkbox name="confirmation">Я згоджуюсь з правилами сайту</x-checkbox>
                        </x-form-item> --}}
                        <x-button class="rounded-5 px-4" type="submit">
                            {{ __('main.register') }}
                        </x-button>
                    </x-form>
                </x-card-body>
            </x-card>
        </div>
    </div>
</div>

@endsection
