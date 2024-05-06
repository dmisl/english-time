@extends('layouts.main')
@section('main.title', env('APP_NAME').' | '.$lesson->name)

@section('main.content')

<div class="container">
    <h1 class="mt-5 m-0 p-0">{{ $lesson->name }}</h1>

    <div class="row">

        @if(is_admin())
            <div class="py-2">
                <a href="{{ route('course.show', [$course]) }}">{{ __('main.back') }}</a>
            </div>
            <div class="col-md-12 col-12">

                <x-card>
                    <a class='text-decoration-none text-success' href="{{ route('task.create', [$course->id, $lesson->id]) }}">
                        <x-card-body>
                            <h1>
                                +
                            </h1>
                        </x-card-body>
                    </a>
                </x-card>

            </div>
            @if($tasks->count() == 0)

                <h3 class="mt-3">{{ __('main.you_have_not_yet_created_an_task_in_this_lesson') }}</h3>

            @else

                <div class="col-md-12 col-12 d-flex pt-3 justify-content-center" style="column-gap: 20px;">

                    <div class="border find" style="width: 30%; display: table; border-radius: 10px;">
                        <p style="display: table-cell; vertical-align: middle; padding: 5px;">
                            {{ __('main.find_task') }}
                        </p>
                    </div>

                    <div class="border position" data-bs-toggle="modal" data-bs-target="#positionModal" style="width: 30%; display: table; border-radius: 10px; user-select: none;" role="button">
                        <p style="display: table-cell; vertical-align: middle; padding: 5px;">
                            {{ __('main.change_location_of_tasks') }}
                        </p>
                    </div>

                    <div class="modal fade" id="positionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.placement_of_elements') }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>{{ __('main.change_location_of_tasks_you') }}</h2>
                                    <p class="position_hint"></p>
                                    <div class="positions">

                                        @foreach ($tasks as $task)

                                            <div class="pos border mx-auto d-flex" task_name="{{ $task->name }}" task_id="{{ $task->id }}" task_position="{{ $task->position }}" style="margin-bottom: 15px; width: 70%; height: 50px;">

                                                <div class="down border-end" style="width: 50px; height: 50px;">

                                                    <div style="padding: 5px;" role="button">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 16 20" fill="none">
                                                            <path d="M7.29289 19.7071C7.68342 20.0976 8.31658 20.0976 8.70711 19.7071L15.0711 13.3431C15.4616 12.9526 15.4616 12.3195 15.0711 11.9289C14.6805 11.5384 14.0474 11.5384 13.6569 11.9289L8 17.5858L2.34315 11.9289C1.95262 11.5384 1.31946 11.5384 0.928932 11.9289C0.538407 12.3195 0.538407 12.9526 0.928932 13.3431L7.29289 19.7071ZM7 -4.37114e-08L7 19L9 19L9 4.37114e-08L7 -4.37114e-08Z" fill="black"/>
                                                        </svg>

                                                    </div>

                                                </div>

                                                <div style="flex: 1; display: table;">

                                                    <p style="display: table-cell; vertical-align: middle;">
                                                        {{ $task->name }}
                                                    </p>

                                                </div>

                                                <div class="up border-start" style="width: 50px; height: 50px;">

                                                    <div style="padding: 5px;" role="button">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 16 20" fill="none">
                                                            <path d="M8.70711 0.292892C8.31658 -0.0976315 7.68342 -0.0976314 7.29289 0.292892L0.928932 6.65685C0.538407 7.04738 0.538407 7.68054 0.928932 8.07107C1.31946 8.46159 1.95262 8.46159 2.34315 8.07107L8 2.41421L13.6569 8.07107C14.0474 8.46159 14.6805 8.46159 15.0711 8.07107C15.4616 7.68054 15.4616 7.04738 15.0711 6.65685L8.70711 0.292892ZM9 20L9 1L7 1L7 20L9 20Z" fill="black"/>
                                                        </svg>

                                                    </div>

                                                </div>

                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                    <form action="{{ route('task.position') }}" method="POST">

                                        <div class="position_change">

                                            @csrf

                                        </div>

                                        <button type="submit" class="btn btn-success">{{ __('main.save_changes') }}</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                @foreach ($tasks as $task)

                    <div class="col-12 col-md-4 py-3">

                        <div class="card task" style="user-select: none;">
                            <a class="text-decoration-none" href="{{ route('task.show', [$course->id, $lesson->id, $task->id]) }}">
                                <x-card-body class="border-bottom">
                                    <p class="p-0 m-0" style="font-size: 19px;">{{ $task->name }}</p>
                                    <p class="small text-muted m-0 p-0">{{ $task->created_at }}</p>
                                </x-card-body>
                            </a>
                            <x-card-body class="py-1 d-flex">
                                <div class="w-50">
                                    <a href="{{ route('task.edit', [$course->id, $lesson->id, $task->id]) }}">
                                        <svg role="button" style="margin-top: 2.5px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="25" height="25" viewBox="0 0 256 256" xml:space="preserve">
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
                                    </a>
                                </div>
                                <div class="w-50">
                                    <img class="my-0" style="width: 30px; cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteTaskModal{{ $task->id }}" src="{{ asset('storage/icons/delete_red.png') }}" alt="delete">
                                </div>
                            </x-card-body>
                            <div class="modal fade" id="deleteTaskModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.delete_a_task') }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>{{ __('main.you_really_want_to_delete_a_task_named') }} <span class="text-danger">"{{ $task->name }}"</span></h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.no') }}</button>
                                            <x-form action="{{ route('task.destroy', [$course->id, $lesson->id, $task->id]) }}" method="DELETE">
                                                <button type="submit" class="btn btn-primary">{{ __('main.delete') }}</button>
                                            </x-form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif


        @else

            <a href="{{ route('user.course.show', [$course]) }}">{{ __('main.back') }}</a>
            @if(has_access($course->id))
                @foreach ($tasks as $task)

                    @if(completed($task->id))
                        <div class="col-12 col-md-4 py-3">
                            <x-card style="user-select: none;">
                                @php

                                $user_id = completed_id($task->id, Auth::id())->user_id;

                                @endphp
                                <a class="text-decoration-none" href="{{ route('user.task.completed', [$user_id, $course->id, $lesson->id, $task->id]) }}">
                                    <x-card-body class="border-bottom">
                                        <p class="p-0 m-0" style="font-size: 19px;">{{ $task->name }}</p>
                                        <p class="small text-muted m-0 p-0">{{ $task->created_at }}</p>
                                    </x-card-body>
                                    <x-card-body>
                                        <p class="p-0 m-0 text-success">{{ __('main.completed') }}</p>
                                    </x-card-body>
                                </a>
                            </x-card>
                        </div>
                    @else
                        <div class="col-12 col-md-4 py-3">

                            <x-card>
                                <a class="text-decoration-none" href="{{ route('user.task.show', [$course->id, $lesson->id, $task->id]) }}">
                                    <x-card-body>
                                        <p class="p-0 m-0" style="font-size: 19px;">{{ $task->name }}</p>
                                        <p class="small text-muted m-0 p-0">{{ $task->created_at }}</p>
                                    </x-card-body>
                                </a>
                            </x-card>
                        </div>
                    @endif

                @endforeach

            @endif


        @endif
    </div>

</div>

<script>

    let previousElement

    function replace() {

        previousElement = this.parentElement

        document.querySelectorAll('.up').forEach(el => {

            el.removeEventListener('click', replace)

        });

        document.querySelectorAll('.down').forEach(el => {

            el.removeEventListener('click', replace)

        });

        document.querySelectorAll('.pos').forEach(el => {

            if(el.attributes.task_id.value !== previousElement.attributes.task_id.value)
            {

                el.classList.remove('border')
                el.style.border = '1px solid blue'
                el.setAttribute('role', 'button')
                el.addEventListener('click', replaceTo)

            }

        })

    }

    function replaceTo()
    {

        let position_change = document.querySelector('.position_change')

        currentElement = this

        let previousText = previousElement.attributes.task_name.value
        let previousId = previousElement.attributes.task_id.value

        let currentText = currentElement.attributes.task_name.value
        let currentId = currentElement.attributes.task_id.value


        previousElement.children[1].children[0].innerText = currentText
        previousElement.attributes.task_name.value = currentText
        previousElement.attributes.task_id.value = currentId

        currentElement.children[1].children[0].innerText = previousText
        currentElement.attributes.task_name.value = previousText
        currentElement.attributes.task_id.value = previousId

        let previousPosition = previousElement.attributes.task_position.value
        let currentPosition = currentElement.attributes.task_position.value

        console.log('previous')
        document.querySelector(`input[name="position[${previousElement.attributes.task_id.value}]"]`).setAttribute('value', previousPosition)
        console.log(document.querySelector(`input[name="position[${previousElement.attributes.task_id.value}]"]`))

        console.log('current')
        document.querySelector(`input[name="position[${currentElement.attributes.task_id.value}]"]`).setAttribute('value', currentPosition)
        console.log(document.querySelector(`input[name="position[${currentElement.attributes.task_id.value}]"]`))

        document.querySelectorAll('.pos').forEach(el => {

            el.classList.add('border')
            el.style.border = ''
            el.removeAttribute('role')
            el.removeEventListener('click', replaceTo)

        })

        document.querySelectorAll('.up').forEach(up => {

            up.addEventListener('click', replace)

        });

        document.querySelectorAll('.down').forEach(down => {

            down.addEventListener('click', replace)

        });

    }

    let positionModal = document.querySelector('#positionModal')
    positionModal.addEventListener('shown.bs.modal', function () {

        let position_change = document.querySelector('.position_change')
        let position_hint = document.querySelector('.position_hint')

        let positions = document.querySelectorAll('.pos')

        positions.forEach(e => {

            if(position_change.querySelector(`input[name="position[${e.attributes.task_id.value}]"]`))
            {



            } else
            {

                let new_input = document.createElement('input')
                new_input.setAttribute('type', 'hidden')
                new_input.setAttribute('name', `position[${e.attributes.task_id.value}]`)
                new_input.setAttribute('value', `${e.attributes.task_position.value}`)

                console.log(new_input)

                position_change.appendChild(new_input)

            }

        });

        let ups = document.querySelectorAll('.up')
        let downs = document.querySelectorAll('.down')

        ups.forEach(up => {

            up.addEventListener('click', replace)

        });

        downs.forEach(down => {

            down.addEventListener('click', replace)

        });

    })

    // FINDING
    let find = document.querySelector('.find')
    find.setAttribute('contenteditable', 'true')

    find.addEventListener('click', change)

    function change() {

        this.children[0].innerText = ``
        this.removeEventListener('click', change)
        this.addEventListener('keyup', function () {

            let tasks = document.querySelectorAll('.task')

            if(this.innerText.length > 1)
            {

                tasks.forEach(task => {

                    if(task.querySelector('p').innerText.includes(this.innerText))
                    {

                        task.parentElement.removeAttribute('hidden')

                    } else
                    {

                        task.parentElement.setAttribute('hidden', '')

                    }

                });

            } else
            {

                tasks.forEach(task => {

                    task.parentElement.removeAttribute('hidden')

                })

            }

        })

        this.addEventListener('keydown', function (e) {

            if (e.keyCode == 8 || e.keyCode == 46)
            {
                if (this.children.length === 1) { // last inner element
                    if (this.children[0].innerText < 1) { // last element is empty
                        e.preventDefault()
                    }
                }
            }

        })

    }

</script>

@endsection
