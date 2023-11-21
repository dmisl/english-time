@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Створити нове завдання')

@section('main.content')

<x-form action="{{ route('task.store', [$course, $lesson]) }}" enctype="multipart/form-data">
    <div class="container" id="container">

        <a href="{{ route('lesson.show', [$course, $lesson]) }}">{{ __('main.back') }}</a>

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
        </div>

    </div>

</x-form>

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

                            <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">Додати картинку</p>

                        </div>

                    </div>

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

            <div class="fill_gaps">

                <div style="padding-top: 30px;">

                    <div class="add_image" role="button" style="display: table; margin: 0 auto; background-image: url('{{ asset('storage/icons/bg.jpg') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;">

                        <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">Додати картинку</p>

                    </div>

                </div>

                <div style="padding-top: 30px; height: 76px;">

                    <div class="make_bold" hidden role="button" style="background-color: #98CCFC; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;">

                        <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">Зробити виділене відповіддю</p>

                    </div>

                    <div class="remove_bold" hidden role="button" style="background-color: #FF8D8D; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;">

                        <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">Видалити відповідь</p>

                    </div>

                </div>

                <div class="fill_gaps_add" contenteditable="true" style="padding: 10px; width: 90%; margin: 0 auto; border: 1px solid black; border-radius: 15px; margin-top: 20px; height: 350px;">------>Сюди вписувати текст<-------</div>

                <p class="fill_gaps_hint small text-muted p-0 m-0">У цьому завданні потрібно вписати текст і виділити слова, на місця яких потрібно буде перетянути відповіді. <br> Радимо вставляти відповіді після заповнення тексту, щоб уникнути проблем. <span class="text-primary" style="text-decoration: underline; cursor: pointer;" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="В цьому завданні потрібно написати текст, і в ньому виділити принаймі 3 місця, які потрібно буде заповнити відповіддю. Щоб створити таке місце - виділіть вираз мишкою і нажміть на кнопку, щоб видалити - виділіть, або нажміть на слово.">Детальніше тут</span></p>

            </div>

            <div class="finish mt-5" role="button" hidden>
                <p style="background-color: rgb(158, 255, 103); user-select: none; font-family: 'Inter', sans-serif; display: inline; padding: 10px 20px; border: 1px solid black; border-radius: 10px;">
                    Створити завдання
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

                            <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">Додати картинку</p>

                        </div>

                    </div>

                    <div style="padding-top: 30px; height: 76px;">

                        <div class="make_bold" hidden role="button" style="background-color: #98CCFC; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;">

                            <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">Зробити виділене відповіддю</p>

                        </div>

                        <div class="remove_bold" hidden role="button" style="background-color: #FF8D8D; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;">

                            <p style="padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">Видалити відповідь</p>

                        </div>

                    </div>

                    <div class="fill_gaps_add" contenteditable="true" style="padding: 10px; width: 90%; margin: 0 auto; border: 1px solid black; border-radius: 15px; margin-top: 20px; height: 350px;">------>Сюди вписувати текст<-------</div>

                    <p class="fill_gaps_hint small text-muted p-0 m-0">У цьому завданні потрібно написати текст і виділити слово, на місці якого учневі потрібно буде написати відповідь. <br> Радимо вставляти відповіді після заповнення тексту, щоб уникнути проблем. <span class="text-primary" style="text-decoration: underline; cursor: pointer;" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="В цьому завданні потрібно написати текст, і в ньому виділити принаймі 3 місця, які потрібно буде заповнити відповіддю. Щоб створити таке місце - виділіть вираз мишкою і нажміть на кнопку, щоб видалити - виділіть, або нажміть на слово.">Детальніше тут</span7></p>

                </div>

                <div class="finish mt-5" role="button" hidden>
                    <p style="background-color: rgb(158, 255, 103); user-select: none; font-family: 'Inter', sans-serif; display: inline; padding: 10px 20px; border: 1px solid black; border-radius: 10px;">
                        Створити завдання
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

                        Додати відео з YouTube

                    </p>

                </div>

            </div>

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

</script>

@endsection
