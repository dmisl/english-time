@extends('layouts.main')
@section('main.title', env('APP_NAME').' | '.$task->name)

@section('main.content')

<div class="container">
    <a href="{{ route('lesson.show', [$course, $lesson]) }}">{{ __('main.back') }}</a>

    <h1>{{ $task->name }}</h1>
    <input class="task_type" type="hidden" value="{{ $task->task_type }}">

    @if(is_admin())

    <div id="completed_task">
        <h2 id="right_answers" class="text-success"></h2>
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

    <div id="completed_task">
        <h2 id="right_answers" class="text-success"></h2>
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

if(task_type.value == 1 || task_type.value == 2)
{
    const items = document.querySelectorAll('.answer')
    const inputs = document.querySelectorAll('.input')
    let check = document.querySelector('#check')
    let count = 0
    let rightCount = 0;
    let texts = document.querySelectorAll('.text')
    let solutions = document.querySelectorAll('.solution')
    solutions.forEach(element => {
        element.addEventListener('keyup', function ()
        {
            count = 0
            solutions.forEach(element => {
                if(element.value.length >= 1)
                {
                    count++
                }
                else
                {
                    count--
                }
            })
            if(count == solutions.length)
            {
                check.removeAttribute('disabled')
            } else
            {
                check.setAttribute('disabled', '')
            }
        })
    });

    check.addEventListener('click', function (element) {

        check.setAttribute('disabled', '')
        if(solutions.length >= 1)
        {
            let answer
            let question
            for (let i = 0; i < solutions.length; i++) {
                if(solutions[i].value.toLowerCase() == solutions[i].attributes.solution.value)
                {
                    solutions[i].style.backgroundColor = 'green'
                    rightCount++
                }
                else
                {
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
            setTimeout(function () { hiddenButton.click() }, 3000);
        }
        if(solutions.length == 0)
        {
            for (let i = 0; i < inputs.length; i++) {
                let childValue = inputs[i].children[0].attributes.value.value
                let answer = inputs[i].attributes.answer.value
                if(childValue == answer)
                {
                    inputs[i].style.backgroundColor = 'green'
                    rightCount++
                }
                else
                {
                    inputs[i].style.backgroundColor = 'red'
                }
                hidden.innerHTML += `<input name="answers[]" value="${childValue}"> <input name="questions[]" value="${answer}">`
            }

            let asd = (100 * rightCount) / inputs.length
            let percentage = Math.round(asd)
            rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
            hidden.innerHTML += `<input name="percentage" value="${percentage}">`
            let text = ''
            for(let i = 0; i < texts.length; i++)
            {
                text = texts[i].innerText
                hidden.innerHTML += `<input name="texts[]" value="${text}">`
            }
            task_text.value = completedTask.innerHTML
            setTimeout(function () { hiddenButton.click() }, 3000);
        }
    })

    function clickSubmit()
    {
        hiddenButton.click()
    }

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
    function dragEnter() {
    }
    function dragLeave() {
        count = 0
    }
    function dragDrop() {
        this.append(dragItem);
        count = 0
        inputs.forEach(e => {
            if(e.children.length == 1)
            {
                count++
            }
            else
            {
                count--
            }
        })
        if(count == items.length)
        {
            check.removeAttribute('disabled')
        }
        if(count !== items.length)
        {
            check.setAttribute('disabled', '')
        }
        inputs.forEach(e => {
            if(e.children.length == 1)
            {
            }
            else
            {
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
}

if(task_type.value == 3)
{
    let count = 0
    let check = document.querySelector('#check')
    check.setAttribute('disabled', '')
    let inputs = document.querySelectorAll('.fi_input')
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keyup', function () {
            for (let a = 0; a < inputs.length; a++) {
                if(inputs[a].value.length >= 1)
                {
                    count++
                }
            }

            if(inputs.length == count)
            {
                count = 0
                check.removeAttribute('disabled')
            } else
            {
                count = 0
                check.setAttribute('disabled', '')
            }
        })
    }

    check.addEventListener('click', function () {
        for (let i = 0; i < inputs.length; i++) {
            if(inputs[i].value.toLowerCase() == inputs[i].attributes.answer.value.toLowerCase())
            {
                count++
                inputs[i].setAttribute('disabled', '')
                inputs[i].style.backgroundColor = 'green'
                inputs[i].setAttribute('value', inputs[i].value)
            } else
            {
                inputs[i].setAttribute('disabled', '')
                inputs[i].style.backgroundColor = 'red'
            }
        }
        let asd = (100 * count) / inputs.length
        let percentage = Math.round(asd)
        rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
        hidden.innerHTML += `<input name="percentage" value="${percentage}">`
        task_text.value = completedTask.innerHTML

        check.setAttribute('disabled', '')

        setTimeout(function () { hiddenButton.click() }, 3000);
    })
}

if(task_type.value == 4)
{
    let check = document.querySelector('#check')
    let radio_edit = document.querySelectorAll('.radio_edit')
    let radio_label = document.querySelectorAll('.radio_label')
    for (let i = 0; i < radio_edit.length; i++) {
        radio_edit[i].addEventListener('click', function () {
            check.removeAttribute('disabled')
            for (let a = 0; a < radio_edit.length; a++) {
                if(a == i)
                {
                    radio_edit[a].classList.remove('bg-light')
                    radio_edit[a].classList.remove('text-dark')
                    radio_edit[a].classList.add('text-light')
                    radio_edit[a].classList.add('bg-success')
                    radio_edit[a].classList.add('bg-gradient')
                } else
                {
                    radio_edit[a].classList.remove('bg-success')
                    radio_edit[a].classList.add('bg-light')
                    radio_edit[a].classList.add('text-dark')
                }
            }
            console.log('#'+radio_label[i].attributes.for.value)
            selected = document.querySelector('#'+radio_label[i].attributes.for.value)
        })
    }
    check.addEventListener('click', function () {
        check.setAttribute('disabled', '')
        if(selected.classList.contains('right'))
        {
            let percentage = 100
            rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
            hidden.innerHTML += `<input name="percentage" value="${percentage}">`
            task_text.value = completedTask.innerHTML
            setTimeout(function () { hiddenButton.click() }, 3000);
        } else
        {
            let percentage = 0
            rightAnswers.innerHTML = `{{ __('main.correct_answers') }}: ${percentage}%`
            hidden.innerHTML += `<input name="percentage" value="${percentage}">`
            task_text.value = completedTask.innerHTML
            setTimeout(function () { hiddenButton.click() }, 3000);
        }
    })
}

if(task_type.value == 5)
{
    document.querySelectorAll('tr').forEach(e => {
        e.classList.add('border')
    })
    document.querySelectorAll('td').forEach(e => {
        e.classList.add('border')
    })
    document.querySelectorAll('th').forEach(e => {
        e.classList.add('border')
    })
}

</script>
@endsection
