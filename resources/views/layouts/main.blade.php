<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('main.title', 'English')
    </title>
    <style>
        .fi_input
        {
            height: 35px;
            text-align: center;
            font-style: italic;
            border-radius: 10px;
            transition: 1s;
            border: 1px solid black;
            margin: 0 3px;
            width: 150px;
        }
        .fi_input:focus
        {
            background-color: rgb(183, 220, 255);
            border: none;
            outline: 3px solid rgba(20, 172, 218, 0.795);
            transition: 1s;
            height: 36px;
        }
        .fi_input:disabled
        {
            color: black;
        }
        .fi_text
        {
            font-size: 20px;
            height: 35px;
        }
        .required::after
        {
            content: '*';
            color: red;
        }
        .icon
        {
            width: 25px;
            transition: 0.5s;
            cursor: pointer;
        }
        .icon:hover
        {
            border: 1px solid black;
            transition: 1s;
        }

        .overview
        {
            width: 100%;
        }

        .input{
            width: 200px;
            height: 42px;
            background-color: lightblue;
            border-radius: 10px;
            margin: 5px;
        }
        .input_label
        {
            position:relative;
            font-size: 20px;
        }
        .answer, .answer_input, .answer_add, .answer_accept
        {
            position: relative;
            top: 5px;
            background-color: lightblue;
            border-radius: 10px;
            cursor: pointer;
            margin: 0 auto;
            padding: 3px 10px;
            border: 1px solid black;
            text-align: center
        }
        .answers, #add_answers
        {
            background-color: lightblue;
            width: 80%;
            margin: 0 auto;
            border-radius: 10px;
            padding: 10px 0 15px 0;
        }
        .invisible{
            display: none;
        }
        .text
        {
            position: relative;
            bottom: 15px;
            font-size: 20px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js" integrity="sha512-ToL6UYWePxjhDQKNioSi4AyJ5KkRxY+F1+Fi7Jgh0Hp5Kk2/s8FD7zusJDdonfe5B00Qw+B8taXxF6CFLnqNCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/tf00vuqa2n38x4aqny9piahlbvyngwss47cp0wqq0hfbyvij/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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

        @include('includes.footer')

    </div>
</body>
</html>
