@extends('layouts.main')

@section('main.title', )

{{ env('APP_NAME') }} | {{ __('main.profile') }}

@endsection

@section('main.content')

<div class="container">

    <h1 class="p-0 m-0 py-5" style="font-size: 55px;">Welcome back {{ Auth::user()->name }}!</h1>

    <h1 class="p-0 m-0 fw-light">Available Courses:</h1>

    <div class="row mt-3">

        @if($courses->count() !== 0)
            @foreach ($courses as $course)
            <div class="col-12 col-md-4 py-3">
                <x-card>
                    <a class="text-decoration-none" href="{{ route('user.course.show', $course->id) }}">
                        <x-card-body>
                            <h3 class="m-0 p-0">
                                {{ $course->name }}
                            </h3>
                            <p class="small text-muted m-0 p-0">{{ $course->created_at }}</p>
                        </x-card-body>
                    </a>
                </x-card>
            </div>
            @endforeach
        @else

            <p class="text-danger">Вибачте, але на даний момент Вам не надали доступ до жодного з курсів :(</p>

        @endif

    </div>
</div>

@endsection
