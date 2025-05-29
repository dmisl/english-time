@extends('layouts.main')
@section('main.title', $task->name)

@section('main.content')
<div class="container" style="font-family: Inter, sans-serif">

    @if(is_admin())


    <a href="{{ route('user.lesson.show', [$course, $lesson]) }}">
        <div class="py-3">
            {{ __('main.back') }}
        </div>
    </a>
    <h1 class="p-0 m-0">{{ $task->name }}</h1>
    <input class="task_type" type="hidden" value="{{ $task->task_type }}">


    <div id="completed_task" style="padding-bottom: 50px; font-family: 'Inter', sans-serif;">
        <h2 id="right_answers" class="text-success"></h2>
        {!! $task->body !!}
    </div>

    <form action="{{ route('task.check') }}" method="POST">

        <div id="hidden" hidden>

            @csrf

            <input hidden type="text" name="course_id" value="{{ $course }}">
            <input hidden type="text" name="lesson_id" value="{{ $lesson }}">
            <input hidden type="text" name="task_id" value="{{ $task->id }}">
            <input hidden type="text" name="percentage" class="task_percentage">
            <input hidden id="task_text" type="text" name="completed_task" value="">

            <button type="submit" id="hidden_button"></button>

        </div>

    </form>

    @else

    @if(has_access($course))

        <a href="{{ route('user.lesson.show', [$course, $lesson]) }}">
            <div class="py-3">
                {{ __('main.back') }}
            </div>
        </a>
        <h1 class="p-0 m-0">{{ $task->name }}</h1>
        <input class="task_type" type="hidden" value="{{ $task->task_type }}">

        <div id="completed_task" style="padding-bottom: 100px;">
            <h2 id="right_answers" class="text-success"></h2>
            {!! $task->body !!}
        </div>

        <form action="{{ route('task.check') }}" method="POST">

            <div id="hidden" hidden>

                @csrf

                <input hidden type="text" name="course_id" value="{{ $course }}">
                <input hidden type="text" name="lesson_id" value="{{ $lesson }}">
                <input hidden type="text" name="task_id" value="{{ $task->id }}">
                <input hidden type="text" name="percentage" class="task_percentage">
                <input hidden id="task_text" type="text" name="completed_task" value="">


            </div>

            <button style="display: none;" type="submit" id="hidden_button"></button>

        </form>

    @else

    @endif

    @endif
</div>
<!-- TRANSLATIONS -->
<script defer>
    let hiddenButton = document.querySelector('#hidden_button')
    let rightAnswers = document.querySelector('#right_answers')
    let completedTask = document.querySelector('#completed_task')
    let hidden = document.querySelector('#hidden')

    let task_text = document.querySelector('#task_text')
    let task_type = document.querySelector('.task_type')
    let task_percentage = document.querySelector('.task_percentage')

    let selected

    let cldn

    let width = 0

    let mobile = false

    @if(str_contains(strtolower($_SERVER["HTTP_USER_AGENT"]), 'mobile'))
        mobile = true
    @endif

    let is_dark = {{ is_dark() ? 1 : 0 }}

    if(is_dark)
    {
        if(document.querySelector('.answers_hint'))
        {
            document.querySelector('.answers_hint').classList.remove('text-muted')
            document.querySelector('.answers_hint').classList.add('text-dark')

        }
    }

    if (task_type.value == 1)
    {

        if(mobile)
        {

            let image = document.querySelector('.image')

            if(image)
            {
                if(image.style.backgroundImage.length > 1)
                {

                    image.style.width = '90%'
                    image.style.height = '200px'

                }
            }

            document.querySelector('.answers_div').style.width = '90%'

            let answers = document.querySelectorAll('.answer')

            answers.forEach(answer => {

                answer.style.fontSize = '17px'

            });

            let inputs = document.querySelectorAll('.input')

            inputs.forEach(input => {

                input.style.height = '37.5px'
                input.style.padding = '3px 10px'

            });

            let words = document.querySelectorAll('.word')

            words.forEach(word => {

                word.style.fontSize = '17px'

            });

            document.querySelector('tr').children[0].style.fontSize = '20px'
            document.querySelector('tr').children[1].style.fontSize = '20px'

            document.querySelector('.inputs_div').style.width = '90%'

            // CREATING CHECK BUTTON
            let check_button = document.createElement('button')
            check_button.classList.add('btn')
            check_button.classList.add('btn-primary')
            check_button.classList.add('check')
            check_button.setAttribute('disabled', '')
            check_button.innerText = `{{ __('main.check') }}`

            completedTask.appendChild(check_button)

            // ADDING EVENTLISTENER TO CHECK BUTTON
            check_button.addEventListener('click', function () {

                let right_count = 0

                inputs.forEach(input => {

                    if(input.attributes.answer.value == input.children[0].innerText)
                    {

                        right_count = right_count + 1

                    } else
                    {

                        input.style.backgroundColor = ''
                        input.classList.add('bg-danger')

                    }

                });

                // HIDING ANSWERS DIV
                document.querySelector('.answers_div').setAttribute('hidden', '')

                // COUNTING RIGHT ANSWERS PERCENTAGE
                let asd = (100 * right_count) / inputs.length
                let percentage = Math.round(asd)
                rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
                task_percentage.value = percentage
                task_text.value = completedTask.innerHTML

                setTimeout(function() {

                    hiddenButton.click()

                }, 1000);

            })

            function check_inputs()
            {

                let count = 0

                inputs.forEach(input => {

                    // CHECKING INPUT`S WIDTH
                    if(input.children.length == 0)
                    {

                        input.style.top = '4px'
                        input.style.width = '60%'

                    } else
                    {

                        input.style.width = ''
                        input.style.top = ''

                        count = count + 1

                    }

                });

                if(count == inputs.length)
                {

                    check_button.removeAttribute('disabled')

                }

            }

            check_inputs()

            // ADDING EVENTLISTENER TO ANSWERS
            let answers_hint = document.querySelector('.answers_hint')

            let selected_answer
            let selected_answer_from

            function input_get_f()
            {

                if(this.children.length == 1)
                {

                    if(selected_answer_from.tagName == 'LABEL')
                    {

                        let this_element = this.children[0]

                        this.appendChild(selected_answer)
                        selected_answer_from.appendChild(this_element)

                        answers_hint.innerText = `{{ __('main.drag_and_drop_translations_into_the_relevant_cells') }}`
                        answers_hint.classList.add('text-dark')
                        answers_hint.classList.remove('text-primary')
                        inputs.forEach(input => {

                            input.style.border = ''
                            input.removeEventListener('click', input_get_f)

                        });

                        check_inputs()

                        selected_answer = ''

                    } else
                    {

                        answers_hint.classList.remove('text-dark')
                        answers_hint.classList.remove('text-primary')
                        answers_hint.classList.add('text-danger')
                        answers_hint.innerText = `{{ __('main.one_cell_cannot_contain_two_answers') }}`

                    }

                } else
                {

                    this.appendChild(selected_answer)

                    answers_hint.innerText = `{{ __('main.drag_and_drop_translations_into_the_relevant_cells') }}`
                    answers_hint.classList.add('text-dark')
                    answers_hint.classList.remove('text-primary')
                    inputs.forEach(input => {

                        input.style.border = ''
                        input.removeEventListener('click', input_get_f)

                    });

                    check_inputs()

                    selected_answer = ''

                }

                answers = document.querySelectorAll('.answer')

                answers.forEach(answer => {

                    answer.addEventListener('click', answer_move)

                });

            }

            function answer_move()
            {

                answers_hint.innerText = `{{ __('main.click_on_the_cell_you_want_to_move_answer_to') }}`
                answers_hint.classList.add('text-primary')
                answers_hint.classList.remove('text-dark')
                selected_answer = this
                selected_answer_from = this.parentElement

                answers.forEach(answer => {

                    if(answer.parentElement.tagName == 'LABEL')
                    {

                        answer.removeEventListener('click', answer_move)

                    }

                });

                if(selected_answer.parentElement.tagName == 'LABEL')
                {

                    inputs.forEach(input => {

                        input.style.border = '1px solid red'
                        input.addEventListener('click', input_get_f)

                    });

                    selected_answer.parentElement.removeEventListener('click', input_get_f)
                    selected_answer.parentElement.style.border = ''

                } else
                {

                    inputs.forEach(input => {

                        input.style.border = '1px solid red'
                        input.addEventListener('click', input_get_f)

                    });

                }


            }

            answers.forEach(answer => {

                answer.addEventListener('click', answer_move)

            });

        } else
        {

            let answers = document.querySelectorAll('.answer')
            let inputs = document.querySelectorAll('.input')

            let answers_hint = document.querySelector('.answers_hint')

            // CREATING CHECK BUTTON
            let check_button = document.createElement('button')
            check_button.classList.add('btn')
            check_button.classList.add('btn-primary')
            check_button.classList.add('check')
            check_button.setAttribute('disabled', '')
            check_button.innerText = `{{ __('main.check') }}`

            completedTask.appendChild(check_button)

            // ADDING EVENTLISTENER TO CHECK BUTTON
            check_button.addEventListener('click', function () {

                let right_count = 0

                inputs.forEach(input => {

                    if(input.attributes.answer.value == input.children[0].innerText)
                    {

                        right_count = right_count + 1

                    } else
                    {

                        input.style.backgroundColor = ''
                        input.classList.add('bg-danger')

                    }

                });

                // HIDING ANSWERS DIV
                document.querySelector('.answers_div').setAttribute('hidden', '')

                // COUNTING RIGHT ANSWERS PERCENTAGE
                let asd = (100 * right_count) / inputs.length
                let percentage = Math.round(asd)
                rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
                task_percentage.value = percentage
                task_text.value = completedTask.innerHTML

                setTimeout(function() {

                    hiddenButton.click()

                }, 1000);

            })

            function check_inputs()
            {

                let count = 0

                inputs.forEach(input => {

                    // CHECKING INPUT`S WIDTH
                    if(input.children.length == 0)
                    {

                        input.style.width = '200px'
                        input.style.top = '4px'

                    } else
                    {

                        input.style.width = ''
                        input.style.top = ''

                        count = count + 1

                    }

                });

                if(count == inputs.length)
                {

                    check_button.removeAttribute('disabled')

                }

            }

            check_inputs()

            answers.forEach(answer => {
                answer.addEventListener('dragstart', dragStart)
                answer.addEventListener('dragend', dragEnd)
                answer.setAttribute('draggable', 'true')
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

            }

            function dragDrop() {

                // IF INPUT IS EMPTY JUST ADD NEW ANSWER
                if(this.children.length == 0)
                {

                    this.append(dragItem);

                    answers_hint.classList.add('text-dark')
                    answers_hint.classList.remove('text-danger')
                    answers_hint.innerText = `{{ __('main.drag_and_drop_translations_into_the_relevant_cells') }}`

                } else
                {

                    if(this.children[0].innerText !== dragItem.innerText)
                    {

                        // IF INPUT IS FULL AND ELEMENT COME FROM ANOTHER IMPUT SWITCH THEM
                        if(dragItem.parentElement.classList.contains('input'))
                        {

                            let this_value = this.innerText
                            let parentElement_value = dragItem.innerText

                            this.children[0].innerText = parentElement_value
                            dragItem.innerText = this_value

                            answers_hint.classList.add('text-dark')
                            answers_hint.classList.remove('text-danger')
                            answers_hint.innerText = `{{ __('main.drag_and_drop_translations_into_the_relevant_cells') }}`

                        } else
                        {

                            answers_hint.classList.remove('text-dark')
                            answers_hint.classList.add('text-danger')
                            answers_hint.innerText = `{{ __('main.one_cell_cannot_contain_two_answers') }}`

                        }

                    }


                }

                check_inputs()

            }

            inputs.forEach(input => {
                input.addEventListener('dragover', dragOver);
                input.addEventListener('dragenter', dragEnter);
                input.addEventListener('dragleave', dragLeave);
                input.addEventListener('drop', dragDrop);
            });

        }


    }

    if (task_type.value == 2)
    {

        let tx = document.querySelector('.text_div')
        tx.querySelectorAll('div').forEach(div => {
            div.style.cssText = `display: flex; flex-wrap: wrap; justify-content: center; column-gap: 10px; row-gap: 5px;`
        })

        if(mobile)
        {

            let image = document.querySelector('.image')

            if(image)
            {
                if(image.style.backgroundImage.length > 1)
                {

                    image.style.width = '90%'
                    image.style.height = '200px'

                }
            }

            document.querySelector('.answers_div').style.width = '90%'

            let answers = document.querySelectorAll('.answer')

            let inputs = document.querySelectorAll('.input')

            let words = document.querySelectorAll('.word')

            words.forEach(word => {

                word.style.fontSize = '17px'

            });

            document.querySelector('.text_div').style.width = '90%'

            // CREATING CHECK BUTTON
            let check_button = document.createElement('button')
            check_button.classList.add('btn')
            check_button.classList.add('btn-primary')
            check_button.classList.add('check')
            check_button.setAttribute('disabled', '')
            check_button.innerText = `{{ __('main.check') }}`

            completedTask.appendChild(check_button)

            // ADDING EVENTLISTENER TO CHECK BUTTON
            check_button.addEventListener('click', function () {

                let right_count = 0

                inputs.forEach(input => {

                    if(input.attributes.answer.value.slice(-1) == ' ')
                    {

                        input.attributes.answer.value = input.attributes.answer.value.slice(0, input.attributes.answer.value.length-1)

                    }

                    if(input.attributes.answer.value == input.children[0].innerText)
                    {

                        right_count = right_count + 1
                        input.style.backgroundColor = ''
                        input.classList.add('bg-success')

                    } else
                    {

                        input.style.backgroundColor = ''
                        input.classList.add('bg-danger')

                    }

                });

                // HIDING ANSWERS DIV
                document.querySelector('.answers_div').setAttribute('hidden', '')

                // COUNTING RIGHT ANSWERS PERCENTAGE
                let asd = (100 * right_count) / inputs.length
                let percentage = Math.round(asd)
                rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
                task_percentage.value = percentage
                task_text.value = completedTask.innerHTML

                setTimeout(function() {

                    hiddenButton.click()

                }, 1000);

            })

            function check_inputs()
            {

                let count = 0

                inputs.forEach(input => {

                    // CHECKING INPUT`S WIDTH
                    if(input.children.length == 1)
                    {

                        count = count + 1

                    }

                });

                if(count == inputs.length)
                {

                    check_button.removeAttribute('disabled')

                }

            }

            check_inputs()

            // ADDING EVENTLISTENER TO ANSWERS
            let answers_hint = document.querySelector('.answers_hint')

            let selected_answer
            let selected_answer_from

            function input_get_f()
            {

                if(this.children.length == 1)
                {

                    if(selected_answer_from.tagName == 'LABEL')
                    {

                        let this_element = this.children[0]

                        this.appendChild(selected_answer)
                        selected_answer_from.appendChild(this_element)

                        answers_hint.innerText = `{{ __('main.drag_and_drop_translations_into_the_relevant_cells') }}`
                        answers_hint.classList.add('text-dark')
                        answers_hint.classList.remove('text-primary')
                        inputs.forEach(input => {

                            input.style.border = ''
                            input.removeEventListener('click', input_get_f)

                        });

                        check_inputs()

                        selected_answer = ''

                    } else
                    {

                        answers_hint.classList.remove('text-dark')
                        answers_hint.classList.remove('text-primary')
                        answers_hint.classList.add('text-danger')
                        answers_hint.innerText = `{{ __('main.one_cell_cannot_contain_two_answers') }}`

                    }

                } else
                {

                    this.appendChild(selected_answer)

                    answers_hint.innerText = `{{ __('main.drag_and_drop_translations_into_the_relevant_cells') }}`
                    answers_hint.classList.add('text-dark')
                    answers_hint.classList.remove('text-primary')
                    inputs.forEach(input => {

                        input.style.border = ''
                        input.removeEventListener('click', input_get_f)

                    });

                    check_inputs()

                    selected_answer = ''

                }

                answers = document.querySelectorAll('.answer')

                answers.forEach(answer => {

                    answer.addEventListener('click', answer_move)

                });

            }

            function answer_move()
            {

                answers_hint.innerText = `{{ __('main.click_on_the_cell_you_want_to_move_answer_to') }}`
                answers_hint.classList.add('text-primary')
                answers_hint.classList.remove('text-dark')
                selected_answer = this
                selected_answer_from = this.parentElement

                answers.forEach(answer => {

                    if(answer.parentElement.tagName == 'LABEL')
                    {

                        answer.removeEventListener('click', answer_move)

                    }

                });

                if(selected_answer.parentElement.tagName == 'LABEL')
                {

                    inputs.forEach(input => {

                        input.style.border = '1px solid red'
                        input.addEventListener('click', input_get_f)

                    });

                    selected_answer.parentElement.removeEventListener('click', input_get_f)
                    selected_answer.parentElement.style.border = ''

                } else
                {

                    inputs.forEach(input => {

                        input.style.border = '1px solid red'
                        input.addEventListener('click', input_get_f)

                    });

                }


            }

            answers.forEach(answer => {

                answer.addEventListener('click', answer_move)

            });

        } else
        {

            document.querySelectorAll('br').forEach(br => {
                br.remove()
            });

            let answers = document.querySelectorAll('.answer')
            let inputs = document.querySelectorAll('.input')

            let answers_hint = document.querySelector('.answers_hint')

            // CREATING CHECK BUTTON
            let check_button = document.createElement('button')
            check_button.classList.add('btn')
            check_button.classList.add('btn-primary')
            check_button.classList.add('check')
            check_button.setAttribute('disabled', '')
            check_button.innerText = `{{ __('main.check') }}`

            completedTask.appendChild(check_button)

            // ADDING EVENTLISTENER TO CHECK BUTTON
            check_button.addEventListener('click', function () {

                let right_count = 0

                inputs.forEach(input => {

                    if(input.attributes.answer.value.slice(-1) == ' ')
                    {

                        input.attributes.answer.value = input.attributes.answer.value.slice(0, input.attributes.answer.value.length-1)

                    }

                    if(input.attributes.answer.value == input.children[0].innerText)
                    {

                        right_count = right_count + 1
                        input.style.backgroundColor = ''
                        input.classList.add('bg-success')

                    } else
                    {

                        input.style.backgroundColor = ''
                        input.classList.add('bg-danger')

                    }

                });

                // HIDING ANSWERS DIV
                document.querySelector('.answers_div').setAttribute('hidden', '')

                // COUNTING RIGHT ANSWERS PERCENTAGE
                let asd = (100 * right_count) / inputs.length
                let percentage = Math.round(asd)
                rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
                task_percentage.value = percentage
                task_text.value = completedTask.innerHTML

                setTimeout(function() {

                    hiddenButton.click()

                }, 1000);

            })

            function check_inputs()
            {

                let count = 0

                inputs.forEach(input => {

                    // CHECKING INPUT`S WIDTH
                    if(input.children.length == 0)
                    {

                        input.style.width = '200px'

                    } else
                    {

                        input.style.width = ''

                        count = count + 1

                    }

                });

                if(count == inputs.length)
                {

                    check_button.removeAttribute('disabled')

                }

            }

            check_inputs()

            answers.forEach(answer => {
                answer.addEventListener('dragstart', dragStart)
                answer.addEventListener('dragend', dragEnd)
                answer.setAttribute('draggable', 'true')
            });

            let dragItem = null;

            function dragStart() {
                if(this.parentElement.classList.contains('input'))
                {
                    this.parentElement.style.width = this.parentElement.offsetWidth+'px'
                }
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

            }

            function dragDrop() {

                // IF INPUT IS EMPTY JUST ADD NEW ANSWER
                if(this.children.length == 0)
                {

                    this.append(dragItem);

                    answers_hint.classList.add('text-dark')
                    answers_hint.classList.remove('text-danger')
                    answers_hint.innerText = `{{ __('main.drag_and_drop_translations_into_the_relevant_cells') }}`

                } else
                {

                    if(this.children[0].innerText !== dragItem.innerText)
                    {
                        // IF INPUT IS FULL AND ELEMENT COME FROM ANOTHER IMPUT SWITCH THEM
                        if(dragItem.parentElement.classList.contains('input'))
                        {

                            let this_value = this.innerText
                            let parentElement_value = dragItem.innerText

                            this.children[0].innerText = parentElement_value
                            dragItem.innerText = this_value

                            answers_hint.classList.add('text-dark')
                            answers_hint.classList.remove('text-danger')
                            answers_hint.innerText = `{{ __('main.drag_and_drop_translations_into_the_relevant_cells') }}`

                        } else
                        {

                            answers_hint.classList.remove('text-dark')
                            answers_hint.classList.add('text-danger')
                            answers_hint.innerText = `{{ __('main.one_cell_cannot_contain_two_answers') }}`

                        }
                    }

                }

                check_inputs()

            }

            inputs.forEach(input => {
                input.addEventListener('dragover', dragOver);
                input.addEventListener('dragenter', dragEnter);
                input.addEventListener('dragleave', dragLeave);
                input.addEventListener('drop', dragDrop);
            });

        }

    }

    if (task_type.value == 3) {

        if(mobile)
        {

            let image = document.querySelector('.image')

            if(image)
            {

                if(image.style.backgroundImage.length > 1)
                {

                    image.style.width = '90%'
                    image.style.height = '200px'

                }

            }


            document.querySelector('.text_div').style.width = '90%'

            // REATING CHECK BUTTON AND ADDING EVENTLISTENER
            let check_button = document.createElement('button')
            check_button.classList.add('btn')
            check_button.classList.add('btn-primary')
            check_button.classList.add('check')
            check_button.setAttribute('disabled', '')
            check_button.innerText = `{{ __('main.check') }}`

            completedTask.appendChild(check_button)

            // CHECKING INPUTS AND ADDING EVENTLISTENERS

            let inputs = document.querySelectorAll('.fi_input')

            function finish_checking()
            {

                let right = 0

                inputs.forEach(input => {

                    input.value = input.value.trim()
                    input.attributes.answer.value = input.attributes.answer.value.trim()

                    input.setAttribute('value', input.value)

                    if(input.value.toLowerCase() == input.attributes.answer.value.toLowerCase())
                    {

                        right = right + 1
                        input.style.backgroundColor = 'green'

                    } else
                    {

                        input.style.backgroundColor = 'red'

                    }

                })

                this.removeEventListener('click', finish_checking)
                this.setAttribute('disabled', '')

                // COUNTING RIGHT ANSWERS PERCENTAGE
                let asd = (100 * right) / inputs.length
                let percentage = Math.round(asd)
                rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
                task_percentage.value = percentage
                task_text.value = completedTask.innerHTML

                setTimeout(function() {

                    hiddenButton.click()

                }, 1000);

            }

            function check_task()
            {

                let count = 0

                inputs.forEach(input => {

                    if(input.value.length >= 2)
                    {

                        count = count + 1

                    }

                });

                if(count == inputs.length)
                {

                    check_button.removeAttribute('disabled')
                    check_button.addEventListener('click', finish_checking)

                } else
                {

                    check_button.setAttribute('disabled', '')
                    check_button.removeEventListener('click', finish_checking)

                }

            }

            inputs.forEach(input => {

                input.addEventListener('keyup', check_task)

            });

        } else
        {

            for (let i = 0; i < document.querySelector('.text_div').children.length; i++) {
                if(document.querySelector('.text_div').children[i].tagName == 'DIV')
                {
                    document.querySelector('.text_div').children[i].style.cssText = `display: flex; flex-wrap: wrap; justify-content: center; column-gap: 10px; row-gap: 5px;`
                }
            }


            // CREATING CHECK BUTTON AND ADDING EVENTLISTENER
            let check_button = document.createElement('button')
            check_button.classList.add('btn')
            check_button.classList.add('btn-primary')
            check_button.classList.add('check')
            check_button.setAttribute('disabled', '')
            check_button.innerText = `{{ __('main.check') }}`

            completedTask.appendChild(check_button)

            // CHECKING INPUTS AND ADDING EVENTLISTENERS

            let inputs = document.querySelectorAll('.fi_input')

            function finish_checking()
            {

                let right = 0

                inputs.forEach(input => {

                    input.value = input.value.trim()
                    input.attributes.answer.value = input.attributes.answer.value.trim()

                    input.setAttribute('value', input.value)

                    if(input.value.toLowerCase() == input.attributes.answer.value.toLowerCase())
                    {

                        right = right + 1
                        input.style.backgroundColor = 'green'

                    } else
                    {

                        input.style.backgroundColor = 'red'

                    }

                })

                this.removeEventListener('click', finish_checking)
                this.setAttribute('disabled', '')

                // COUNTING RIGHT ANSWERS PERCENTAGE
                let asd = (100 * right) / inputs.length
                let percentage = Math.round(asd)
                rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
                task_percentage.value = percentage
                task_text.value = completedTask.innerHTML

                setTimeout(function() {

                    hiddenButton.click()

                }, 1000);

            }

            function check_task()
            {

                let count = 0

                inputs.forEach(input => {

                    if(input.value.length >= 2)
                    {

                        count = count + 1

                    }

                });

                if(count == inputs.length)
                {

                    check_button.removeAttribute('disabled')
                    check_button.addEventListener('click', finish_checking)

                } else
                {

                    check_button.setAttribute('disabled', '')
                    check_button.removeEventListener('click', finish_checking)

                }

            }

            inputs.forEach(input => {

                input.addEventListener('keyup', check_task)

            });

        }


    }

    if (task_type.value == 4) {

        if(is_dark)
        {
            document.querySelectorAll('.abc_ans').forEach(answer => {
                answer.style.border = '1px solid white'
                answer.children[0].style.borderRight = '1px solid white'
            });
        }

        if(mobile)
        {

            if(document.querySelector('.youtube'))
            {

                document.querySelector('.youtube').style.width = '100%'
                document.querySelector('.youtube').style.height = '250px'

            }

            // CREATING CHECK BUTTON + EVENTLISTENER
            check_button = document.createElement('button')
            check_button.classList.add('btn')
            check_button.classList.add('btn-primary')
            check_button.classList.add('check')
            check_button.innerText = `{{ __('main.check') }}`
            check_button.setAttribute('disabled', '')

            completedTask.appendChild(check_button)

            check_button.addEventListener('click', function () {

                let right_count = 0

                let picked = document.querySelectorAll('.picked')

                picked.forEach(element => {

                    if(element.classList.contains('right'))
                    {

                        right_count = right_count + 1

                        element.style.backgroundColor = `rgb(137, 255, 101)`

                    } else
                    {

                        element.style.backgroundColor = `rgb(255, 101, 101)`

                    }

                });

                let asd = (100 * right_count) / tasks.length
                let percentage = Math.round(asd)

                rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
                document.querySelector('.task_percentage').value = percentage

                task_text.value = completedTask.innerHTML


                window.setTimeout(() => {

                    hiddenButton.click()

                }, 1000);

            })

            let tasks = document.querySelectorAll('.abc_task')

            tasks.forEach(task => {

                if(task.children.length == 3)
                {

                    task.children[1].style.width = '100%'
                    task.children[1].style.height = '250px'

                }

            });

            function check_if_chosen()
            {

                let picked = document.querySelectorAll('.picked')

                if(picked.length == tasks.length)
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
                    children[i].style.color = ``
                    children[i].classList.remove('picked')

                }

                this.classList.add('picked')
                this.style.backgroundColor = `#88b5fc`
                this.style.color = `black`

                check_if_chosen()

            }

            let answers = document.querySelectorAll('.abc_ans')

            answers.forEach(answer => {

                answer.addEventListener('click', choose_answer)
                answer.setAttribute('role', 'button')

                answer.style.width = "100%"
                answer.style.height = '50px'

                answer.children[0].style.width = '50px'
                answer.children[0].children[0].style.fontSize = '20px'

                answer.children[1].children[0].style.fontSize = '18px'

            });

        } else
        {

            let check_button = document.createElement('button')
            check_button.classList.add('btn')
            check_button.classList.add('btn-primary')
            check_button.classList.add('check')
            check_button.innerText = `{{ __('main.check') }}`
            check_button.setAttribute('disabled', '')

            completedTask.appendChild(check_button)

            check_button.addEventListener('click', function () {

                let right_count = 0

                let picked = document.querySelectorAll('.picked')

                picked.forEach(element => {

                    if(element.classList.contains('right'))
                    {

                        right_count = right_count + 1

                        element.style.backgroundColor = `rgb(137, 255, 101)`

                    } else
                    {

                        element.style.backgroundColor = `rgb(255, 101, 101)`

                    }

                });

                let asd = (100 * right_count) / tasks.length
                let percentage = Math.round(asd)

                rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
                document.querySelector('.task_percentage').value = percentage

                task_text.value = completedTask.innerHTML


                window.setTimeout(() => {

                    hiddenButton.click()

                }, 1000);

            })

            let tasks = document.querySelectorAll('.abc_task')

            function check_if_chosen()
            {

                let picked = document.querySelectorAll('.picked')

                if(picked.length == tasks.length)
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
                    children[i].style.color = ``
                    children[i].classList.remove('picked')

                }

                this.classList.add('picked')
                this.style.backgroundColor = `#88b5fc`
                this.style.color = `black`

                check_if_chosen()

            }

            let answers = document.querySelectorAll('.abc_ans')

            answers.forEach(answer => {

                answer.addEventListener('click', choose_answer)
                answer.setAttribute('role', 'button')

            });

        }


    }

    if (task_type.value == 5) {

        if(mobile)
        {

            document.querySelectorAll('iframe').forEach(e => {
                e.classList.add('w-100')
            })

            document.querySelectorAll('tr').forEach(e => {
                e.classList.add('border')
            })
            document.querySelectorAll('td').forEach(e => {
                e.classList.add('border')
            })
            document.querySelectorAll('th').forEach(e => {
                e.classList.add('border')
            })
            if(document.querySelector('table'))
            {

                document.querySelectorAll('table').forEach(table => {

                    table.style.width = '100%'

                })

            }
            if(document.querySelector('img'))
            {

                document.querySelectorAll('img').forEach(img => {

                    img.removeAttribute('width')
                    img.removeAttribute('height')
                    img.style.cssText = `width: 100%;`

                })

            }
            let completed_task = document.querySelector('#completed_task')
            completed_task.classList.add('text-start')
            completed_task.classList.add('w-100')

        } else
        {

            let completed_task = document.querySelector('#completed_task')

            completed_task.classList.remove('w-100')
            completed_task.style.width = '80%'
            completed_task.classList.add('mx-auto')
            completed_task.classList.add('text-start')
            completed_task.classList.add('mt-4')

            document.querySelectorAll('tr').forEach(e => {
                e.classList.add('border')
            })
            document.querySelectorAll('td').forEach(e => {
                e.classList.add('border')
            })
            document.querySelectorAll('th').forEach(e => {
                e.classList.add('border')
            })
            if(document.querySelector('table'))
            {

                document.querySelectorAll('table').forEach(table => {

                    table.style.width = '100%'

                })

            }


        }


    }
</script>
@endsection
