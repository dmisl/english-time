@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Перевірка завдання '.$task->name)

@section('main.content')

<div class="container">
    <a href="{{ route('user.lesson.show', [$course, $lesson]) }}">
        <div class="py-3">
            {{ __('main.back') }}
        </div>
    </a>
    <h1>{{ $task->name }}</h1>
    <h2>{{ __('main.made_by') }}: {{ $user->name }}</h2>
    <div class="completed">

        {!! $completed->text !!}

    </div>
    <input type="hidden" class="task_type" value="{{ $task->task_type }}">

<script>

    let button = document.querySelectorAll('#check')
    document.querySelector('.check').setAttribute('hidden', '')

    button.forEach(button => {
        button.setAttribute('hidden', '')
    });

    let mobile = false

    @if(str_contains(strtolower($_SERVER["HTTP_USER_AGENT"]), 'mobile'))
        mobile = true
    @endif

    let task_type = document.querySelector('.task_type').value
    let completed = document.querySelector('.completed').children[1]

    // TRANSLATE WORDS TASK
    if(task_type == 1)
    {

        let words = document.querySelectorAll('.word')
        let inputs = document.querySelectorAll('.input')

        if(mobile)
        {

            if(document.querySelector('.image'))
            {

                document.querySelector('.image').style.width = '90%'
                document.querySelector('.image').style.height = '200px'

            }

            document.querySelector('.inputs_div').style.width = '90%'

            document.querySelector('tr').children[0].style.fontSize = '20px'
            document.querySelector('tr').children[1].style.fontSize = '20px'

            words.forEach(word => {

                word.style.fontSize = '17px'

            });

            inputs.forEach(input => {

                input.style.height = '37.5px'
                input.style.padding = '3px 10px'
                input.children[0].style.fontSize = '17px'

            });

        } else
        {

            if(document.querySelector('.image') == 3)
            {

                document.querySelector('.image').style.width = '550px'
                document.querySelector('.image').style.height = '320px'

            }

            document.querySelector('.inputs_div').style.width = ''

            document.querySelector('tr').children[0].style.fontSize = '25px'
            document.querySelector('tr').children[1].style.fontSize = '25px'

            words.forEach(word => {

                word.style.fontSize = ''

            });

            inputs.forEach(input => {

                input.style.height = ''
                input.style.padding = ''
                input.children[0].style.fontSize = ''

            });

        }

    }

    // FILL IN GAPS
    if(task_type == 2)
    {

        completed = document.querySelector('.completed')

        let answers = document.querySelectorAll('.answer')

        answers.forEach(answer => {

            answer.removeAttribute('draggable', 'true')

        });

        if(mobile)
        {

            if(document.querySelector('.image'))
            {

                document.querySelector('.image').style.width = '90%'
                document.querySelector('.image').style.height = '200px'

            }

            document.querySelector('.text_div').style.width = '90%'

        } else
        {

            if(document.querySelector('.image'))
            {

                document.querySelector('.image').style.width = '550px'
                document.querySelector('.image').style.height = '320px'

            }

            document.querySelector('.text_div').style.width = '80%'
        }

    }

    // FILL IN GAPS MANUALLY
    if(task_type == 3)
    {

        if(mobile)
        {

            completed = document.querySelector('.completed')

            if(mobile)
            {

                if(document.querySelector('.image'))
                {

                    document.querySelector('.image').style.width = '90%'
                    document.querySelector('.image').style.height = '200px'

                    document.querySelector('.text_div').style.width = '90%'

                } else
                {

                    document.querySelector('.image').style.width = '550px'
                    document.querySelector('.image').style.height = '320px'

                    document.querySelector('.text_div').style.width = '80%'

                }

            }

        }

    }

    // ABC TASKS FOR MOBILE AND PC

    if(task_type == 4)
    {

        let tasks = document.querySelectorAll('.abc_task')
        let answers = document.querySelectorAll('.abc_ans')

        if(mobile)
        {

            tasks.forEach(task => {

                if(task.children.length == 3)
                {

                    task.children[1].style.width = '100%'
                    task.children[1].style.height = '250px'

                }

            });

            answers.forEach(answer => {

                answer.style.width = "100%"
                answer.style.height = '50px'

                answer.children[0].style.width = '50px'
                answer.children[0].children[0].style.fontSize = '20px'

                answer.children[1].children[0].style.fontSize = '18px'

            });

        } else
        {

            tasks.forEach(task => {

                if(task.children.length == 3)
                {

                    task.children[1].style.width = '550px'
                    task.children[1].style.height = '320px'

                }

            });

            answers.forEach(answer => {

                answer.style.width = ""
                answer.style.height = ''

                answer.children[0].style.width = '60px'
                answer.children[0].children[0].style.fontSize = ''

                answer.children[1].children[0].style.fontSize = ''

            });

        }

    }

    // YOUTUBE

    if(mobile)
    {

        if(document.querySelector('.youtube'))
        {

            document.querySelector('.youtube').style.width = '100%'
            document.querySelector('.youtube').style.height = '250px'

        }

    } else
    {

        if(document.querySelector('.youtube'))
        {

            document.querySelector('.youtube').style.width = '700px'
            document.querySelector('.youtube').style.height = '350px'

        }

    }

</script>
@endsection
