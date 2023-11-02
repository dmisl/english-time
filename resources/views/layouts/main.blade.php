<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>
        @yield('main.title', 'English')
    </title>
    <style>

        .dark_mode_label {
            border: 1px solid white;
        }

        .dark_mode {
            height: 25px;
            width: 50px;
            display: flex;
        }

        .dark_mode input[type=checkbox] {
            height: 0;
            width: 0;
            visibility: hidden;
        }

        .dark_mode label {
            cursor: pointer;
            text-indent: -9999px;
            width: 50px;
            height: 25px;
            background: grey;
            display: block;
            border-radius: 100px;
            position: relative;
        }

        .dark_mode label:after {
            content: '';
            position: absolute;
            top: 1px;
            left: 1px;
            width: 21px;
            height: 21px;
            background: #fff;
            border-radius: 23px;
            transition: 0.5s;
        }

        .dark_mode input:checked+label {
            background: #292928;
        }

        .dark_mode input:checked+label:after {
            left: calc(100% - 1px);
            transform: translateX(-100%);
        }

        .dark_mode label:active:after {
            width: 30px;
        }

        .fi_input {
            height: 35px;
            text-align: center;
            font-style: italic;
            border-radius: 10px;
            transition: 1s;
            border: 1px solid black;
            margin: 3px 3px;
            width: 150px;
        }

        .fi_input:focus {
            background-color: rgb(183, 220, 255);
            border: none;
            outline: 3px solid rgba(20, 172, 218, 0.795);
            transition: 1s;
            height: 36px;
            color: black;
        }

        .fi_input:disabled {
            color: black;
        }

        .fi_text {
            font-size: 20px;
            height: 35px;
        }

        .required::after {
            content: '*';
            color: red;
        }

        .icon {
            width: 25px;
            transition: 0.5s;
            cursor: pointer;
        }

        .icon:hover {
            border: 1px solid black;
            transition: 1s;
        }

        .overview {
            width: 100%;
        }

        .input {
            width: 200px;
            height: 42px;
            background-color: rgb(98, 153, 235);
            border-radius: 10px;
            margin: 5px;
        }

        .input h3 {
            margin-top: 6px;
        }

        td h5 {
            margin-top: 15px;
        }

        td h3 {
            margin-top: 10px;
        }

        .input_label {
            position: relative;
            font-size: 20px;
        }

        .answer,
        .answer_input,
        .answer_add,
        .answer_accept {
            position: relative;
            top: 6px;
            background-color: rgb(7, 92, 219);
            color: white;
            border-radius: 10px;
            cursor: pointer;
            margin: 0 auto;
            padding: 3px 10px;
            text-align: center
        }

        .answers,
        #add_answers {
            color: white;
            width: 80%;
            margin: 0 auto;
            border-radius: 10px;
            padding: 10px 0 15px 0;
        }

        .invisible {
            display: none;
        }

        .text {
            position: relative;
            top: 11px;
            font-size: 20px;
            padding: 0 10px;
        }

        .abc
        {
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='30' ry='30' stroke='%23333' stroke-width='3' stroke-dasharray='6%2c 14' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            border-radius: 30px;
            font-family: 'Inter', sans-serif;
        }

        .zxc
        {
            border: 1px solid black;
            background-size: cover;
            color: black;
        }

        .dashed
        {
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='5' ry='5' stroke='%23333' stroke-width='1' stroke-dasharray='5%2c 5' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
        }

        .dashed:hover
        {
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='5' ry='5' stroke='%23333' stroke-width='2' stroke-dasharray='5%2c 5' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            color: green;
        }

        .task_add
        {

            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='30' ry='30' stroke='%23333' stroke-width='3' stroke-dasharray='6%2c 14' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            border-radius: 30px;

        }

        .abc_task
        {

            font-family: 'Inter', sans-serif;
            padding-bottom: 60px;

        }

        @keyframes delete {
            0% {background-color: white;}
            100% {background-color: red;}
        }

        .abc_answers
        {

            user-select: none;

        }

        .abc_ans
        {

            width: 700px;
            height: 60px;
            border: 1px solid black;
            margin: 0 auto;
            margin-bottom: 15px;
            display: flex;

        }

        .abc_ans h2
        {
            display: table-cell;
            vertical-align: middle;
        }

        .abc_ans h4
        {
            display: table-cell;
            vertical-align: middle;
            padding: 0 15px;
        }

    </style>
    {{-- BOOTSTRAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js" integrity="sha512-ToL6UYWePxjhDQKNioSi4AyJ5KkRxY+F1+Fi7Jgh0Hp5Kk2/s8FD7zusJDdonfe5B00Qw+B8taXxF6CFLnqNCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- TINYMCE --}}
    <script src="https://cdn.tiny.cloud/1/tf00vuqa2n38x4aqny9piahlbvyngwss47cp0wqq0hfbyvij/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    {{-- JQUERY --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    {{-- INTER FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>

<body>
    <div class='d-flex flex-column justify-content-between min-vh-100 text-center'>

        @include('includes.header')
        @if(session('alert'))
        <x-alert>
            {{ session('alert') }}
        </x-alert>
        @endif
        <main class='flex-grow-1'>
            @yield('main.content')
        </main>

    </div>

    <script>
        let locale = document.querySelector('.locale')
        let locale_current = document.querySelector('.current_locale')
        let locale_submit = document.querySelector('.locale_submit')
        let locale_options = locale.children

        for (let i = 0; i < locale_options.length; i++) {
            if (locale_options[i].value == locale_current.value) {
                locale_options[i].setAttribute('selected', '')
            }
        }

        locale.addEventListener('change', function() {
            locale_submit.click()
        })

        let dark_mode_input = document.querySelector('#dark_mode_input')
        let dark_mode_label = document.querySelector('.dark_mode_label')
        let dark_mode_submit = document.querySelector('.dark_mode_submit')

        if (dark_mode_input.checked) {
            document.body.setAttribute('data-bs-theme', 'dark')
        } else {
            document.body.removeAttribute('data-bs-theme')
        }

        dark_mode_label.addEventListener('click', dark_mode_check)

        function dark_mode_check() {
            if (!dark_mode_input.checked) {
                document.body.style.transition = "1s"
                document.body.setAttribute('data-bs-theme', 'dark')
                setTimeout(() => {
                    dark_mode_submit.click()
                }, 1000);
            } else {
                document.body.style.transition = "1s"
                document.body.removeAttribute('data-bs-theme')
                setTimeout(() => {
                    dark_mode_submit.click()
                }, 1000);
            }
        }
    </script>
</body>

</html>
