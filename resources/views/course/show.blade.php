@extends('layouts.main')
@section('main.title', env('APP_NAME').' | '.$course->name)

@section('main.content')

<div class="container">

    <h1 class="p-0 m-0 py-4" style="font-size: 55px;">{{ $course->name }}</h1>

    @if(is_admin())
    <div class="py-2">
        <a href="{{ route('admin.index') }}">{{ __('main.back') }}</a>
    </div>
    <x-card class="rounded-5">
        <a class='text-decoration-none text-success' href="{{ route('lesson.create', [$course->id]) }}">
            <x-card-body>
                <h1>
                    +
                </h1>
            </x-card-body>
        </a>
    </x-card>

    @if($lessons->count() == 0)

    <h3 class="mt-3">{{ __('main.you_have_not_yet_created_a_lesson_in_this_course') }}</h3>
    <h4>{!! __('main.to_create_a_lesson_use_the_button') !!}</h4>

    @else
    <div class="row">

    @foreach ($lessons as $lesson)
        <div class="col-12 col-md-4 py-3">

            <x-card class="rounded-4">
                <a class="text-decoration-none" href="{{ route('lesson.show', ['course' => $course->id, 'lesson' => $lesson->id]) }}">
                    <x-card-body class="border-bottom">
                        <p class="p-0 m-0" style="font-size: 19px;">
                            {{ $lesson->name }}
                        </p>
                        <p class="small text-muted m-0 p-0">{{ $lesson->created_at }}</p>
                    </x-card-body>
                </a>
                <x-card-body class="py-1 d-flex">
                    <div class="w-50">
                        <svg role="button" style="margin-top: 2.5px;" data-bs-toggle="modal" data-bs-target="#editLessonModal{{ $lesson->id }}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="25" height="25" viewBox="0 0 256 256" xml:space="preserve">
                            <defs>
                            </defs>
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                <path d="M 62.99 90 H 8.919 C 4.001 90 0 85.999 0 81.081 V 8.919 C 0 4.001 4.001 0 8.919 0 h 72.162 C 85.999 0 90 4.001 90 8.919 v 56.135 c 0 1.104 -0.896 2 -2 2 s -2 -0.896 -2 -2 V 8.919 C 86 6.207 83.793 4 81.081 4 H 8.919 C 6.207 4 4 6.207 4 8.919 v 72.162 C 4 83.793 6.207 86 8.919 86 H 62.99 c 1.104 0 2 0.896 2 2 S 64.095 90 62.99 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: {{ is_dark() ? 'white' : 'black' }}; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 78.404 89.997 c -1.852 0 -3.702 -0.705 -5.111 -2.114 L 52.078 66.668 c -1.411 -1.411 -2.465 -3.165 -3.049 -5.074 l -3.4 -11.127 c -0.419 -1.372 -0.049 -2.856 0.966 -3.871 c 1.014 -1.016 2.496 -1.386 3.871 -0.966 l 11.126 3.399 c 0.001 0 0.001 0.001 0.001 0.001 c 1.909 0.584 3.663 1.638 5.074 3.049 l 21.215 21.215 c 2.818 2.818 2.818 7.403 0 10.222 l -4.368 4.368 C 82.105 89.292 80.255 89.997 78.404 89.997 z M 49.523 49.523 l 3.331 10.901 c 0.393 1.284 1.103 2.465 2.052 3.415 l 21.215 21.215 c 1.261 1.258 3.307 1.258 4.565 0 l 4.368 -4.368 c 1.259 -1.259 1.259 -3.307 0 -4.565 L 63.84 54.906 c -0.949 -0.949 -2.131 -1.659 -3.415 -2.052 L 49.523 49.523 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: {{ is_dark() ? 'white' : 'black' }}; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 70.298 84.06 c -0.512 0 -1.023 -0.195 -1.414 -0.586 c -0.781 -0.781 -0.781 -2.047 0 -2.828 l 11.762 -11.762 c 0.781 -0.781 2.047 -0.781 2.828 0 s 0.781 2.047 0 2.828 L 71.712 83.474 C 71.321 83.864 70.81 84.06 70.298 84.06 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: {{ is_dark() ? 'white' : 'black' }}; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 72.089 23.545 H 17.911 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 54.178 c 1.104 0 2 0.896 2 2 S 73.193 23.545 72.089 23.545 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: {{ is_dark() ? 'white' : 'black' }}; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 72.089 39.182 H 17.911 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 54.178 c 1.104 0 2 0.896 2 2 S 73.193 39.182 72.089 39.182 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: {{ is_dark() ? 'white' : 'black' }}; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 32.998 54.818 H 17.911 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 15.087 c 1.104 0 2 0.896 2 2 S 34.103 54.818 32.998 54.818 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: {{ is_dark() ? 'white' : 'black' }}; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 42.771 70.454 h -24.86 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 24.86 c 1.104 0 2 0.896 2 2 S 43.875 70.454 42.771 70.454 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: {{ is_dark() ? 'white' : 'black' }}; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                    </div>
                    <div class="w-50">
                        <img class="my-0" style="width: 30px; cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteLessonModal{{ $lesson->id }}" src="{{ asset('storage/icons/delete_red.png') }}" alt="delete">
                    </div>
                </x-card-body>
                <div class="modal fade" id="editLessonModal{{ $lesson->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.change_the_name_of_the_lesson') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <x-form action="{{ route('lesson.update', [$course->id, $lesson->id]) }}" method="PUT">
                            <div class="modal-body">
                                <x-label>{{ __('main.enter_a_new_lesson_title') }}</x-label>
                                <x-input type="text" name="name" value="{{ $lesson->name }}" />
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('main.change') }}</button>
                            </x-form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteLessonModal{{ $lesson->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.delete_a_lesson') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>{{ __('main.do_you_really_want_to_delete_the_lesson_named') }} <span class="text-danger">"{{ $lesson->name }}"</span> {{ __('main.and_all_the_tasks_that_are_in_it') }}</h4>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.no') }}</button>
                            <x-form action="{{ route('lesson.destroy', [$course->id, $lesson->id]) }}" method="DELETE">
                                <button type="submit" class="btn btn-primary">{{ __('main.delete') }}</button>
                            </x-form>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card>

        </div>

    @endforeach

    </div>


    @endif

    @else

    @if(has_access($course->id))

        <a class="my-2" href="{{ route('user.index') }}">{{ __('main.back') }}</a>

        <div class="row mt-3">

            @foreach ($lessons as $lesson)

            <div class="col-12 col-md-4 py-3">

                <x-card>
                    <a class="text-decoration-none" href="{{ route('user.lesson.show', ['course' => $course->id, 'lesson' => $lesson->id]) }}">
                        <x-card-body>
                            <p class="p-0 m-0 fs-4" style="font-size: 19px;">
                                {{ $lesson->name }}
                            </p>
                            <p class="small text-muted m-0 p-0">{{ $lesson->created_at }}</p>
                        </x-card-body>
                    </a>
                </x-card>

            </div>

            @endforeach

        </div>


    @else


    @endif


    @endif

</div>

@endsection
