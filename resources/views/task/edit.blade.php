@extends('layouts.main')

@section('main.title', env('APP_NAME').' | Редагування завдання')

@section('main.content')

<x-form action="{{ route('task.update', [$course, $lesson, $task->id]) }}" method="PUT" enctype="multipart/form-data">

    <div class="hidden_body container" style="font-family: 'Inter', sans-serif;">

        <a href="{{ route('lesson.show', [$course, $lesson]) }}">{{ __('main.back') }}</a>

        {{-- EDITING TASK NAME --}}
        <div>

            <h3 class="name" style="margin-top: 20px; display: inline-block; border-radius: 20px; border: 1px solid black; padding: 10px 20px;" contenteditable="true">

                {{ $task->name }}

            </h3>

            <p class="name_hint small text-muted">Нажміть щоб змінити назву завдання</p>

        </div>

        <div class="editing" style="padding-bottom: 100px;"></div>

        <div class="task_update bg-success bg-gradient" hidden style="display: table; margin: 30px auto 20px; border: 1px solid black; border-radius: 10px; color: white;" role="button">
            <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">
                ЗБЕРЕГТИ ЗМІНИ
            </p>
        </div>

        <div class="ov"></div>

        <div class="declared">
            {!! $task->body !!}
        </div>

    </div>
    {{-- HIDDEN EDITING FORM --}}
    <div class="hidden" hidden>

        {{-- EDITABLE --}}
        <input type="text" name="name" value="{{ $task->name }}" class="task_name">
        <input type="text" name="body" value="{{ $task->body }}" class="task_body">
        {{-- NOT EDITABLE --}}
        <input type="text" name="id" value="{{ $task->id }}">
        <input type="text" name="task_type" value="{{ $task->task_type }}" class="task_type">
        <input type="text" name="lesson_id" value="{{ $task->lesson_id }}">

    </div>

</x-form>

{{-- SOME USEFUL FUNCTIONS --}}
<script>

    let bg_jpg = `{{ asset('storage/icons/bg.jpg') }}`
    let empty_jpg = `{{ asset('storage/icons/empty.jpg') }}`
    let bg_image_upload = `{{ asset('storage/icons/image_upload.png') }}`
    let bg_image_url = `{{ asset('storage/icons/image_url.png') }}`
    let deletes

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

</script>

{{-- TEMPORARY --}}
<script>

    let editing = document.querySelector('.editing')
    let declared = document.querySelector('.declared')

    let textarea = document.createElement('textarea')
    textarea.setAttribute('name', 'body')
    textarea.style.height = '500px'

    document.querySelector('.task_body').remove()

    editing.appendChild(textarea)

    if(dark_mode_input.checked)
    {
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            skin: 'oxide-dark',
            content_css: 'dark',
            setup: (editor) => {
                editor.on('init', () => {
                    editor.setContent(declared.innerHTML)
                })
            }
        });

    } else
    {
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            setup: (editor) => {
                editor.on('init', () => {
                    editor.setContent(declared.innerHTML)
                })
            }
        });
    }

    declared.remove()

    let task_update = document.querySelector('.task_update')

    task_update.removeAttribute('hidden')

    task_update.addEventListener('click', function () {

        let submitik = document.createElement('button')

        submitik.setAttribute('type', 'submit')

        document.querySelector('.hidden').appendChild(submitik)

        submitik.click()

    })

</script>

{{-- <script>

    // TRANSLATION TASK
    if(document.querySelector('.task_type').value == 1)
    {

        let scriptTranslate = document.createElement('script')
        scriptTranslate.src = `{{ asset('storage/js/edit/translate.js') }}`
        document.body.appendChild(scriptTranslate)

    }

    // FILL GAPS (READY-MADE OPTIONS)
    if(document.querySelector('.task_type').value == 2)
    {

        let scriptFillGaps = document.createElement('script')
        scriptFillGaps.src = `{{ asset('storage/js/edit/fillGaps.js') }}`
        document.body.appendChild(scriptFillGaps)

    }

    // FILL GAPS (MANUAL INPUT)
    if(document.querySelector('.task_type').value == 3)
    {

        let scriptIFillGaps = document.createElement('script')
        scriptIFillGaps.src = `{{ asset('storage/js/edit/iFillGaps.js') }}`
        document.body.appendChild(scriptIFillGaps)

    }

    // ABC TASK
    if(document.querySelector('.task_type').value == 4)
    {

        let scriptABC = document.createElement('script')
        scriptABC.src = `{{ asset('storage/js/edit/abc.js') }}`
        document.body.appendChild(scriptABC)

    }

    // INFO
    if(document.querySelector('.task_type').value == 5)
    {



    }

</script> --}}

@endsection
