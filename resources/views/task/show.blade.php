@extends('layouts.main')
@section('main.title', env('APP_NAME').' | '.$task->name)

@section('main.content')
<div class="container">

    @if(is_admin())
    <a href="{{ route('lesson.show', [$course, $lesson]) }}">{{ __('main.back') }}</a>
    <h1>{{ $task->name }}</h1>
    <input class="task_type" type="hidden" value="{{ $task->task_type }}">

    <h2 id="right_answers" class="text-success"></h2>
    <div id="completed_task">
        {!! $task->body !!}
    </div>
    <x-form action="{{ route('task.check') }}">
        <div hidden id="hidden"></div>
        <input hidden type="text" name="course_id" value="{{ $course }}">
        <input hidden type="text" name="lesson_id" value="{{ $lesson }}">
        <input hidden type="text" name="task_id" value="{{ $task->id }}">
        <input hidden id="task_text" type="text" name="completed_task" value="">
        <x-button id="hidden_button" type="submit" hidden></x-button>
    </x-form>

    @else

    @if(has_access($course))

    <a href="{{ route('user.lesson.show', [$course, $lesson]) }}">{{ __('main.back') }}</a>
    <h1>{{ $task->name }}</h1>
    <input class="task_type" type="hidden" value="{{ $task->task_type }}">

    <div id="completed_task">
        <h2 id="right_answers" class="text-success"></h2>
        {!! $task->body !!}
    </div>

    <form action="{{ route('task.check') }}" method="POST">
        
        <div id="hidden" hidden>

            <input hidden type="text" name="course_id" value="{{ $course }}">
            <input hidden type="text" name="lesson_id" value="{{ $lesson }}">
            <input hidden type="text" name="task_id" value="{{ $task->id }}">
            <input hidden type="text" name="percentage" class="task_percentage">
            <input hidden id="task_text" type="text" name="completed_task" value="">
    
            <button type="submit" id="hidden_button"></button>

        </div>

    </form>

    @else

    @endif

    @endif
</div>
<script defer>
    let hiddenButton = document.querySelector('#hidden_button')
    let rightAnswers = document.querySelector('#right_answers')
    let completedTask = document.querySelector('#completed_task')
    let hidden = document.querySelector('#hidden')

    let task_text = document.querySelector('#task_text')
    let task_type = document.querySelector('.task_type')
    let selected

    let cldn

    let width = 0

    if (task_type.value == 1 || task_type.value == 2) {

        let divs = document.querySelectorAll('div')

        divs.forEach(div => {
            if (div.classList.length == 0 && div.id.length == 0) {
                div.classList.add('d-flex')
                div.style.flexWrap = 'wrap'
                div.style.justifyContent = 'center'
                // cldn = div.children
                // for (let i = 0; i < cldn.length; i++) {
                //     cldn[i].style.width =  + 'px'
                //     console.log(cldn[i].style.width)
                // }
                // width = 0
                // div.classList.add('mx-auto')
                // for (let i = 0; i < cldn.length; i++) {
                //     width = width + cldn[i].offsetWidth
                //     console.log(cldn[i].offsetWidth)
                //     if (cldn[i].tagName == 'LABEL') {
                //         width = width + 25
                //     }
                //     if (cldn[i].tagName == 'I') {
                //         width = width + 25
                //     }
                // }
                // div.style.width = width + 'px'
                // width = 0
                // div.classList.add('mx-auto')
            }
        });

        const items = document.querySelectorAll('.answer')
        const inputs = document.querySelectorAll('.input')
        let check = document.querySelector('#check')
        let count = 0
        let rightCount = 0;
        let texts = document.querySelectorAll('.text')
        let solutions = document.querySelectorAll('.solution')
        solutions.forEach(element => {
            element.addEventListener('keyup', function() {
                count = 0
                solutions.forEach(element => {
                    if (element.value.length >= 1) {
                        count++
                    } else {
                        count--
                    }
                })
                if (count == solutions.length) {
                    check.removeAttribute('disabled')
                } else {
                    check.setAttribute('disabled', '')
                }
            })
        });

        check.addEventListener('click', function(element) {

            check.setAttribute('disabled', '')
            if (solutions.length >= 1) {
                let answer
                let question
                for (let i = 0; i < solutions.length; i++) {
                    if (solutions[i].value.toLowerCase() == solutions[i].attributes.solution.value) {
                        solutions[i].style.backgroundColor = 'green'
                        rightCount++
                    } else {
                        solutions[i].style.backgroundColor = 'red'
                    }
                    answer = solutions[i].value.toLowerCase()
                    question = solutions[i].attributes.solution.value
                    hidden.innerHTML += `
                    <input name="answers[]" value="${answer}">
                    <input name="questions[]" value="${question}">`
                }
                let asd = (100 * rightCount) / solutions.length
                let percentage = Math.round(asd)
                rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
                hidden.innerHTML += `<input name="percentage" value="${percentage}">`
                task_text.value = completedTask.innerHTML
                setTimeout(function() {
                    hiddenButton.click()
                }, 3000);
            }
            if (solutions.length == 0) {
                for (let i = 0; i < inputs.length; i++) {
                    let childValue = inputs[i].children[0].attributes.value.value
                    let answer = inputs[i].attributes.answer.value
                    if (childValue == answer) {
                        inputs[i].style.backgroundColor = 'green'
                        rightCount++
                    } else {
                        inputs[i].style.backgroundColor = 'red'
                    }
                    hidden.innerHTML += `<input name="answers[]" value="${childValue}"> <input name="questions[]" value="${answer}">`
                }

                let asd = (100 * rightCount) / inputs.length
                let percentage = Math.round(asd)
                rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
                hidden.innerHTML += `<input name="percentage" value="${percentage}">`
                let text = ''
                for (let i = 0; i < texts.length; i++) {
                    text = texts[i].innerText
                    hidden.innerHTML += `<input name="texts[]" value="${text}">`
                }
                task_text.value = completedTask.innerHTML
                setTimeout(function() {
                    hiddenButton.click()
                }, 3000);
            }
        })

        function clickSubmit() {
            hiddenButton.click()
        }

        @if(str_contains(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile'))

        let answers = document.querySelectorAll('.answer')
        let inputas = document.querySelectorAll('.input')

        let s = false

        let a

        for (let i = 0; i < answers.length; i++) {
            answers[i].addEventListener('click', function() {
                answers.forEach(el => {
                    el.classList.remove('bg-warning')
                    el.classList.add('bg-primary')
                });
                answers[i].classList.remove('bg-primary')
                answers[i].classList.add('bg-warning')

                a = i

                s = true

                inputas.forEach(input => {
                    if (input.children.length == 0) {
                        input.style.border = '2px solid yellow'
                        input.addEventListener('click', function() {
                            if (s && input.children.length == 0) {
                                input.append(answers[a])
                                s = false
                                answers[a].classList.remove('bg-warning')
                                answers[a].classList.add('bg-primary')
                                inputas.forEach(e => {
                                    e.style.border = ''
                                    if (e.children.length !== 0) {
                                        count++
                                    }
                                });
                                if (count == inputas.length) {
                                    check.removeAttribute('disabled')
                                } else {
                                    check.setAttribute('disabled', '')
                                }
                                count = 0
                            }
                        })
                    }
                });
            })

        }

        @else


        items.forEach(item => {
            item.addEventListener('dragstart', dragStart)
            item.addEventListener('dragend', dragEnd)
        });

        let dragItem = null;

        function dragStart() {
            dragItem = this;
            setTimeout(() => this.className = 'invisible', 0)
        }

        function dragEnd() {
            this.className = 'answer'
            dragItem = null;
        }

        function dragOver(e) {
            e.preventDefault()
        }

        function dragEnter() {}

        function dragLeave() {
            count = 0
        }

        function dragDrop() {
            this.append(dragItem);
            count = 0
            inputs.forEach(e => {
                if (e.children.length == 1) {
                    count++
                } else {
                    count--
                }
            })
            if (count == items.length) {
                check.removeAttribute('disabled')
            }
            if (count !== items.length) {
                check.setAttribute('disabled', '')
            }
            inputs.forEach(e => {
                if (e.children.length == 1) {} else {
                    count--
                }
            })
        }

        inputs.forEach(input => {
            input.addEventListener('dragover', dragOver);
            input.addEventListener('dragenter', dragEnter);
            input.addEventListener('dragleave', dragLeave);
            input.addEventListener('drop', dragDrop);
        });
        @endif

    }

    if (task_type.value == 3) {
        let count = 0
        let check = document.querySelector('#check')
        check.setAttribute('disabled', '')
        let inputs = document.querySelectorAll('.fi_input')
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('keyup', function() {
                for (let a = 0; a < inputs.length; a++) {
                    if (inputs[a].value.length >= 1) {
                        count++
                    }
                }

                if (inputs.length == count) {
                    count = 0
                    check.removeAttribute('disabled')
                } else {
                    count = 0
                    check.setAttribute('disabled', '')
                }
            })
        }

        check.addEventListener('click', function() {
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i].value.toLowerCase() == inputs[i].attributes.answer.value.toLowerCase()) {
                    count++
                    inputs[i].setAttribute('disabled', '')
                    inputs[i].style.backgroundColor = 'green'
                    inputs[i].setAttribute('value', inputs[i].value)
                } else {
                    inputs[i].setAttribute('disabled', '')
                    inputs[i].style.backgroundColor = 'red'
                }
            }
            let asd = (100 * count) / inputs.length
            let percentage = Math.round(asd)
            rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
            task_text.value = completedTask.innerHTML

            check.setAttribute('disabled', '')

            document.querySelector('.task_percentage').value = percentage

            

            // setTimeout(function() {
            //     hiddenButton.click()
            // }, 3000);
        })
    }

    if (task_type.value == 4) {
        
        let check_button = document.createElement('button')
        check_button.classList.add('btn')
        check_button.classList.add('btn-primary')
        check_button.classList.add('check')
        check_button.innerText = `Перевірити`
        check_button.setAttribute('disabled', '')

        completedTask.appendChild(check_button)

        check_button.addEventListener('click', function () {

            let rightCount = 0

            let picked = document.querySelectorAll('.picked')

            picked.forEach(element => {
                
                if(element.classList.contains('right'))
                {

                    rightCount = rightCount + 1

                }

            });

            let asd = (100 * rightCount) / tasks.length
            let percentage = Math.round(asd)
            
            rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`

            task_text.value = completedTask.innerHTML
            console.log(completedTask.innerHTML)

            window.setTimeout(() => {

                hiddenButton.click()

            }, 3000);

        })

        let tasks = document.querySelectorAll('.abc_task')

        function check_if_chosen()
        {

            let count = 0

            tasks.forEach(task => {
                
                let ans = task.querySelectorAll('.abc_ans')
                answers.forEach(answer => {
                   
                    if(answer.style.backgroundColor !== '')
                    {

                        count = count + 1

                    }

                });

            });

            if(count == tasks.length)
            {

                check_button.removeAttribute('disabled')

            } else
            {

                check_button.setAttribute('disabled', '')

            }

        }

        function choose_answer()
        {

            let children = this.parentElement.children

            for (let i = 0; i < children.length; i++) {
                
                children[i].style.backgroundColor = ``
                children[i].classList.remove('picked')
                
            }

            this.classList.add('picked')
            this.style.backgroundColor = `#88b5fc`

            check_if_chosen()

        }

        let answers = document.querySelectorAll('.abc_ans')

        answers.forEach(answer => {
            
            answer.addEventListener('click', choose_answer)
            answer.setAttribute('role', 'button')

        });

    }

    if (task_type.value == 5) {
        document.querySelectorAll('tr').forEach(e => {
            e.classList.add('border')
        })
        document.querySelectorAll('td').forEach(e => {
            e.classList.add('border')
        })
        document.querySelectorAll('th').forEach(e => {
            e.classList.add('border')
        })
        let table = document.querySelector('table')
        document.querySelector('table').style.width = "100%"
        let completed_task = document.querySelector('#completed_task')
        completed_task.classList.add('text-start')
        completed_task.classList.add('w-100')
    }
</script>
@endsection
