@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Створити нове завдання')

@section('main.content')

<x-form action="{{ route('task.store', [$course, $lesson]) }}" enctype="multipart/form-data">
    <div class="container" id="container">

        {{-- <a href="{{ route('lesson.show', [$course, $lesson]) }}">{{ __('main.back') }}</a>

        <div class="row mt-5">
            <div class="col-12 col-md-6 offset-md-3">
                <x-card>
                    <x-card-body class="border-bottom">
                        <h3>{{ __('main.create_a_task') }}</h3>
                    </x-card-body>
                    <x-card-body>
                        <x-form-item>
                            <x-label class="text-start">
                                {{ __('main.task_name') }}
                            </x-label>
                            <input type="text" class="form-control task_name border text-center">
                        </x-form-item>
                        <x-form-item>
                            <div class="my-3 form-floating m-0" style="width: 100%;"">
                                <select name="task_type" class="form-select task_type border" id="floatingSelect" aria-label="Floating label select example">
                                    <option></option>
                                    <option {{ selected('1', old('task_type')) }} value="1">{{ __('main.translate') }}</option>
                                    <option {{ selected('2', old('task_type')) }} value="2">{{ __('main.fill_in_the_gaps_with_ready_made_options') }}</option>
                                    <option {{ selected('3', old('task_type')) }} value="3">{{ __('main.fill_in_the_blanks_write_manually') }}</option>
                                    <option {{ selected('4', old('task_type')) }} value="4">ABC</option>
                                    <option {{ selected('5', old('task_type')) }} value="5">{{ __('main.info') }}</option>
                                </select>
                                <label for="floatingSelect">{{ __('main.select_a_task_type') }}</label>
                            </div>
                        </x-form-item>
                        <x-form-item>
                            <button class="btn btn-primary go" hidden>
                                {{ __('main.go_to_edit') }}
                            </button>
                        </x-form-item>
                    </x-card-body>
                </x-card>
            </div>
        </div> --}}

        <a href="{{ route('lesson.show', [$course, $lesson]) }}">${tr_back}</a>

        <h1 class="py-3">${task_name.value}</h1>

        <div class="options" hidden style="padding-bottom: 200px;">

            <div class="task_add mt-5" style="background-color: white; width: 80%; margin: 0 auto; user-select: none; color: green;" role="button">

                <h1 style="padding: 20px; padding-bottom: 25px;">
                    +
                </h1>

            </div>

            <p style="padding-top: 5px;">АБО</p>

            <div class="task_finish" style="color: white; display: table; margin: 0 auto; position: relative; background: #FF3232; border: 1px solid #000; border-radius: 10px;" role="button">

                <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">
                    Завершити редактування
                </p>

            </div>

        </div>

        <div class="task_create mt-5" hidden style="color: black; display: table; margin: 0 auto; position: relative; background: #0aca03; border: 1px solid #000; border-radius: 10px;" role="button">

            <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">
                Створити завдання
            </p>

        </div>

        <div hidden class="hidden">
            <input class="task_name" value="${task_name.value}" type="text" name="task_name">
            <input class="task_body" type="text" name="task_body">
            <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
            <input class="task_type" value="${task_type.value}" type="text" name="task_type">
        </div>

</x-form>

<script>

    // let imgInp = document.querySelector('.input')
    // let blah = document.querySelector('.img')

    // imgInp.addEventListener('change', function () {

    //     console.log(1)
    //     let [file] = imgInp.files
    //     if(file)
    //     {
    //         let url = URL.createObjectURL(file)
    //         console.log(url)
    //         blah.style.backgroundImage = `url('${url}')`
    //     }

    // })

</script>

{{-- VARIABLES + NEEDED FUNCTIONS --}}
<script>
    let tr_add_word_translations = `{{ __('main.add_word_translations') }}`
    let tr_i_advise_you_to_paste_the_answers_after_filling_in_the_text_completely_to_avoid_problems = `{!! __('main.i_advise_you_to_paste_the_answers_after_filling_in_the_text_completely_to_avoid_problems') !!}`
    let tr_make_the_highlighted_answer = `{{ __('main.make_the_highlighted_answer') }}`
    let tr_in_this_task_you_need_to_write_the_text_and_highlight_the_word_that_you_will_need_to_insert_the_answer_in_its_place = `{{ __('main.in_this_task_you_need_to_write_the_text_and_highlight_the_word_that_you_will_need_to_insert_the_answer_in_its_place') }}`
    let tr_we_advise_you_to_paste_the_answers_after_filling_in_the_text_to_avoid_problems = `{{ __('main.we_advise_you_to_paste_the_answers_after_filling_in_the_text_to_avoid_problems') }}`
    let tr_some_text = `{{ __('main.some_text') }}`
    let tr_delete_answer_highlighted = `{{ __('main.delete_answer_highlighted') }}`
    let tr_in_this_task_you_need_to_write_the_text_and_highlight_the_word_that_the_student_will_need_to_write_the_answer_in_its_place = `{!! __('main.in_this_task_you_need_to_write_the_text_and_highlight_the_word_that_the_student_will_need_to_write_the_answer_in_its_place') !!}`
    let tr_add_a_picture = `{{ __('main.add_a_picture') }}`
    let tr_add_a_picture_q = `{{ __('main.add_a_picture_q') }}`
    let tr_insert_a_picture_through_a_link = `{{ __('main.insert_a_picture_through_a_link') }}`
    let tr_paste_a_URL_link_to_the_image = `{{ __('main.paste_a_URL_link_to_the_image') }}`
    let tr_to_change_the_text_of_an_answer_option_click_on_the_option_you_want = `{{ __('main.to_change_the_text_of_an_answer_option_click_on_the_option_you_want') }}`
    let tr_i_recommend_changing_all_options_before_moving_on_to_the_next_stage = `{{ __('main.i_recommend_changing_all_options_before_moving_on_to_the_next_stage') }}`
    let tr_yes = `{{ __('main.yes') }}`
    let tr_no = `{{ __('main.no') }}`
    let tr_close = `{{ __('main.close') }}`
    let tr_tap_to_edit_the_text = `{{ __('main.tap_to_edit_the_text') }}`
    let tr_confirm_the_correct_option = `{{ __('main.confirm_the_correct_option') }}`
    let tr_choose_the_correct_answer = `{{ __('main.choose_the_correct_answer') }}`
    let tr_choose_a_way_to_insert_a_picture = `{{ __('main.choose_a_way_to_insert_a_picture') }}`
    let tr_upload = `{{ __('main.upload') }}`
    let tr_insert_link = `{{ __('main.insert_link') }}`
    let tr_uploading_a_picture = `{{ __('main.uploading_a_picture') }}`
    let tr_upload_a_picture = `{{ __('main.upload_a_picture') }}`
    let tr_view_the_result = `{{ __('main.view_the_result') }}`
    let tr_create_a_task = `{{ __('main.create_a_task') }}`
    let tr_view_the_final_result = `{{ __('main.view_the_final_result') }}`
    let tr_close_view = `{{ __('main.close_view') }}`
    let tr_check = `{{ __('main.check') }}`
    let tr_go_to_the_next_step = `{{ __('main.go_to_the_next_step') }}`
    let tr_enter_the_answer = `{{ __('main.enter_the_answer') }}`
    let tr_finish_editing_the_task = `{{ __('main.finish_editing_the_task') }}`
    let tr_enter_the_word_for_translation = `{{ __('main.enter_the_word_for_translation') }}`
    let tr_answers = `{{ __('main.answers') }}`
    let tr_add_translation_fields_automatically = `{{ __('main.add_translation_fields_automatically') }}`
    let tr_translation = `{{ __('main.translation') }}`
    let tr_word = `{{ __('main.word') }}`
    let tr_back = `{{ __('main.back') }}`
    let tr_add_answers_to_insert = `{{ __('main.add_answers_to_insert') }}`

    let scriptTranslationss = "{{ asset('storage/js/translation.js') }}"
    let scriptFillGapss = "{{ asset('storage/js/fillGaps/fillGaps.js') }}"
    let scriptInputs = `{{ asset('storage/js/addInputs.js') }}`
    let scriptAnswers = `{{ asset('storage/js/addAnswer.js') }}`
    let scriptfAnswers = `{{ asset('storage/js/fillGaps/addAnswers.js') }}`
    let scriptABCImage = `{{ asset('storage/js/ABC/addImage.js') }}`
    let scriptABCAnswers = `{{ asset('storage/js/ABC/addAnswers.js') }}`
    let scriptIAddInputs = `{{ asset('storage/js/iFillGaps/addInputs.js') }}`
    let edit_icon = `{{ asset('storage/icons/edit.png') }}`
    let accept_icon = `{{ asset('storage/icons/accept.png') }}`
    let deny_icon = `{{ asset('storage/icons/deny.png') }}`
    let asset = `{{ asset('storage/') }}`
    let empty_jpg = `{{ asset('storage/icons/empty.jpg') }}`
    let bg_jpg = `{{ asset('storage/icons/bg.jpg') }}`
    let bg_image_upload = `{{ asset('storage/icons/image_upload.png') }}`
    let bg_image_url = `{{ asset('storage/icons/image_url.png') }}`

    function shuffle(array) {

        let currentIndex = array.length,  randomIndex;

        // While there remain elements to shuffle.
        while (currentIndex > 0) {

            // Pick a remaining element.
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex--;

            // And swap it with the current element.
            [array[currentIndex], array[randomIndex]] = [
            array[randomIndex], array[currentIndex]];


        }

        return array;

    }

    function check_name_type()
    {
        if(task_name.value.length >= 1)
        {
            if(task_type.value >= 1)
            {
                go.removeAttribute('hidden')
            } else
            {
                go.setAttribute('hidden', '')
            }
        } else {
            go.setAttribute('hidden', '')
        }
    }

    function replace(string, from, to)
    {
        if(string.includes(from))
        {
            string = string.replaceAll(from, to)
            if(string.slice(-1) == to)
            {
                string = string.slice(0, string.length-1)
            }
            return string
        } else
        {
            return string
        }
    }

</script>

<script>
    container.style.cssText = 'padding-bottom: 200px;'
    // ABC TEXT

    // CHANGING DIV TO EDITABLE INPUT
    function change()
    {

        this.style.backgroundColor = 'white'
        this.setAttribute('contenteditable', 'true')
        this.removeEventListener('click', change)
        this.children[0].innerText = 'Нажміть щоб відредагувати'
        this.parentElement.children[1].innerText = 'змініть запитання'

        // ADDING EVENTLISTENER TO INPUT CHECKING VALUE
        this.addEventListener('keyup', function () {

            check_task()

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

    // ABC IMAGE

    function url_image_edit_f()
    {

        let img = this.parentElement.querySelector('.img')
        let test_img = this.parentElement.querySelector('img')
        let hint = this.parentElement.querySelector('p')
        let dis = this

        if(this.value.length >= 10)
        {

            if(/\.(jpg|jpeg|png|webp|avif|gif|svg)$/.test(this.value))
            {

                test_img.src = dis.value
                test_img.onload = function () {

                    dis.setAttribute('status', 1)
                    img.style.cssText = `width: 450px; height: 250px; background-image: url('${dis.value}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
                    check_task()
                    hint.innerText = ''

                }
                test_img.onerror = function () {

                    img.style.cssText = `width: 450px; height: 250px; background-image: url('${empty_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
                    dis.value = ''
                    dis.setAttribute('placeholder', 'Вставте поправний URL-адрес')
                    dis.setAttribute('status', 2)
                    check_task()

                }

            } else
            {

                img.style.cssText = `width: 450px; height: 250px; background-image: url('${empty_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
                dis.value = ''
                dis.setAttribute('placeholder', 'Вставте поправний URL-адрес')
                dis.setAttribute('status', 2)
                check_task()

            }


        }

    }

    function add_image_f()
    {

        this.classList.add('d-flex')
        this.classList.add('justify-content-center')
        this.style.cssText = `margin: 30px auto 20px; gap: 20px;`

        this.children[0].remove()

        // ADD IMAGE UPLOAD DIV
        let image_upload = document.createElement('div')
        image_upload.setAttribute('role', 'button')
        image_upload.style.cssText = `display: table; background-image: url('${bg_image_upload}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

        this.appendChild(image_upload)

        let image_upload_p = document.createElement('p')
        image_upload_p.style.cssText = `padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
        image_upload_p.innerText = `Загрузити з комп'ютера`

        image_upload.appendChild(image_upload_p)

        // ADD IMAGE URL DIV
        let image_url = document.createElement('div')
        image_url.setAttribute('role', 'button')
        image_url.style.cssText = `display: table; background-image: url('${bg_image_url}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

        this.appendChild(image_url)

        let image_url_p = document.createElement('p')
        image_url_p.style.cssText = `padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
        image_url_p.innerText = `Загрузити з інтернета`

        image_url.appendChild(image_url_p)

        this.removeEventListener('click', add_image_f)

        image_url.addEventListener('click', add_url_image_f)
        image_upload.addEventListener('click', add_upload_image_f)

    }

    function add_upload_image_f()
    {

        let parent = this.parentElement

        parent.children[0].remove()
        parent.children[0].remove()

        parent.classList.remove('d-flex')
        parent.classList.remove('justify-content-center')
        parent.style.cssText = `display: table; margin: 30px auto 20px; border-radius: 10px; color: black;`

        let image_input = document.createElement('input')
        image_input.classList.add('form-control')
        image_input.setAttribute('type', 'file')

        parent.appendChild(image_input)

        let image_hint = document.createElement('p')
        image_hint.classList.add('small')
        image_hint.classList.add('text-danger')
        image_hint.classList.add('p-0')
        image_hint.classList.add('m-0')

        parent.appendChild(image_hint)

        let image_preview = document.createElement('div')
        image_preview.classList.add('img')
        image_preview.style.cssText = `background-image: url('${empty_jpg}'); background-position: center; background-size: cover; background-repeat: no-repeat; width: 450px; height: 250px;`

        parent.appendChild(image_preview)

    }

    function add_url_image_f()
    {

        let parent = this.parentElement
        parent.children[0].remove()
        parent.children[0].remove()
        parent.classList.remove('justify-content-center')
        parent.classList.remove('d-flex')
        parent.style.cssText = `display: table; margin: 30px auto 20px; border-radius: 10px; color: black;`

        let add_image_input = document.createElement('input')
        add_image_input.classList.add('form-control')
        add_image_input.classList.add('text-center')
        add_image_input.style.cssText = 'font-size: 20px; padding: 10px 20px;'
        add_image_input.setAttribute('placeholder', 'Вставте URL-адрес картинки')

        parent.appendChild(add_image_input)

        let add_image_hint = document.createElement('p')
        add_image_hint.classList.add('small')
        add_image_hint.classList.add('text-danger')
        add_image_hint.classList.add('p-0')
        add_image_hint.classList.add('m-0')
        add_image_hint.setAttribute('hidden', '')

        parent.appendChild(add_image_hint)

        add_image_input.focus()

        let add_image_image = document.createElement('div')
        add_image_image.classList.add('img')
        add_image_image.style.cssText = `width: 450px; height: 250px; background-image: url("${empty_jpg}"); background-position: center; background-size: cover; background-repeat: no-repeat;`

        parent.appendChild(add_image_image)

        let add_image_test = document.createElement('img')
        add_image_test.style.cssText = 'display: none;'

        parent.appendChild(add_image_test)

        add_image_input.addEventListener('keyup', url_image_edit_f)

        check_task()

    }

    // ABC ANSWERS

    // CREATING NEW EDITABLE AND DELETABLE ABC ANSWER ON CLICK
    function add_answer_f()
    {

        // LIMIT TO 6 ANSWERS
        if(this.parentElement.children.length == 6)
        {

            this.setAttribute('hidden', '')

        }

        // ADDING OUR NEW DIV
        let new_div = document.createElement('div')
        new_div.style.cssText = 'color: black; border: 1px solid black; border-radius: 5px; width: 32%; height: 50px; overflow: auto;'
        new_div.setAttribute('contenteditable', 'true')
        new_div.classList.add('abc_answer')
        let p_inside_div = document.createElement('p')
        p_inside_div.style.cssText = `font-size: 20px; padding-top: 10px; height: 30px;`
        new_div.appendChild(p_inside_div)
        this.parentElement.insertBefore(new_div, this)

        check_existance(this.parentElement, 'add')

        if(this.parentElement.children.length < 3)
        {

            this.parentElement.parentElement.children[1].classList.remove('text-muted')
            this.parentElement.parentElement.children[1].classList.add('text-danger')
            this.parentElement.parentElement.children[1].classList.add('text-decoration-underline')
            this.parentElement.parentElement.children[1].innerHTML = 'В завданні повинно бути принаймі 2 відповіді'

        }

        check_task()

        // ADDING FUNCTIONS FOR ALL ADDED ANSWERS
        abc_answers = document.querySelectorAll('.abc_answer')
        abc_answers.forEach(answer => {

            answer.addEventListener('mousedown', start_deleting)
            answer.addEventListener('mouseup', stop_deleting)
            answer.addEventListener('keydown', function (e) {
                if (e.keyCode == 8 || e.keyCode == 46)
                {
                    if (answer.children.length === 1) { // last inner element
                        if (answer.children[0].innerText < 1) { // last element is empty
                            e.preventDefault()
                        }
                    }
                }
            })

        });

    }

    // DELETING ELEMENT

    // OUR TIMER
    let timer
    let starting_value
    let deletings
    let deleting1
    let deleting2
    let deleting3
    let deleting4
    let deleting5

    function start_deleting()
    {

        this.style.animation = 'delete 2s 1'

        starting_value = this.children[0].innerText

        this.children[0].style.color = 'black'

        deletings = window.setTimeout(() => {

            deleting1 = window.setTimeout(() => {this.children[0].innerHTML = `Deleting.`}, 0);
            deleting2 = window.setTimeout(() => {this.children[0].innerHTML = `Deleting..`}, 400);
            deleting3 = window.setTimeout(() => {this.children[0].innerHTML = `Deleting...`}, 800);
            deleting4 = window.setTimeout(() => {this.children[0].innerHTML = `Deleting.`}, 1200);
            deleting5 = window.setTimeout(() => {this.children[0].innerHTML = `Deleting..`}, 1300);

        }, 400)

        timer = window.setTimeout(() => {

            if(this.parentElement.children.length == 7)
            {

                this.parentElement.children[6].removeAttribute('hidden')

            }

            // TEMPORARY DADDY
            let tda = this.parentElement.parentElement.parentElement

            // CHECK EXISTANCE AFTER DELETING
            check_existance(this.parentElement, 'del')

            if(this.parentElement.children.length < 4)
            {

                this.parentElement.parentElement.children[1].classList.remove('text-muted')
                this.parentElement.parentElement.children[1].classList.add('text-danger')
                this.parentElement.parentElement.children[1].classList.add('text-decoration-underline')
                this.parentElement.parentElement.children[1].innerHTML = 'В завданні повинно бути принаймі 2 відповіді'

            }

            this.remove()

            check_task()

        }, 2000);

    }

    function stop_deleting()
    {

        this.style.animation = ''

        if(timer)
        {

            window.clearTimeout(timer)

        }
        if(deletings || deleting1 || deleting2 || deleting3 || deleting4 || deleting5)
        {
            window.clearTimeout(deletings)
            window.clearTimeout(deleting1)
            window.clearTimeout(deleting2)
            window.clearTimeout(deleting3)
            window.clearTimeout(deleting4)
            window.clearTimeout(deleting5)

            this.children[0].style.color = 'black'

            if(this.children[0].innerHTML !== starting_value)
            {

                this.children[0].innerHTML = starting_value

                if(starting_value.length > 0)
                {

                    let range = document.createRange()
                    let sel = window.getSelection()
                    range.setStart(this.children[0], 1)
                    range.collapse(true)

                    sel.removeAllRanges()
                    sel.addRange(range)

                }

            }

        }

    }

    // ABC CHOOSE

    function abc_choose_f()
    {
        // SHOWING HINT
        let abc_choose = this
        let abc_choose_hint = this.parentElement.children[1]
        abc_choose_hint.innerHTML = 'нажміть на правильну відповідь'

        // CHECKING IF TEXT IS DANGER
        if(abc_choose_hint.classList.contains('text-danger'))
        {

            abc_choose_hint.classList.remove('text-danger')
            abc_choose_hint.classList.remove('text-decoration-underline')
            abc_choose_hint.classList.add('text-muted')

        }

        // GIVING ALL ANSWERS BORDER AND CLICK EVENT LISTENER
        let abc_task = this.parentElement.parentElement
        let abc_task_answers = abc_task.querySelector('.abc_div').children

        for (let i = 0; i < abc_task_answers.length; i++) {

            if(abc_task_answers[i].classList.contains('abc_answer'))
            {

                abc_task_answers[i].style.border = '1px solid green'
                abc_task_answers[i].style.cursor = 'pointer'
                abc_task_answers[i].removeAttribute('contenteditable')

                abc_task_answers[i].addEventListener('click', make_right)

            }

        }
    }

    // MAKE AN ANSWER RIGHT ONE
    function make_right()
    {

        answers = this.parentElement.children

        for (let a = 0; a < answers.length; a++) {

            if(answers[a].classList.contains('abc_answer'))
            {

                answers[a].style.border = '1px solid black'
                answers[a].style.cursor = ''
                answers[a].setAttribute('contenteditable', 'true')

            }

            if(answers[a].classList.contains('right_one'))
            {

                answers[a].classList.remove('right_one')

            }

            answers[a].removeEventListener('click', make_right)

        }

            this.classList.add('right_one')
            this.style.border = '1px solid green'

            // CHANGING CHOOSE BUTTON`S TEXT
            this.parentElement.parentElement.parentElement.querySelector('.abc_choose').parentElement.children[1].innerHTML = ''

            if(this.parentElement.parentElement.parentElement.querySelector('.abc_choose').children[0].innerText !== 'Змінити правильну відподь')
            {

                this.parentElement.parentElement.parentElement.querySelector('.abc_choose').children[0].innerText = 'Змінити правильну відподь'

            }

            check_task()

    }

    // CHECK IF THERE IS THE ELEMENTS WHICH WE CAN CHOOSE
    function check_existance(parent, type)
    {
        if(type == 'add')
        {

            if(parent.children.length >= 3)
            {

                parent.parentElement.parentElement.querySelector('.abc_choose').removeAttribute('hidden')

            } else
            {

                parent.parentElement.parentElement.querySelector('.abc_choose').setAttribute('hidden', '')

            }

            if(parent.children.length >= 2)
            {

                if(parent.parentElement.children[1].classList.contains('text-danger'))
                {

                    parent.parentElement.children[1].classList.remove('text-danger')
                    parent.parentElement.children[1].classList.remove('text-decoration-underline')
                    parent.parentElement.children[1].classList.add('text-muted')

                }

                parent.parentElement.children[1].innerHTML = 'Щоб видалити одну з відповідей - наведіться на неї і зажміть мишку'

            } else
            {

                parent.parentElement.children[1].innerHTML = ''

            }

        } else
        {

            if(parent.children.length >= 4)
            {

                parent.parentElement.parentElement.querySelector('.abc_choose').removeAttribute('hidden')

            } else
            {

                parent.parentElement.parentElement.querySelector('.abc_choose').setAttribute('hidden', '')

            }

            if(parent.children.length >= 3)
            {

                if(parent.parentElement.children[1].classList.contains('text-danger'))
                {

                    parent.parentElement.children[1].classList.remove('text-danger')
                    parent.parentElement.children[1].classList.remove('text-decoration-underline')
                    parent.parentElement.children[1].classList.add('text-muted')

                }

                parent.parentElement.children[1].innerHTML = 'Щоб видалити одну з відповідей - наведіться на неї і зажміть мишку'

            } else
            {

                parent.parentElement.children[1].innerHTML = ''

            }

        }

    }

    // ABC TASK

    let options = document.querySelector('.options')

    function check_task()
    {

        let parent
        let count = 0

        for (let i = 0; i < document.querySelectorAll('.abc').length; i++) {

            parent = document.querySelectorAll('.abc')[i]
            // MAIN DIVS
            let text = parent.querySelector('.abc_text')
            let answers = parent.querySelector('.abc_div')
            let choose = parent.querySelector('.abc_choose')
            let image = parent.querySelector('.abc_image')
            // https://clubrunner.blob.core.windows.net/00000008038/Images/Action-required.png

            // HINTS
            let text_hint = text.parentElement.children[1]
            let answers_hint = answers.parentElement.children[1]
            let choose_hint = choose.parentElement.children[1]
            let image_hint = image.querySelector('p')

            // START CHECKING IF THERE ISSET DEFAULT ELEMENTS
            if(answers.children.length > 2 && text.children[0].innerText !== 'Додати запитання')
            {

                text_hint.classList.remove('text-muted')
                text_hint.classList.add('text-danger')
                text_hint.classList.add('text-decoration-underline')

                // CHECK IF TEXT`S BEEN CHANGED
                if(text.children[0].innerText == 'Нажміть щоб відредагувати')
                {

                    text_hint.innerText = 'Змініть запитання'

                } else
                {

                    text_hint.innerText = ''

                    // CHECK IF TEXT`S LENGTH IS NOT NULL
                    if(text.children[0].innerText.length < 6)
                    {

                        text_hint.innerText = 'Запитання не може бути таким коротким'

                    } else
                    {

                        text_hint.innerText = ''

                        // CHECK IF THERE IS A RIGHT ANSWER
                        let is = false
                        for (let i = 0; i < answers.children.length; i++) {

                            if(answers.children[i].classList.contains('right_one'))
                            {
                                is = true
                            }

                        }

                        if(!is)
                        {

                            choose_hint.classList.remove('text-muted')
                            choose_hint.classList.add('text-danger')
                            choose_hint.classList.add('text-decoration-underline')
                            choose_hint.innerHTML = 'Ви повинні вибрати правильну відповідь'

                        } else
                        {

                            choose_hint.classList.remove('text-danger')
                            choose_hint.classList.remove('text-decoration-underline')
                            choose_hint.classList.add('text-muted')
                            choose_hint.innerHTML = ''

                            if(image.children.length !== 1)
                            {

                                if(image.children[2].style.backgroundImage == 'url("https://english/storage/icons/empty.jpg")')
                                {

                                    image_hint.innerText = 'Ви повинні вписати працюючий URL-адрес картинки'

                                } else
                                {

                                    count = count + 1

                                }

                            } else
                            {

                                count = count + 1

                            }


                        }

                    }

                }

            }

        }

        if(count == document.querySelectorAll('.abc').length)
        {

            options.removeAttribute('hidden')

        } else
        {

            options.setAttribute('hidden', '')

        }

    }

    function create_task()
    {

        options.setAttribute('hidden', '')
        let number_of_divs = document.querySelectorAll('.abc').length

        // CREATING OUR DIV

        // NEW PARENT
        let parent = document.createElement('div')
        parent.classList.add('abc')
        parent.classList.add('mt-5')
        parent.classList.add('mx-auto')
        parent.style.cssText = 'padding-bottom: 50px; width: 80%; background-color: white;'

        // ABC TEXT

        // ADDING ADD TEXT DIV TO PARENT
        let add_text_div = document.createElement('div')
        add_text_div.style.cssText = 'padding-top: 20px;'

        parent.appendChild(add_text_div)

        // ADDING ABC TEXT DIV TO PARENT DIV
        let abc_text = document.createElement('div')
        abc_text.classList.add('abc_text')
        abc_text.style.cssText = 'max-width: 80%; display: table; margin: 0 auto; background: #D886FF; border: 1px solid #000; border-radius: 10px; color: black;'
        abc_text.setAttribute('role', 'button')

        add_text_div.appendChild(abc_text)

        // ADDING PARAGRAF CHILD TO ABC TEXT DIV
        let abc_text_child = document.createElement('p')
        abc_text_child.style.cssText = 'padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;'
        abc_text_child.innerText = 'Додати запитання'

        abc_text.appendChild(abc_text_child)

        // ADDING ABC HINT TO TEXT DIV
        let abc_text_hint = document.createElement('p')
        abc_text_hint.classList.add('small')
        abc_text_hint.classList.add('text-muted')

        add_text_div.appendChild(abc_text_hint)

        // ABC IMAGE

        // ABC IMAGE DIV
        let abc_image_div = document.createElement('div')
        abc_image_div.classList.add('abc_image')
        abc_image_div.setAttribute('role', 'button')
        abc_image_div.style.cssText = `display: table; margin: 20px auto; margin-top: 30px; background-image: url("${bg_jpg}"); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

        parent.appendChild(abc_image_div)

        // ABC IMAGE PARAGRAPH
        let abc_image_p = document.createElement('p')
        abc_image_p.style.cssText = 'padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;'
        abc_image_p.innerText = 'Додати картинку'

        abc_image_div.appendChild(abc_image_p)

        // ABC ANSWERS

        // ADDING HEADING TO PARENT
        let h2 = document.createElement('h2')
        h2.innerText = 'Додайте варіанти відповіді'
        h2.style.cssText = 'color: black;'

        parent.appendChild(h2)

        // ADDING ADD ANSWERS DIV TO PARENT
        let abc_answers_div = document.createElement('div')

        parent.appendChild(abc_answers_div)

        // ADDING ANSWERS DIV TO PARENT
        let abc_div = document.createElement('div')
        abc_div.classList.add('abc_div')
        abc_div.style.cssText = 'position: relative; display: flex; justify-content: center; column-gap: 5px; row-gap: 10px; flex-wrap: wrap; width: 80%; margin: 0 auto; margin-top: 10px;'

        abc_answers_div.appendChild(abc_div)

        // ADDING ADD ANSWER BUTTON TO ANSWERS DIV
        let add_button = document.createElement('div')
        add_button.classList.add('add_button')
        add_button.classList.add('dashed')
        add_button.style.cssText = 'color: black; width: 32%; height: 50px; border-radius: 5px; user-select: none;'
        add_button.setAttribute('role', 'button')

        abc_div.appendChild(add_button)

        // ADDING PARAGRAF TO ADD ANSWER BUTTON
        let add_button_child = document.createElement('p')
        add_button_child.style.cssText = 'font-size: 20px; padding: 0; margin: 0; margin-top: 9px;'
        add_button_child.innerText = '+'

        add_button.appendChild(add_button_child)

        // ADDING ANSWERS HINT
        let abc_div_hint = document.createElement('p')
        abc_div_hint.classList.add('small')
        abc_div_hint.classList.add('text-muted')

        abc_answers_div.appendChild(abc_div_hint)

        // CHOOSE ANSWER

        // ADD ABC CHOOSE PARENT DIV TO PARENT DIV
        let abc_choose_div = document.createElement('div')

        parent.appendChild(abc_choose_div)

        // ADDING ABC CHOOSE DIV TO ABC CHOOSE PARENT DIV
        let abc_choose = document.createElement('div')
        abc_choose.classList.add('abc_choose')
        abc_choose.style.cssText = 'background-color: rgba(0, 255, 106, 0.521); display: table; margin: 0 auto; margin-top: 30px; border: 1px solid black; border-radius: 10px;'
        abc_choose.setAttribute('role', 'button')
        abc_choose.setAttribute('hidden', '')

        abc_choose_div.appendChild(abc_choose)

        // ADDING ABC CHOOSE DIV CHILD
        let abc_choose_child = document.createElement('p')
        abc_choose_child.style.cssText = 'color: black; padding: 8px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 17px;'
        abc_choose_child.innerText = 'Вибрати правильну відповідь'

        abc_choose.appendChild(abc_choose_child)

        // ADDING ABC CHOOSE HINT
        let abc_choose_hint = document.createElement('p')
        abc_choose_hint.classList.add('small')
        abc_choose_hint.classList.add('text-muted')

        abc_choose_div.appendChild(abc_choose_hint)

        container.insertBefore(parent, options)

        // ADDING FUNCTIONS
        abc_text.addEventListener('click', change)
        abc_image_div.addEventListener('click', add_image_f)
        add_button.addEventListener('click', add_answer_f)
        abc_choose.addEventListener('click', abc_choose_f)

    }

    // CREATING FIRST DEFAULT TASK
    create_task()

    // ADD NEW TASK
    let task_add = document.querySelector('.task_add')

    task_add.addEventListener('click', create_task)

    // FINISH EDITING TASKS
    let task_finish = document.querySelector('.task_finish')

    task_finish.addEventListener('click', function () {

        // REMOVE SOME ATTRIBUTES AND ELEMENTS
        window.setTimeout(() => {

            // ADD / EDIT TEXT
            for (let i = 0; i < document.querySelectorAll('.abc_text').length; i++) {

                document.querySelectorAll('.abc_text')[i].removeEventListener('click', change)
                document.querySelectorAll('.abc_text')[i].removeAttribute('contenteditable')
                document.querySelectorAll('.abc_text')[i].removeAttribute('role')

            }

            // ADD IMAGE / EDIT IMAGE
            let ai = document.querySelectorAll('.abc_image')
            for (let i = 0; i < ai.length; i++) {

                if(ai[i].children.length == 1)
                {

                    ai[i].setAttribute('hidden', '')

                } else
                {

                    ai[i].querySelector('input').setAttribute('hidden', '')

                }

            }

            // ADD ANSWER BUTTON
            let ab = document.querySelectorAll('.add_button')
            for (let i = 0; i < ab.length; i++) {

                ab[i].removeEventListener('click', add_answer_f)
                ab[i].parentElement.parentElement.parentElement.querySelector('h2').remove()
                ab[i].parentElement.parentElement.children[1].remove()
                ab[i].remove()

            }

            // EDITING ANSWERS
            let as = document.querySelectorAll('.abc_answer')
            for (let i = 0; i < as.length; i++) {

                as[i].removeAttribute('contenteditable')
                as[i].removeEventListener('mousedown', start_deleting)
                as[i].removeEventListener('mouseup', stop_deleting)

            }

            // CHANGING / PICKING RIGHT ANSWER
            let ac = document.querySelectorAll('.abc_choose')
            for (let i = 0; i < ac.length; i++) {

                ac[i].removeEventListener('click', abc_choose_f)
                ac[i].remove()

            }

        }, 0);

        options.setAttribute('hidden', '')
        document.querySelector('.task_create').removeAttribute('hidden')

    })

    // CREATING ACTUAL TASK

    let task_create = document.querySelector('.task_create')

    task_create.addEventListener('click', function () {

        // CREATING TASK BODY
        let abcs = document.querySelectorAll('.abc')
        let body = ''

        abcs.forEach(adiv => {

            // START OF MAIN DIV
            body += `<div class="abc_task">`

            // ADDING QUESTION
            let txt = adiv.querySelector('.abc_text').innerText
            body += `<h3 class="text-center">${txt}</h3>`

            if(adiv.querySelector('.abc_image').children.length !== 1)
            {

                let immg = adiv.querySelector('.abc_image').querySelector('input').value
                body += `<div style="width: 550px; height: 320px; margin: 15px auto; background-image: url('${immg}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>`

            }

            // ADDING ANSWERS
            body += `<div class="abc_answers">`
            let answers = adiv.querySelectorAll('.abc_answer')
            let abcdef = ['A', 'B', 'C', 'D', 'E', 'F']

            for (let i = 0; i < answers.length; i++) {

                if(answers[i].classList.contains('right_one'))
                {

                    body += `
                        <div class="abc_ans right">

                            <div style="text-align: center; display: table; width: 60px; border-right: 1px solid black;">
                                <h2>${abcdef[i]}</h2>
                            </div>

                            <div style="display: table;">
                                <h4>${answers[i].innerText}</h4>
                            </div>

                        </div>
                    `

                } else
                {

                    body += `
                        <div class="abc_ans">

                            <div style="text-align: center; display: table; width: 60px; border-right: 1px solid black;">
                                <h2>${abcdef[i]}</h2>
                            </div>

                            <div style="display: table;">
                                <h4>${answers[i].innerText}</h4>
                            </div>

                        </div>
                    `

                }

            }

            // FINISHING ANSWERS
            body += `</div>`

            // FINISHING TASK
            body += `</div>`

            let task_body = document.querySelector('.task_body')
            task_body.value = body
            submitik = document.createElement('button')
            submitik.setAttribute('type', 'submit')
            document.querySelector('.hidden').appendChild(submitik)
            submitik.click()

        });

    })

</script>

{{-- STARTING SCRIPT --}}
{{-- <script>

    let container = document.querySelector('#container')

    let task_name = document.querySelector('.task_name')
    task_name.addEventListener('keyup', function () {
        check_name_type()
    })

    let task_type = document.querySelector('.task_type')
    task_type.addEventListener('change', function () {
        check_name_type()
    })

    let go = document.querySelector('.go')
    go.addEventListener('click', function () {
        if(task_type.value == 1)
        {
            container.innerHTML = `
                <a href="{{ route('lesson.show', [$course, $lesson]) }}">{{ __('main.back') }}</a>

                <h1 style="margin: 30px 0;">${task_name.value}</h1>

                <div class="translate">

                    <p style="font-size: 25px; padding-top: 20px; padding-bottom: 0; margin-bottom: 0;">Додайте слова до перекладу</p>
                    <p class="deleting_hint small text-muted p-0 m-0">Для видалення одного з перекладів зажміть його</p>

                    <div class="add_translation" role="button" style="user-select: none; display: table; width: 250px; margin: 0 auto; overflow: hidden; margin-top: 20px; height: 40px; border: 1px solid black; border-radius: 10px;">

                        <p style="display: table-cell; vertical-align: middle; overflow: hidden;">+</p>

                    </div>

                    <p class="adding_hint small text-muted p-0 m-0">

                        Клацніть на цю кнопочку щоб добавити ще один переклад

                    </p>

                </div>

                <div class="finish mt-5" role="button" hidden>
                    <p style="background-color: rgb(158, 255, 103); user-select: none; font-family: 'Inter', sans-serif; display: inline; padding: 10px 20px; border: 1px solid black; border-radius: 10px;">
                        Створити завдання
                    </p>
                </div>

                <div hidden>
                    <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                    <input class="task_body" type="text" name="task_body">
                    <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                    <input class="task_type" value="${task_type.value}" type="text" name="task_type">
                    <button class="task_submit" type="submit">asd</button>
                </div>
            `
            let scriptTranslation = document.createElement("script");
            scriptTranslation.setAttribute("src", `{{ asset('storage/js/translate/main.js') }}`);
            document.body.appendChild(scriptTranslation);
        } else if(task_type.value == 2)
        {
            container.innerHTML = `
                <a href="{{ route('lesson.show', [$course, $lesson]) }}">${tr_back}</a>

                <h1 class="py-3">${task_name.value}</h1>

                <div class="overview w-100" style="padding-bottom: 100px; border:1px solid black; border-radius:20px;">
                    <div class="my-3 border bg-success bg-gradient" id="add_answers" role="button">
                        <h2 class="mt-2">${tr_add_answers_to_insert}</h2>
                    </div>
                    <div class="next_section">
                        <div hidden class="bg-primary bg-gradient text-light mx-auto next border" role="button" style="width: 30%; border-radius: 10px; user-select: none;">
                            <h5 class="py-2" >${tr_go_to_the_next_step}</h5>
                        </div>
                    </div>
                </div>

                <div hidden>
                        <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                        <input class="task_body" type="text" name="task_body">
                        <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                        <input class="task_type" value="${task_type.value}" type="text" name="task_type">
                        <button class="task_submit" type="submit">asd</button>
                </div>
            `
            let scriptFillGaps = document.createElement("script")
            scriptFillGaps.setAttribute("src", scriptFillGapss)
            document.body.appendChild(scriptFillGaps)
        } else if(task_type.value == 3)
        {
            container.innerHTML = `
            <a href="{{ route('lesson.show', [$course, $lesson]) }}">${tr_back}</a>

            <h1 class="py-3">${task_name.value}</h1>

            <div class="overview w-100" style="padding-bottom: 100px; border:1px solid black; border-radius:20px;">

                <div class="add_text my-3 mx-auto bg-primary bg-gradient border text-light" style="overflow: hidden; user-select: none; border-radius: 15px; width: 80%;">
                    <h2 class="mt-1">{{ __('main.add_text_q') }}</h2>
                    <div class="d-flex w-50 mx-auto pb-2">
                        <div class="yes bg-priramy border text-light" role="button" style="width: 45%; border-radius: 15px; margin-right: 10%;">
                            <h4 class="mt-1">{{ __('main.yes') }}</h4>
                        </div>
                        <div class="no bg-priramy border text-light" role="button" style="width: 45%; border-radius: 15px;">
                            <h4 class="mt-1">{{ __('main.no') }}</h4>
                        </div>
                    </div>
                </div>

                <div class="bg-success bg-gradient mx-auto next mt-3 border text-light" role="button" hidden style="width: 30%; border-radius: 10px; user-select: none;">
                    <h5 class="py-2" >${tr_go_to_the_next_step}</h5>
                </div>
            </div>

            <div hidden>
                <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                <input class="task_body" type="text" name="task_body">
                <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                <input class="task_type" value="${task_type.value}" type="text" name="task_type">
                <button class="task_submit" type="submit">asd</button>
            </div>
            `
            let scriptIFillGaps = document.createElement("script")
            scriptIFillGaps.setAttribute("src", "{{ asset('storage/js/iFillGaps/addText.js') }}")
            document.body.appendChild(scriptIFillGaps)
        } else if(task_type.value == 4)
        {
            container.innerHTML = `
                <a href="{{ route('lesson.show', [$course, $lesson]) }}">${tr_back}</a>

                <h1 class="py-3">${task_name.value}</h1>

                <div class="options" hidden style="padding-bottom: 200px;">

                    <div class="task_add mt-5" style="background-color: white; width: 80%; margin: 0 auto; user-select: none; color: green;" role="button">

                        <h1 style="padding: 20px; padding-bottom: 25px;">
                            +
                        </h1>

                    </div>

                    <p style="padding-top: 5px;">АБО</p>

                    <div class="task_finish" style="color: white; display: table; margin: 0 auto; position: relative; background: #FF3232; border: 1px solid #000; border-radius: 10px;" role="button">

                        <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">
                            Завершити редактування
                        </p>

                    </div>

                </div>

                <div class="task_create mt-5" hidden style="color: black; display: table; margin: 0 auto; position: relative; background: #0aca03; border: 1px solid #000; border-radius: 10px;" role="button">

                    <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">
                        Створити завдання
                    </p>

                </div>


                <div hidden class="hidden">
                    <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                    <input class="task_body" type="text" name="task_body">
                    <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                    <input class="task_type" value="${task_type.value}" type="text" name="task_type">
                </div>
            `
            let scriptABC = document.createElement("script")
            scriptABC.setAttribute("src", "{{ asset('storage/js/ABC/main.js') }}")
            document.body.appendChild(scriptABC)
        } else if(task_type.value == 5)
        {
            container.innerHTML = `
            <a href="{{ route('lesson.show', [$course, $lesson]) }}">${tr_back}</a>

            <h1 class="py-3">${task_name.value}</h1>

            <textarea name="task_body" style="height: 500px;">

            </textarea>

            <div hidden>
                <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                <input class="task_type" value="${task_type.value}" type="text" name="task_type">
            </div>

            <button class="btn btn-primary mt-2">{{ __('main.create_a_task') }}</button>
            `

            if(dark_mode_input.checked)
            {
                tinymce.init({
                    selector: 'textarea',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                    skin: 'oxide-dark',
                    content_css: 'dark'
                });
            } else
            {
                tinymce.init({
                    selector: 'textarea',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                });
            }
        }
    })

</script> --}}

@endsection
