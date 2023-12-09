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
                        <h3>{{ __('main.create_task') }}</h3>
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

        <a href="{{ route('lesson.show', [$course, $lesson]) }}">{{ __('main.back') }}</a>

        <h1 style="margin: 30px 0;">${task_name.value}</h1>

        <div class="translate">

            <div style="padding-top: 30px;">

                <div class="add_text" role="button" style="max-width: 80%; display: table; margin: 0 auto; background-color:rgb(130, 255, 132); margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;">

                    <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">Додати текст</p>

                </div>

                <p class="add_text_hint small text-muted m-0 p-0"></p>

            </div>

            <div style="padding-top: 30px;">

                <div class="add_image" role="button" style="display: table; margin: 0 auto; background-image: url('{{ asset('storage/icons/bg.jpg') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;">

                    <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">${tr_add_image}</p>

                </div>

            </div>

            <p style="font-size: 25px; padding-top: 20px; padding-bottom: 0; margin-bottom: 0;">${tr_add_words_for_translation}</p>
            <p class="deleting_hint small text-muted p-0 m-0">${tr_to_delete_one_of_the_translations_press_it}</p>

            <div class="add_translation" role="button" style="user-select: none; display: table; width: 250px; margin: 0 auto; overflow: hidden; margin-top: 20px; height: 40px; border: 1px solid black; border-radius: 10px;">

                <p style="display: table-cell; vertical-align: middle; overflow: hidden;">+</p>

            </div>

            <p class="adding_hint small text-muted p-0 m-0">

                ${tr_click_this_button_to_add_another_translation}

            </p>

        </div>

        <div class="finish mt-5" role="button" hidden>
            <p style="color: black; background-color: rgb(158, 255, 103); user-select: none; font-family: 'Inter', sans-serif; display: inline; padding: 10px 20px; border: 1px solid black; border-radius: 10px;">
                ${tr_create_task}
            </p>
        </div>

        <div hidden>
            <input class="task_name" value="${task_name.value}" type="text" name="task_name">
            <input class="task_body" type="text" name="task_body">
            <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
            <input class="task_type" value="${task_type.value}" type="text" name="task_type">
            <button class="task_submit" type="submit">asd</button>
        </div>

    </div>

</x-form>

{{-- VARIABLES + NEEDED FUNCTIONS --}}
<script>
    let tr_add_word_translations = `{{ __('main.add_word_translations') }}`
    let tr_i_advise_you_to_paste_the_answers_after_filling_in_the_text_completely_to_avoid_problems = `{!! __('main.i_advise_you_to_paste_the_answers_after_filling_in_the_text_completely_to_avoid_problems') !!}`
    let tr_make_highlighted_answer = `{{ __('main.make_highlighted_answer') }}`
    let tr_in_this_task_you_need_to_write_the_text_and_highlight_the_word_that_you_will_need_to_insert_the_answer_in_its_place = `{{ __('main.in_this_task_you_need_to_write_the_text_and_highlight_the_word_that_you_will_need_to_insert_the_answer_in_its_place') }}`
    let tr_we_advise_you_to_paste_the_answers_after_filling_in_the_text_to_avoid_problems = `{{ __('main.we_advise_you_to_paste_the_answers_after_filling_in_the_text_to_avoid_problems') }}`
    let tr_some_text = `{{ __('main.some_text') }}`
    let tr_delete_answer = `{{ __('main.delete_answer') }}`
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
    let tr_add_image = `{{ __('main.add_image') }}`
    let tr_add_words_for_translation = `{{ __('main.add_words_for_translation') }}`
    let tr_to_delete_one_of_the_translations_press_it = `{{ __('main.to_delete_one_of_the_translations_press_it') }}`
    let tr_click_this_button_to_add_another_translation = `{{ __('main.click_this_button_to_add_another_translation') }}`
    let tr_create_task = `{{ __('main.create_task') }}`
    let tr_translate_you = `{{ __('main.translate_you') }}`
    let tr_drag_and_drop_translations_into_the_relevant_cells = `{{ __('main.drag_and_drop_translations_into_the_relevant_cells') }}`
    let tr_to_add_another_translation_you_must_change_the_text_of_the_word_or_translation = `{{ __('main.to_add_another_translation_you_must_change_the_text_of_the_word_or_translation') }}`
    let tr_both_word_and_translation_must_be_filled_in = `{{ __('main.both_word_and_translation_must_be_filled_in') }}`
    let tr_enter_url_of_the_picture_or_delete_the_picture_by_clicking_this = `{{ __('main.enter_url_of_the_picture_or_delete_the_picture_by_clicking_this') }}`
    let tr_select_picture_from_your_computer_or_delete_picture_clicking_this = `{{ __('main.select_picture_from_your_computer_or_delete_picture_clicking_this') }}`
    let tr_buttonchik = `{{ __('main.buttonchik') }}`
    let tr_to_delete_picture_click_this = `{{ __('main.to_delete_picture_click_this') }}`
    let tr_paste_the_correct_url = `{{ __('main.paste_the_correct_url') }}`
    let tr_upload_from_computer = `{{ __('main.upload_from_computer') }}`
    let tr_upload_from_internet = `{{ __('main.upload_from_internet') }}`
    let tr_paste_image_url = `{{ __('main.paste_image_url') }}`
    let tr_in_this_task_you_need_to_write = `{{ __('main.in_this_task_you_need_to_write') }}`
    let tr_we_recommend_inserting_answers_after = `{{ __('main.we_recommend_inserting_answers_after') }}`
    let tr_in_this_task_you_need_3_places = `{{ __('main.in_this_task_you_need_3_places') }}`
    let tr_read_more_here = `{{ __('main.read_more_here') }}`
    let tr_write_text_here = `{{ __('main.write_text_here') }}`
    let tr_in_this_task_you_need_to_second = `{{ __('main.in_this_task_you_need_to_second') }}`
    let tr_in_this_task_you_need_3_second = `{{ __('main.in_this_task_you_need_3_second') }}`

    let tr_add_video_from_youtube = `{{ __('main.add_video_from_youtube') }}`
    let tr_or = `{{ __('main.or') }}`
    let tr_to_delete_video_click_this = `{{ __('main.to_delete_video_click_this') }}`
    let tr_paste_link_from_youtube_or = `{{ __('main.paste_link_from_youtube_or') }}`
    let tr_delete_b = `{{ __('main.delete_b') }}`
    let tr_paste_link_from_youtube = `{{ __('main.paste_link_from_youtube') }}`
    let tr_click_to_edit = `{{ __('main.click_to_edit') }}`
    let tr_change_the_question = `{{ __('main.change_the_question') }}`
    let tr_the_task_must_contain_2_answers = `{{ __('main.the_task_must_contain_2_answers') }}`
    let tr_click_on_the_correct_answer = `{{ __('main.click_on_the_correct_answer') }}`
    let tr_change_right_answer = `{{ __('main.change_right_answer') }}`
    let tr_to_delete_one_of_answers_hover_and_click = `{{ __('main.to_delete_one_of_answers_hover_and_click') }}`
    let tr_add_question = `{{ __('main.add_question') }}`
    let tr_change_question = `{{ __('main.change_question') }}`
    let tr_question_cannot_be_short = `{{ __('main.question_cannot_be_short') }}`
    let tr_you_must_choose_the_correct_answer = `{{ __('main.you_must_choose_the_correct_answer') }}`
    let tr_add_answer_options = `{{ __('main.add_answer_options') }}`
    let tr_choose_correct_answer = `{{ __('main.choose_correct_answer') }}`
    let tr_review_before_completing_the_task = `{{ __('main.review_before_completing_the_task') }}`

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

let finish = document.querySelector('.finish')
let deletes

finish.parentElement.style.paddingBottom = '200px'

finish.addEventListener('click', function () {

    let trs = document.querySelectorAll(".tr")
    let translations = document.querySelectorAll(".translation")
    let body = ''

    // PARENT DIV
    body += `<div style="font-family: 'Inter', sans-serif;">`

    // IMAGE IF ISSET
    if(document.querySelector('.add_image').children.length !== 1)
    {

        if(document.querySelector('.add_image').children[0].classList.contains('text-center'))
        {

            let immg = document.querySelector('.add_image').querySelector('input').value
            body += `<div style="width: 550px; height: 320px; margin: 15px auto; background-image: url('${immg}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>`

        } else
        {

            let name_value = document.querySelector('.add_image').querySelector('input').attributes.name.value
            let name_length = name_value.length
            if(name_length == 9)
            {

                let num = name_value.slice(name_length-2, name_length-1)
                body += `<div style="width: 550px; height: 320px; margin: 15px auto; background-image: url('change${num}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>`

            } else
            {

                let num = name_value.slice(name_length-3, name_length-1)
                body += `<div style="width: 550px; height: 320px; margin: 15px auto; background-image: url('change${num}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>`

            }

        }

    }

    // ANSWERS DIV
    body += `<div class="answers_div border">`

    // ANSWERS HEADER + HINT
    body += `<h2 class="m-0 p-0" style="color: black;">${tr_translate_you}</h2>`
    body += `<p class="answers_hint small text-muted m-0 p-0">${tr_drag_and_drop_translations_into_the_relevant_cells}</p>`

    // ANSWERS
    body += `<div class="mt-3">`

    body += `<div class="answers">`

    let to_shuffle = []

    translations.forEach(translation => {

        to_shuffle.push(translation.innerText)

    })

    shuffled_translations = shuffle(to_shuffle)

    shuffled_translations.forEach(shuffled_translation => {

        body += `<p class="answer">${shuffled_translation}</p>`

    });

    body += `</div>`

    body += `</div>`

    // CLOSING ANSWERS DIV
    body += `</div>`

    // INPUTS DIV
    body += `<div class="inputs_div">`


    // TABLE WITH WORDS AND INPUTS
    body += `<table>`
    body += `<tr>`
    body += `<td style="font-size: 25px;">${tr_word}</td>`
    body += `<td style="font-size: 25px;">${tr_translation}</td>`
    body += `</tr>`

    trs.forEach(tr => {

        let word = tr.querySelector('.word')
        let input = tr.querySelector('.translation')

        body += `<tr>`
        body += `<td class="word">${word.innerText}</td>`
        body += `<td>`
        body += `<label class="input" answer="${input.innerText}"></label>`
        body += `</td>`
        body += `</tr>`

    });

    body += `</table>`

    body += `</div>`
    // CLOSING INPUTS DIV

    // CLOSING PARENT DIV
    body += `</div>`

    document.querySelector('.task_body').value = body
    document.querySelector('.task_submit').click()

})

function check_task()
{

    let translations = document.querySelectorAll('.tr')
    let count = 0
    let hint = document.querySelector('.adding_hint')

    translations.forEach(parent => {

        let word = parent.querySelector('.word').children[0]
        let translation = parent.querySelector('.translation').children[0]
        let add_translation = document.querySelector('.add_translation')

        if(word.innerText == tr_word || translation.innerText == tr_translation || word.innerText.length <= 1 || translation.innerText.length <= 1)
        {

            if(word.innerText == tr_word || translation.innerText == tr_translation)
            {

                if(word.innerText == tr_word)
                {

                    word.parentElement.style.border = `1px solid red`

                } else
                {

                    word.parentElement.style.border = `1px solid black`

                }

                if(translation.innerText == tr_translation)
                {

                    translation.parentElement.style.border = `1px solid red`

                } else
                {

                    translation.parentElement.style.border = `1px solid black`

                }

                hint.classList.remove('text-muted')
                hint.classList.add('text-danger')
                hint.innerText = tr_to_add_another_translation_you_must_change_the_text_of_the_word_or_translation

                add_translation.removeEventListener('click', add_translation_f)
                add_translation.removeAttribute('role')

            } else
            {

                if(word.innerText.length <= 1)
                {

                    word.parentElement.style.border = `1px solid red`

                } else
                {

                    word.parentElement.style.border = `1px solid black`

                }

                if(translation.innerText.length <= 1)
                {

                    translation.parentElement.style.border = `1px solid red`

                } else
                {

                    translation.parentElement.style.border = `1px solid black`

                }

                hint.classList.remove('text-muted')
                hint.classList.add('text-danger')
                hint.innerText = tr_both_word_and_translation_must_be_filled_in

                add_translation.removeEventListener('click', add_translation_f)
                add_translation.removeAttribute('role')

            }

        } else
        {

            word.parentElement.style.border = '1px solid black';
            translation.parentElement.style.border = '1px solid black';

            count = count + 1

        }


    });

    if(translations.length == 0)
    {

        add_translation.addEventListener('click', add_translation_f)
        add_translation.setAttribute('role', 'button')

        hint.innerText = tr_click_this_button_to_add_another_translation
        hint.classList.remove('text-danger')
        hint.classList.add('text-muted')

        count = 0

    }

    let image = document.querySelector('.add_image')
    let image_hint = image.querySelector('p')
    let image_good = false
    let image_has = false

    // CHECK IF IMAGE ISSET AND FILLED
    if(image.children.length !== 1 && image.children.length !== 2)
    {

        if(image.children[2].style.backgroundImage == 'url("https://english/storage/icons/empty.jpg")')
        {

            image_has = true

            if(image.children.length == 4)
            {

                image_hint.innerHTML = `${tr_enter_url_of_the_picture_or_delete_the_picture_by_clicking_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`
                deletes = document.querySelectorAll('.image_delete')

                deletes.forEach(deletee => {
                    deletee.addEventListener('click', image_delete_f)
                });

            } else
            {

                image_hint.innerHTML = `${tr_select_picture_from_your_computer_or_delete_picture_clicking_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`
                deletes = document.querySelectorAll('.image_delete')

                deletes.forEach(deletee => {
                    deletee.addEventListener('click', image_delete_f)
                });

            }

        } else
        {

            image_hint.innerHTML = `${tr_to_delete_picture_click_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`
            deletes = document.querySelectorAll('.image_delete')

            deletes.forEach(deletee => {
                deletee.addEventListener('click', image_delete_f)
            });

            image_good = true

        }

    } else
    {

        image_has = false

    }

    if(count == translations.length)
    {

        hint.classList.add('text-muted')
        hint.classList.remove('text-danger')
        hint.innerText = `${tr_click_this_button_to_add_another_translation}`

        add_translation.addEventListener('click', add_translation_f)
        add_translation.setAttribute('role', 'button')

        if(image_has)
        {

            if(image_good && translations.length >= 2)
            {

                finish.removeAttribute('hidden')

            } else
            {

                finish.setAttribute('hidden', '')

            }

        } else
        {

            if(translations.length >= 2)
            {

                finish.removeAttribute('hidden')

            } else
            {

                finish.setAttribute('hidden', '')

            }

        }


    } else
    {

        finish.setAttribute('hidden', '')

    }

}

function url_image_edit_f()
{

    let img = this.parentElement.querySelector('.img')
    let test_img = this.parentElement.querySelector('img')
    let hint = this.parentElement.querySelector('p')
    let dis = this

    if(this.value.length >= 10)
    {

        if(this.value.includes('jpg') || this.value.includes('jpeg') || this.value.includes('png') || this.value.includes('webp') || this.value.includes('avif') || this.value.includes('gif') || this.value.includes('svg'))
        {

            console.log('asd')

            test_img.src = dis.value
            test_img.onload = function () {

                dis.setAttribute('status', 1)
                img.style.cssText = `margin: 0 auto; width: 450px; height: 250px; background-image: url('${dis.value}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
                hint.innerHTML = `${tr_to_delete_picture_click_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`

                deletes = document.querySelectorAll('.image_delete')

                deletes.forEach(deletee => {

                    deletee.addEventListener('click', image_delete_f)

                });

                check_task()

            }
            test_img.onerror = function () {

                img.style.cssText = `margin: 0 auto; width: 450px; height: 250px; background-image: url('${empty_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
                dis.value = ''
                dis.setAttribute('placeholder', tr_paste_the_correct_url)
                dis.setAttribute('status', 2)

                check_task()

            }

        } else
        {

            img.style.cssText = `margin: 0 auto; width: 450px; height: 250px; background-image: url('${empty_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
            dis.value = ''
            dis.setAttribute('placeholder', tr_paste_the_correct_url)
            dis.setAttribute('status', 2)

        }


    }

}

function upload_image_edit_f()
{

    const [file] = this.files
    if (file) {

        let url = URL.createObjectURL(file)

        this.parentElement.children[2].style.backgroundImage = `url('${url}')`

    }

    check_task()

}

function add_image_f()
{

    this.classList.add('d-flex')
    this.classList.add('justify-content-center')
    this.style.cssText = `gap: 20px;`

    this.children[0].remove()

    // ADD IMAGE UPLOAD DIV
    let image_upload = document.createElement('div')
    image_upload.setAttribute('role', 'button')
    image_upload.style.cssText = `display: table; background-image: url('${bg_image_upload}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

    this.appendChild(image_upload)

    let image_upload_p = document.createElement('p')
    image_upload_p.style.cssText = `padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
    image_upload_p.innerText = tr_upload_from_computer

    image_upload.appendChild(image_upload_p)

    // ADD IMAGE URL DIV
    let image_url = document.createElement('div')
    image_url.setAttribute('role', 'button')
    image_url.style.cssText = `display: table; background-image: url('${bg_image_url}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

    this.appendChild(image_url)

    let image_url_p = document.createElement('p')
    image_url_p.style.cssText = `padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
    image_url_p.innerText = tr_upload_from_internet

    image_url.appendChild(image_url_p)

    this.removeEventListener('click', add_image_f)

    image_url.addEventListener('click', add_url_image_f)
    image_upload.addEventListener('click', add_upload_image_f)

    check_task()

}

function image_delete_f()
{

    let parent = this.parentElement.parentElement

    if(parent.children.length == 3)
    {

        parent.children[0].remove()
        parent.children[0].remove()
        parent.children[0].remove()

    } else
    {

        parent.children[0].remove()
        parent.children[0].remove()
        parent.children[0].remove()
        parent.children[0].remove()

    }

    parent.setAttribute('role', 'button')
    parent.style.cssText = `display: table; margin: 0 auto; background-image: url("${bg_jpg}"); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

    // ABC IMAGE PARAGRAPH
    let abc_image_p = document.createElement('p')
    abc_image_p.style.cssText = 'padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;'
    abc_image_p.innerText = tr_add_image

    parent.appendChild(abc_image_p)

    window.setTimeout(function () {parent.addEventListener('click', add_image_f)}, 500)

    check_task()

}

function add_upload_image_f()
{

    let parent = this.parentElement

    parent.children[0].remove()
    parent.children[0].remove()

    parent.removeAttribute('role')
    parent.classList.remove('d-flex')
    parent.classList.remove('justify-content-center')
    parent.style.cssText = `display: table; margin: 0 auto; border-radius: 10px; color: black;`

    let number_of_abcs = document.querySelectorAll('.abc').length

    let image_input = document.createElement('input')
    image_input.classList.add('form-control')
    image_input.setAttribute('name', `upload[${number_of_abcs}]`)
    image_input.setAttribute('accept', 'image/*')
    image_input.setAttribute('type', 'file')

    parent.appendChild(image_input)

    let image_hint = document.createElement('p')
    image_hint.classList.add('small')
    image_hint.classList.add('text-muted')
    image_hint.classList.add('p-0')
    image_hint.classList.add('m-0')
    image_hint.innerHTML = `${tr_to_delete_picture_click_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`

    parent.appendChild(image_hint)

    let image_preview = document.createElement('div')
    image_preview.classList.add('img')
    image_preview.style.cssText = `margin: 0 auto; background-image: url('${empty_jpg}'); background-position: center; background-size: cover; background-repeat: no-repeat; width: 450px; height: 250px;`

    parent.appendChild(image_preview)

    image_input.addEventListener('change', upload_image_edit_f)

    check_task()

    deletes = document.querySelectorAll('.image_delete')

    deletes.forEach(deletee => {

        deletee.addEventListener('click', image_delete_f)

    });

}

function add_url_image_f()
{

    let parent = this.parentElement
    parent.children[0].remove()
    parent.children[0].remove()
    parent.classList.remove('justify-content-center')
    parent.classList.remove('d-flex')
    parent.style.cssText = `display: table; margin: 0 auto; border-radius: 10px; color: black;`

    let add_image_input = document.createElement('input')
    add_image_input.classList.add('form-control')
    add_image_input.classList.add('text-center')
    add_image_input.style.cssText = 'font-size: 20px; padding: 10px 20px;'
    add_image_input.setAttribute('placeholder', tr_paste_image_url)

    add_image_input.focus()

    parent.appendChild(add_image_input)

    let add_image_hint = document.createElement('p')
    add_image_hint.classList.add('small')
    add_image_hint.classList.add('text-muted')
    add_image_hint.classList.add('p-0')
    add_image_hint.classList.add('m-0')
    add_image_hint.innerHTML = `${tr_to_delete_picture_click_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`

    parent.appendChild(add_image_hint)

    let add_image_image = document.createElement('div')
    add_image_image.classList.add('img')
    add_image_image.style.cssText = `margin: 0 auto; width: 450px; height: 250px; background-image: url("${empty_jpg}"); background-position: center; background-size: cover; background-repeat: no-repeat;`

    parent.appendChild(add_image_image)

    let add_image_test = document.createElement('img')
    add_image_test.style.cssText = 'display: none;'

    parent.appendChild(add_image_test)

    add_image_input.addEventListener('keyup', url_image_edit_f)

    check_task()

    deletes = document.querySelectorAll('.image_delete')

    deletes.forEach(deletee => {

        deletee.addEventListener('click', image_delete_f)

    });

}

let add_image = document.querySelector('.add_image')
add_image.addEventListener('click', add_image_f)

let add_text = document.querySelector('.add_text')
let add_text_hint = document.querySelector('.add_text_hint')

add_text.addEventListener('click', add_text_f)

function add_text_f()
{

    this.style.backgroundColor = ''
    this.style.color = ''
    this.setAttribute('contenteditable', 'true')
    this.removeAttribute('role')
    this.children[0].innerText = `Нажмiть щоб вiдредагувати`

    add_image.parentElement.style.paddingTop = '20px'
    add_text_hint.innerHTML = `Для того щоб видалити додатковий текст нажмiть цю <span style="cursor: pointer; text-decoration: underline;" class="add_text_delete text-danger"><b>КНОПОЧКУ</b></span>`

    document.querySelector('.add_text_delete').addEventListener('click', delete_text_f)
    
    this.addEventListener('keydown', prevent_deleting)

    this.removeEventListener('click', add_text_f)

}

function delete_text_f()
{

    add_text_hint.innerHTML = ''

    add_text.style.backgroundColor = `rgb(130, 255, 132)`
    add_text.style.color = 'black'
    add_text.setAttribute('role', 'button')
    add_text.removeAttribute('contenteditable')

    add_text.children[0].innerText = `Додати текст`

    add_image.parentElement.style.paddingTop = '30px'

    add_text.addEventListener('click', add_text_f)

}

function prevent_deleting(e)
{

    if (e.keyCode == 8 || e.keyCode == 46)
    {
        if (this.children.length === 1) { // last inner element
            if (this.children[0].innerText < 1) { // last element is empty
                e.preventDefault()
            }
        }
    }

}

// DELETING

let timer
let word_value
let translation_value
let deletings
let word1
let word2
let word3
let word4
let word5
let translation1
let translation2
let translation3
let translation4
let translation5

function start_deleting()
{

    let word = this.querySelector('.word')
    let translation = this.querySelector('.translation')

    word_value = word.children[0].innerText
    translation_value = translation.children[0].innerText

    word.style.animation = 'delete 2s 1'
    translation.style.animation = 'delete 2s 1'

    deletings = window.setTimeout(() => {

        word1 = window.setTimeout(() => {word.children[0].innerHTML = `Deleting.`}, 0);
        word2 = window.setTimeout(() => {word.children[0].innerHTML = `Deleting..`}, 400);
        word3 = window.setTimeout(() => {word.children[0].innerHTML = `Deleting...`}, 800);
        word4 = window.setTimeout(() => {word.children[0].innerHTML = `Deleting.`}, 1200);
        word5 = window.setTimeout(() => {word.children[0].innerHTML = `Deleting..`}, 1300);

        translation1 = window.setTimeout(() => {translation.children[0].innerHTML = `Deleting.`}, 0);
        translation2 = window.setTimeout(() => {translation.children[0].innerHTML = `Deleting..`}, 400);
        translation3 = window.setTimeout(() => {translation.children[0].innerHTML = `Deleting...`}, 800);
        translation4 = window.setTimeout(() => {translation.children[0].innerHTML = `Deleting.`}, 1200);
        translation5 = window.setTimeout(() => {translation.children[0].innerHTML = `Deleting..`}, 1300);

    }, 400)

    timer = window.setTimeout(() => {

        this.remove()

        check_task()

    }, 2000);

}

function stop_deleting()
{

    this.querySelector('.translation').style.animation = ''
    this.querySelector('.word').style.animation = ''

    if(timer)
    {

        window.clearTimeout(timer)

    }

    if(deletings || word1 || word2 || word3 || word4 || word5 || translation1 || translation2 || translation3 || translation4 || translation5)
    {

        let word = this.querySelector('.word')
        let translation = this.querySelector('.translation')

        window.clearTimeout(deletings)
        window.clearTimeout(word1)
        window.clearTimeout(word2)
        window.clearTimeout(word3)
        window.clearTimeout(word4)
        window.clearTimeout(word5)
        window.clearTimeout(translation1)
        window.clearTimeout(translation2)
        window.clearTimeout(translation3)
        window.clearTimeout(translation4)
        window.clearTimeout(translation5)

        if(translation.innerText !== translation_value)
        {

            translation.children[0].innerText = translation_value

        }

        if(word.innerText !== word_value)
        {

            word.children[0].innerText = word_value

        }

    }

}

function add_translation_f()
{

    // PARENT OF WORD AND TRANSLATION
    let parent_div = document.createElement('div')
    parent_div.classList.add('tr')
    parent_div.style.cssText = `width: 500px; margin: 0 auto; position: relative; display: flex; justify-content: center; gap: 10px 10px; margin-top: 20px; flex-wrap: wrap;`

    add_translation.parentElement.insertBefore(parent_div, add_translation)

    // WORD DIV
    let word = document.createElement('div')
    word.setAttribute('contenteditable', 'true')
    word.classList.add('word')
    word.style.cssText = `text-align: center; border: 1px solid black; border-radius: 10px; width: 49%; height: 40px; overflow: auto;`

    parent_div.appendChild(word)

    // WORD P
    let word_p = document.createElement('p')
    word_p.style.cssText = `padding-top: 7px; height: 20px;`
    word_p.innerText = tr_word

    word.appendChild(word_p)

    // TRANSLATE DIV
    let translate = document.createElement('div')
    translate.setAttribute('contenteditable', 'true')
    translate.classList.add('translation')
    translate.style.cssText = `text-align: center; border: 1px solid black; border-radius: 10px; width: 49%; height: 40px; overflow: auto;`

    parent_div.appendChild(translate)

    // TRANSLATE P
    let translate_p = document.createElement('p')
    translate_p.style.cssText = `padding-top: 7px; height: 20px;`
    translate_p.innerText = tr_translation

    translate.appendChild(translate_p)

    word.addEventListener('keyup', check_task)
    translate.addEventListener('keyup', check_task)

    word.addEventListener('keydown', prevent_deleting)
    translate.addEventListener('keydown', prevent_deleting)

    parent_div.addEventListener('mousedown', start_deleting)
    parent_div.addEventListener('mouseup', stop_deleting)

    check_task()

}

let add_translation = document.querySelector('.add_translation')

add_translation.addEventListener('click', add_translation_f)

</script>

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

                    <div style="padding-top: 30px;">

                        <div class="add_image" role="button" style="display: table; margin: 0 auto; background-image: url('{{ asset('storage/icons/bg.jpg') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;">

                            <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">${tr_add_image}</p>

                        </div>

                    </div>

                    <p style="font-size: 25px; padding-top: 20px; padding-bottom: 0; margin-bottom: 0;">${tr_add_words_for_translation}</p>
                    <p class="deleting_hint small text-muted p-0 m-0">${tr_to_delete_one_of_the_translations_press_it}</p>

                    <div class="add_translation" role="button" style="user-select: none; display: table; width: 250px; margin: 0 auto; overflow: hidden; margin-top: 20px; height: 40px; border: 1px solid black; border-radius: 10px;">

                        <p style="display: table-cell; vertical-align: middle; overflow: hidden;">+</p>

                    </div>

                    <p class="adding_hint small text-muted p-0 m-0">

                        ${tr_click_this_button_to_add_another_translation}

                    </p>

                </div>

                <div class="finish mt-5" role="button" hidden>
                    <p style="color: black; background-color: rgb(158, 255, 103); user-select: none; font-family: 'Inter', sans-serif; display: inline; padding: 10px 20px; border: 1px solid black; border-radius: 10px;">
                        ${tr_create_task}
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

            <div class="fill_gaps">

                <div style="padding-top: 30px;">

                    <div class="add_image" role="button" style="display: table; margin: 0 auto; background-image: url('{{ asset('storage/icons/bg.jpg') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;">

                        <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">${tr_add_image}</p>

                    </div>

                </div>

                <div style="padding-top: 30px; height: 76px;">

                    <div class="make_bold" hidden role="button" style="background-color: #98CCFC; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;">

                        <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">${tr_make_highlighted_answer}</p>

                    </div>

                    <div class="remove_bold" hidden role="button" style="background-color: #FF8D8D; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;">

                        <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">${tr_delete_answer}</p>

                    </div>

                </div>

                <div class="fill_gaps_add" contenteditable="true" style="padding: 10px; width: 90%; margin: 0 auto; border: 1px solid black; border-radius: 15px; margin-top: 20px; height: 350px;">${tr_write_text_here}</div>

                <p class="fill_gaps_hint small text-muted p-0 m-0">${tr_in_this_task_you_need_to_write} <br> ${tr_we_recommend_inserting_answers_after} <span class="text-primary" style="text-decoration: underline; cursor: pointer;" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="${tr_in_this_task_you_need_3_places}">${tr_read_more_here}</span></p>

            </div>

            <div class="finish mt-5" role="button" hidden>
                <p style="color: black; background-color: rgb(158, 255, 103); user-select: none; font-family: 'Inter', sans-serif; display: inline; padding: 10px 20px; border: 1px solid black; border-radius: 10px;">
                    ${tr_create_task}
                </p>
            </div>

            <div class="hidden" hidden>
                <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                <input class="task_body" type="text" name="task_body">
                <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                <input class="task_type" value="${task_type.value}" type="text" name="task_type">

            </div>

            <div class="ov" hidden></div>
            `
            let scriptFillGaps = document.createElement("script")
            scriptFillGaps.setAttribute("src", `{{ asset('storage/js/fillGaps/main.js') }}`)
            document.body.appendChild(scriptFillGaps)

            const popoverTriggerListt = document.querySelectorAll('[data-bs-toggle="popover"]')
            const popoverListt = [...popoverTriggerListt].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

        } else if(task_type.value == 3)
        {
            container.innerHTML = `
                <a href="{{ route('lesson.show', [$course, $lesson]) }}">${tr_back}</a>

                <h1 class="py-3">${task_name.value}</h1>

                <div class="fill_gaps">

                    <div style="padding-top: 30px;">

                        <div class="add_image" role="button" style="display: table; margin: 0 auto; background-image: url('{{ asset('storage/icons/bg.jpg') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;">

                            <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">${tr_add_image}</p>

                        </div>

                    </div>

                    <div style="padding-top: 30px; height: 76px;">

                        <div class="make_bold" hidden role="button" style="background-color: #98CCFC; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;">

                            <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">${tr_make_highlighted_answer}</p>

                        </div>

                        <div class="remove_bold" hidden role="button" style="background-color: #FF8D8D; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;">

                            <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">${tr_delete_answer}</p>

                        </div>

                    </div>

                    <div class="fill_gaps_add" contenteditable="true" style="padding: 10px; width: 90%; margin: 0 auto; border: 1px solid black; border-radius: 15px; margin-top: 20px; height: 350px;">------>Сюди вписувати текст<-------</div>

                    <p class="fill_gaps_hint small text-muted p-0 m-0">${tr_in_this_task_you_need_to_second} <br> ${tr_we_recommend_inserting_answers_after} <span class="text-primary" style="text-decoration: underline; cursor: pointer;" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="${tr_in_this_task_you_need_3_second}">${tr_read_more_here}</span></p>

                </div>

                <div class="finish mt-5" role="button" hidden>
                    <p style="color: black; background-color: rgb(158, 255, 103); user-select: none; font-family: 'Inter', sans-serif; display: inline; padding: 10px 20px; border: 1px solid black; border-radius: 10px;">
                        ${tr_create_task}
                    </p>
                </div>

                <div class="hidden" hidden>
                    <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                    <input class="task_body" type="text" name="task_body">
                    <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                    <input class="task_type" value="${task_type.value}" type="text" name="task_type">

                </div>

                <div class="ov" hidden></div>
            `
            let scriptIFillGaps = document.createElement("script")
            scriptIFillGaps.setAttribute("src", "{{ asset('storage/js/iFillGaps/main.js') }}")
            document.body.appendChild(scriptIFillGaps)

            const popoverTriggerListt = document.querySelectorAll('[data-bs-toggle="popover"]')
            const popoverListt = [...popoverTriggerListt].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

        } else if(task_type.value == 4)
        {
            container.innerHTML = `
            <a href="{{ route('lesson.show', [$course, $lesson]) }}">${tr_back}</a>

            <h1 class="py-3">${task_name.value}</h1>

            <div class="youtube">

                <div class="youtube_add" role="button" style="display: table; margin: 0px auto; background: rgb(255, 15, 55); border: 1px solid rgb(0, 0, 0); border-radius: 10px; color: white;">

                    <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">

                        ${tr_add_video_from_youtube}

                    </p>

                </div>

            </div>

            <div class="options" hidden style="padding-bottom: 200px;">

                <div class="task_add mt-5" style="width: 80%; margin: 0 auto; user-select: none; color: green;" role="button">

                    <h1 style="padding: 20px; padding-bottom: 25px;">
                        +
                    </h1>

                </div>

                <p style="padding-top: 5px;">${tr_or}</p>

                <div class="task_finish" style="color: white; display: table; margin: 0 auto; position: relative; background: #FF3232; border: 1px solid #000; border-radius: 10px;" role="button">

                    <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">
                        ${tr_finish_editing_the_task}
                    </p>

                </div>

            </div>

            <div class="task_create mt-5" hidden style="color: black; display: table; margin: 0 auto; position: relative; background: #0aca03; border: 1px solid #000; border-radius: 10px;" role="button">

                <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">
                    ${tr_create_task}
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

            <textarea name="task_body" class="editor" style="height: 500px;">

            </textarea>

            <div hidden>
                <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                <input class="task_type" value="${task_type.value}" type="text" name="task_type">
            </div>

            <button class="btn btn-primary mt-2">{{ __('main.create_task') }}</button>
            `

            ClassicEditor.create(document.querySelector('.editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('task.uploadImage', ['_token' => csrf_token()]) }}"
                }
            }).catch(error => {
                console.error(error)
            })

        }
    })

</script> --}}

@endsection
