@extends('layouts.main')

@section('main.title')

{{ env('APP_NAME') }}
 |
{{ __('main.admin_profile') }}

@endsection

@section('main.content')

<div class="container mt-5">

    <h1 style="font-size: 50px;">{{ __('main.my_courses') }}</h1>

    <div class="row py-5">
        <div class="col-12 col-md-4 mb-2">
            <x-card class="rounded-4">
                <a class="text-decoration-none" href="{{ route('active.index') }}">
                    <x-card-body>
                        <h4>
                            {{ __('main.applications_for_registration') }}
                        </h4>
                    </x-card-body>
                </a>
            </x-card>
        </div>
        <div class="col-12 col-md-4 mb-2">
            <x-card class="rounded-4">
                <a class="text-decoration-none" href="{{ route('access.index') }}">
                    <x-card-body>
                        <h4>
                            {{ __('main.access_to_the_course') }}
                        </h4>
                    </x-card-body>
                </a>
            </x-card>
        </div>
        <div class="col-12 col-md-4 mb-2">
            <x-card class="rounded-4">
                <a class="text-decoration-none" href="{{ route('task.homework') }}">
                    <x-card-body>
                        <h4>
                            {{ __('main.check_tasks') }}
                        </h4>
                    </x-card-body>
                </a>
            </x-card>
        </div>
    </div>

    <x-card class="rounded-5">
        <a class='text-decoration-none text-success' href="{{ route('course.create') }}">
            <x-card-body>
                <h1>
                    +
                </h1>
            </x-card-body>
        </a>
    </x-card>
    <div class="row pt-5">
        @if($courses->count() == 0)

        <h3>{{ __('main.you_have_not_created_any_courses_yet') }}</h3>
        <h4>{!! __('main.to_create_a_course_click_the_button') !!}</h4>

        @else

        @foreach ($courses as $course)
        <div class="col-12 col-md-4 py-3">
            <x-card class="rounded-4">
                <a class="text-decoration-none" href="{{ route('course.show', $course->id) }}">
                    <x-card-body class="border-bottom">
                        <h3 class="m-0 p-0">
                            {{ $course->name }}
                        </h3>
                        <p class="small text-muted m-0 p-0">{{ $course->created_at }}</p>
                    </x-card-body>
                </a>
                    <x-card-body class="py-1 d-flex">
                        <div class="w-50">
                            <svg class="edit" course_id="{{ $course->id }}" role="button" style="margin-top: 2.5px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="25" height="25" viewBox="0 0 256 256" xml:space="preserve">
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
                            <svg role="button" data-bs-toggle="modal" data-bs-target="#deleteCourseModal{{ $course->id }}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="27.5" height="27.5" viewBox="0 0 256 256" xml:space="preserve">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 72.015 90.001 H 31.267 c -2.293 0 -4.159 -1.865 -4.159 -4.158 V 34.152 c 0 -0.308 0.142 -0.599 0.385 -0.789 l 3.947 -3.078 c 0.176 -0.137 0.392 -0.211 0.615 -0.211 h 43.119 c 0.553 0 1 0.448 1 1 v 54.768 C 76.174 88.136 74.308 90.001 72.015 90.001 z M 29.109 34.64 v 51.202 c 0 1.19 0.968 2.158 2.159 2.158 h 40.748 c 1.19 0 2.159 -0.968 2.159 -2.158 V 32.074 H 32.4 L 29.109 34.64 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255, 0, 0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 18.751 42.449 c -0.297 0 -0.592 -0.132 -0.789 -0.385 l -3.257 -4.176 c -1.41 -1.808 -1.085 -4.426 0.722 -5.836 l 37.16 -28.976 c 0.876 -0.684 1.967 -0.986 3.068 -0.848 c 1.103 0.136 2.085 0.694 2.769 1.57 l 3.256 4.176 c 0.164 0.209 0.237 0.474 0.204 0.737 c -0.032 0.264 -0.168 0.503 -0.377 0.666 l -42.142 32.86 C 19.183 42.38 18.966 42.449 18.751 42.449 z M 55.141 4.196 c -0.479 0 -0.94 0.158 -1.323 0.457 l -37.16 28.976 c -0.938 0.732 -1.106 2.091 -0.375 3.029 l 2.642 3.388 L 59.489 8.415 l -2.642 -3.388 c -0.354 -0.455 -0.865 -0.744 -1.438 -0.814 C 55.32 4.202 55.23 4.196 55.141 4.196 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255, 0, 0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 25.986 26.086 c -0.041 0 -0.082 -0.002 -0.123 -0.008 c -0.263 -0.032 -0.502 -0.168 -0.666 -0.377 l -2.561 -3.285 c -1.41 -1.808 -1.086 -4.426 0.722 -5.837 l 12.29 -9.583 c 0.875 -0.683 1.964 -0.986 3.067 -0.848 c 1.103 0.136 2.086 0.694 2.769 1.569 l 2.561 3.285 c 0.34 0.436 0.262 1.064 -0.174 1.403 L 26.601 25.875 C 26.425 26.012 26.208 26.086 25.986 26.086 z M 38.202 8.117 c -0.478 0 -0.94 0.158 -1.323 0.457 l -12.29 9.583 c -0.455 0.354 -0.744 0.865 -0.814 1.437 c -0.071 0.572 0.085 1.138 0.44 1.593 l 1.946 2.496 l 15.695 -12.239 l -1.946 -2.496 c -0.354 -0.455 -0.865 -0.744 -1.437 -0.814 C 38.381 8.122 38.291 8.117 38.202 8.117 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255, 0, 0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 51.642 79.787 c -0.553 0 -1 -0.447 -1 -1 V 41.286 c 0 -0.552 0.447 -1 1 -1 s 1 0.448 1 1 v 37.501 C 52.642 79.34 52.194 79.787 51.642 79.787 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255, 0, 0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 63.512 79.787 c -0.553 0 -1 -0.447 -1 -1 V 41.286 c 0 -0.552 0.447 -1 1 -1 c 0.553 0 1 0.448 1 1 v 37.501 C 64.512 79.34 64.065 79.787 63.512 79.787 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255, 0, 0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 39.771 79.787 c -0.552 0 -1 -0.447 -1 -1 V 41.286 c 0 -0.552 0.448 -1 1 -1 s 1 0.448 1 1 v 37.501 C 40.771 79.34 40.323 79.787 39.771 79.787 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255, 0, 0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 74.765 25.581 H 55.551 c -0.427 0 -0.807 -0.271 -0.945 -0.675 c -0.14 -0.404 -0.006 -0.851 0.33 -1.114 l 11.454 -8.932 c 1.765 -1.376 4.108 -1.62 6.117 -0.639 s 3.258 2.98 3.258 5.216 v 5.143 C 75.765 25.133 75.318 25.581 74.765 25.581 z M 58.459 23.581 h 15.306 v -4.143 c 0 -1.488 -0.798 -2.766 -2.136 -3.419 c -1.336 -0.652 -2.836 -0.497 -4.009 0.418 L 58.459 23.581 z M 67.005 15.649 h 0.01 H 67.005 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255, 0, 0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 71.266 9.392 c -0.296 0 -0.594 -0.05 -0.883 -0.156 l -2.625 -0.959 c -1.069 -0.391 -1.769 -1.459 -1.699 -2.597 l 0.135 -2.201 c 0.061 -0.994 0.67 -1.851 1.589 -2.236 L 70.281 0.2 c 0.84 -0.351 1.814 -0.231 2.546 0.309 l 1.787 1.324 c 1.079 0.799 1.368 2.318 0.657 3.459 l -1.794 2.879 C 72.994 8.946 72.144 9.392 71.266 9.392 z M 71.281 2 c -0.077 0 -0.155 0.015 -0.229 0.046 l 0 0 l -2.497 1.043 c -0.208 0.087 -0.352 0.288 -0.365 0.513 l -0.135 2.201 c -0.016 0.261 0.145 0.506 0.39 0.596 l 2.624 0.959 c 0.266 0.097 0.563 -0.006 0.711 -0.245 l 1.794 -2.879 c 0.163 -0.262 0.097 -0.61 -0.15 -0.793 l -1.787 -1.324 C 71.533 2.039 71.408 2 71.281 2 z M 70.667 1.123 h 0.01 H 70.667 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255, 0, 0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                    </x-card-body>
            </x-card>
        </div>
        @endforeach

        @endif
    </div>
</div>

<div class="editModal modal fade" id="editCourseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.change_the_name_of_the_lesson') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <x-label>{{ __('main.enter_a_new_course_name') }}</x-label>
                <x-input class="name" placeholder="Enter your new course name" name="" type="text" value="" />
                <p class="error text-danger" style="font-size: 12px; margin: 0; margin-left: 10px; height: 18px; font-weight: 500;"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-5" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                <button type="button" class="btn btn-primary rounded-5">{{ __('main.change') }}</button>
            </div>
        </div>
    </div>
</div>
<div class="deleteModal modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.deleting_a_course') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>{{ __('main.do_you_really_want_to_delete_a_course_called') }} <span class="text-danger course_name">""</span>, {{ __('main.all_the_lessons_and_all_the_tasks_that_are_in_it') }}</h4>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.no') }}</button>
            <x-form action="" method="DELETE">
                <button type="submit" class="btn btn-primary">{{ __('main.delete') }}</button>
            </x-form>
            </div>
        </div>
    </div>
</div>

<script>

    let course_id
    let selected

    // EDIT COURSE MODAL
    let editBootstrapModal = new bootstrap.Modal(document.querySelector('#editCourseModal'))

    let edits = document.querySelectorAll('.edit')
    edits.forEach(edit => {
        edit.addEventListener('click', function () {
            course_id = edit.attributes.course_id.value
            selected = edit.parentElement.parentElement.parentElement.querySelector('h3')
            axios.post(`{{ route('course.getData') }}`,{id:1})
                .then(res => {
                    editBootstrapModal.show()
                    editModalInput.value = res.data.course
                    default_value = res.data.course
                    setTimeout(() => {
                        editModalInput.focus()
                    }, 500);
                })
                .catch(err => {
                    console.error(err); 
                })
        })
    });

    let editModal = document.querySelector('.editModal')
    let editModalInput = editModal.querySelector('input')
    let editModalSubmit = editModal.querySelector('.btn-primary')
    let editModalError = editModal.querySelector('.error')

    let editModalTimeout

    editModalInput.addEventListener('keyup', function () {
        clearTimeout(editModalTimeout)
        editModalTimeout = setTimeout(editModalValidate, 500)
    })
    editModalSubmit.addEventListener('mouseenter', editModalValidate)

    let default_value

    function editModalValidate()
    {
        console.log('checking')
        let error = editModalError
        let submit = editModalSubmit
        if(editModalInput.value.length == 0)
        {
            error.innerHTML = `required field`
            submit.setAttribute('disabled', '')
        } else if(editModalInput.value.length < 5)
        {
            error.innerHTML = `course name must be at least 5 symbols long`
            submit.setAttribute('disabled', '')
        } else if(editModalInput.value == default_value)
        {
            error.innerHTML = `new course name cant be equal to the previous one`
            submit.setAttribute('disabled', '')
        }
        else
        {
            error.innerHTML = ``
            submit.removeAttribute('disabled')
        }
    }

    editModalSubmit.addEventListener('click', editModalSend)

    function editModalSend()
    {
        console.log('sendind data')
        axios.post(`{{ route('course.update') }}`, {id: course_id, name: editModalInput.value})
            .then(res => {
                selected.innerHTML = editModalInput.value
                editBootstrapModal.hide()
            })
            .catch(error => {
                console.error(error)
            })
    }

</script>

@endsection
