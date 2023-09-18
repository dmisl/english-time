@extends('layouts.main')

@section('main.title', )

{{ env('APP_NAME') }} | {{ __('main.profile') }}

@endsection

@section('main.content')

<div class="container">
    <h1>{{ __('my_courses') }}</h1>
    <div class="row">

        @foreach ($courses as $course)
        <div class="col-12 col-md-6 py-3">
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
    </div>
</div>

@endsection
