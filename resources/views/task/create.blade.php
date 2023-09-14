@extends('layouts.main')
@section('main.title', env('APP_NAME').' | Створити нове завдання')

@section('main.content')

<x-form action="{{ route('task.store', [$course, $lesson]) }}" enctype="multipart/form-data">
    <div class="container" id="container">

        <a href="{{ route('lesson.show', [$course, $lesson]) }}">Назад</a>

        <div class="row mt-5">
            <div class="col-12 col-md-6 offset-md-3">
                <x-card>
                    <x-card-body class="border-bottom">
                        <h3>Створення завдання</h3>
                    </x-card-body>
                    <x-card-body>
                        <x-form-item>
                            <x-label class="text-start">
                                Назва завдання
                            </x-label>
                            <input type="text" class="form-control task_name border">
                        </x-form-item>
                        <x-form-item>
                            <div class="my-3 form-floating m-0" style="width: 100%;"">
                                <select name="task_type" class="form-select task_type border" id="floatingSelect" aria-label="Floating label select example">
                                    <option></option>
                                    <option {{ selected('1', old('task_type')) }} value="1">Перекласти</option>
                                    <option {{ selected('2', old('task_type')) }} value="2">Заповнити пропуски(готовими варіантами)</option>
                                    <option {{ selected('3', old('task_type')) }} value="3">Заповнити пропуски(написати вручну)</option>
                                    <option {{ selected('4', old('task_type')) }} value="4">ABC</option>
                                    <option {{ selected('5', old('task_type')) }} value="5">Інформація</option>
                                </select>
                                <label for="floatingSelect">Виберіть тип завдання</label>
                            </div>
                        </x-form-item>
                        <x-form-item>
                            <button class="btn btn-primary go" hidden>
                                Перейти до редактування
                            </button>
                        </x-form-item>
                    </x-card-body>
                </x-card>
            </div>
        </div>

    </div>
</x-form>
<script>

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
                <a href="{{ route('lesson.show', [$course, $lesson]) }}">Назад</a>

                <h1 class="py-3">${task_name.value}</h1>

                <div class="overview w-100 border rounded-5" style="padding-bottom: 100px;">
                    <div role="button" class="my-3 bg-success bg-gradient border" id="add_answers" >
                        <h2 class="mt-2">Добавити переклади слів</h2>
                    </div>
                    <div class="next_section"></div>
                    </div>
                    <div hidden class="hidden">
                        <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                        <input class="task_body" type="text" name="task_body">
                        <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                        <input class="task_type" value="${task_type.value}" type="text" name="task_type">
                    </div>
            `
            let scriptTranslation = document.createElement("script");
            scriptTranslation.setAttribute("src", "{{ asset('storage/js/translation.js') }}");
            document.body.appendChild(scriptTranslation);
        } else if(task_type.value == 2)
        {
            container.innerHTML = `
                <a href="{{ route('lesson.show', [$course, $lesson]) }}">Назад</a>

                <h1 class="py-3">${task_name.value}</h1>

                <div class="overview w-100" style="padding-bottom: 100px; border:1px solid black; border-radius:20px;">
                    <div class="my-3" id="add_answers" style="cursor: pointer; border: 1px solid black;">
                        <h2 class="mt-2">Добавити відповіді для вставлення</h2>
                    </div>
                    <div class="next_section"></div>
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
            scriptFillGaps.setAttribute("src", "{{ asset('storage/js/fillGaps/fillGaps.js') }}")
            document.body.appendChild(scriptFillGaps)
        } else if(task_type.value == 3)
        {
            container.innerHTML = `
            <a href="{{ route('lesson.show', [$course, $lesson]) }}">Назад</a>

            <h1 class="py-3">${task_name.value}</h1>

            <div class="overview w-100" style="padding-bottom: 100px; border:1px solid black; border-radius:20px;">

                <div class="add_text my-3 mx-auto" style="overflow: hidden; user-select: none; background-color: rgb(13, 175, 250); border: 1px solid black; border-radius: 15px; width: 80%;">
                    <h2 class="mt-1">Добавити текст?</h2>
                    <div class="d-flex w-50 mx-auto pb-2">
                        <div class="yes" style="width: 45%; cursor: pointer; background-color: rgb(42, 241, 248); border: 1px solid black; border-radius: 15px; margin-right: 10%;">
                            <h4 class="mt-1">Так</h4>
                        </div>
                        <div class="no" style="width: 45%; cursor: pointer; background-color: rgb(42, 241, 248); border: 1px solid black; border-radius: 15px;">
                            <h4 class="mt-1">Ні</h4>
                        </div>
                    </div>
                </div>

                <div class="bg-info mx-auto next mt-3" hidden style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                    <h5 class="py-2" >Перейти до наступного етапу</h5>
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
            <a href="{{ route('lesson.show', [$course, $lesson]) }}">Назад</a>

            <h1 class="py-3">${task_name.value}</h1>

            <div class="overview w-100" style="padding-bottom: 100px; border:1px solid black; border-radius:20px;">
                <div id="text_edit" style="width: 80%; padding: 10px 0; background-color: aqua; border: 1px solid black; border-radius: 15px; margin: 0 auto; margin-top: 20px; cursor: pointer;">
                    <h3>
                        Добавити запитання
                    </h3>
                </div>
                <div class="bg-info mx-auto next mt-3" hidden style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                    <h5 class="py-2" >Перейти до наступного етапу</h5>
                </div>

            </div>
            <input style="display: none;" class="task_image" type="file" name="task_image">
            <div hidden class="hidden">
                <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                <input class="task_body" type="text" name="task_body">
                <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                <input class="task_type" value="${task_type.value}" type="text" name="task_type">
                <input class="replace_from" type="text" name="replace_from">
                <input class="replace_to" type="text" name="replace_to">
            </div>
            `
            let scriptABC = document.createElement("script")
            scriptABC.setAttribute("src", "{{ asset('storage/js/ABC/addText.js') }}")
            document.body.appendChild(scriptABC)
        } else if(task_type.value == 5)
        {
            container.innerHTML = `
            <a href="{{ route('lesson.show', [$course, $lesson]) }}">Назад</a>

            <h1 class="py-3">${task_name.value}</h1>

            <textarea name="task_body" style="height: 500px;">

            </textarea>

            <div hidden>
                <input class="task_name" value="${task_name.value}" type="text" name="task_name">
                <input class="lesson_id" value="{{ $lesson }}" type="text" name="lesson_id">
                <input class="task_type" value="${task_type.value}" type="text" name="task_type">
            </div>

            <button class="btn btn-primary mt-2">Створити завдання</button>
            `

            tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        }
    })

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

    function shuffle(array) {
        let currentIndex = array.length, randomIndex;

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

    let scriptInputs = `{{ asset('storage/js/addInputs.js') }}`
    let scriptAnswers = `{{ asset('storage/js/addAnswer.js') }}`

    let scriptfAnswers = `{{ asset('storage/js/fillGaps/addAnswers.js') }}`

    let scriptABCImage = `{{ asset('storage/js/ABC/addImage.js') }}`
    let scriptABCAnswers = `{{ asset('storage/js/ABC/addAnswers.js') }}`

    let scriptIAddInputs = `{{ asset('storage/js/IFillGaps/addInputs.js') }}`

    let edit_icon = `{{ asset('storage/icons/edit.png') }}`
    let accept_icon = `{{ asset('storage/icons/accept.png') }}`
    let deny_icon = `{{ asset('storage/icons/deny.png') }}`

    let asset = `{{ asset('storage/') }}`

</script>

{{-- <div class="d-flex">
    <div style="width: 70%;">
        <input style="width: 100%;" class="form-control helper1" placeholder="Це helper який допоможе вам з написанням слів через _" type="text">
        <input style="width: 100%;" class="form-control helper2" placeholder="Тут копіюйте готове :)" type="text">
    </div>
</div>
<x-form action="{{ route('task.store', [$course, $lesson]) }}">
    <input type="hidden" name="lesson_id" value="{{ $lesson }}">
    <input class="hidden_task_type" type="hidden" name="task_type" value="">
    <input id="task_name" class="form-control" placeholder="Назва завдання" name="task_name" value="{{ old('task_name') }}">
    <div class="d-flex">
        <div class="left w-50">
            <input id="body" type="hidden" name="body" class="hidden" value="{{ old('body') }}">
            <div class="form-floating">
                <textarea class="form-control textarea w-100" name="textarea" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 500px">{{ old('textarea') }}</textarea>
                <label class="textarea_label" for="floatingTextarea2">Завдання</label>
            </div>
            @if($errors->has('task_type'))
            <p class="small text-danger">{{$errors->first('text_type')}}</p>
            @endif
        </div>
        <div class="overview">

        </div>
    </div>
    <x-button type="submit">
        Submit
    </x-button>
</x-form>
<div class="hints text-start mt-5">

</div> --}}
<script>

// let task_type = document.querySelector('.task_type')
// let hidden_task_type = document.querySelector('.hidden_task_type')
// let overview = document.querySelector('.overview')
// let textarea = document.querySelector('.textarea')
// let hidden = document.querySelector('.hidden')
// let hints = document.querySelector('.hints')
// let textarea_label = document.querySelector('.textarea_label')
// let left = document.querySelector('.left')
// let helper1 = document.querySelector('.helper1')
// let helper2 = document.querySelector('.helper2')
// let body = document.querySelector('#body')
// let alert = document.querySelector('#alert')
// let task_name = document.querySelector('#task_name')

// if(alert === null)
// {
// } else
// {
//     if(alert.innerText.includes('task name'))
//     {
//         task_name.style.border = '1px solid red';
//     }
//     if(alert.innerText.includes('task type'))
//     {
//         task_type.style.border = '1px solid red';
//     }
//     if(alert.innerText.includes('body'))
//     {
    //         textarea.style.border = '1px solid red';
    //     }
    // }


    // task_name.addEventListener('keyup', function () {
        //     task_name.style.border = ''
        // })

        // helper1.addEventListener('keyup', function ()
        // {
//     let array1 = helper1.value.split(' ')
//     helper2.value = ''
//     array1.forEach(element => {
//         helper2.value += element+'_'
//     });
// })

// task_type.addEventListener('change', function(element)
// {
//     task_type.style.border = ''
//     if(task_type.value >= 1)
//     {
//         hidden_task_type.value = task_type.value
//         if(task_type.value == 1)
//         {
    // textarea.value = `
    // --task:Виберіть_правильні_відповіді
// --answers:red,blue,white
// --dgap:червоний-red,синій-blue,білий-white
// --check`
//             hints.innerHTML = `
//                 <p>Суть завдання --task:*text*</p>
//                 <p>Відповіді для перенесення --answers:*answer1*,*answer2*.. необмежена кількість, слідкуйте щоб кількіть відповідей і запитань бути рівні</p>
//                 <p>Місця для заповнення перекладу --dgap:*ukrainian*-*english*,*ukrainian*-*english* будьте уважними щоб *answer* з --answers сходився з перекладом, тобто *english*</p>
//                 <p>Кнопка перевірки --check</p>
//                 <p>Перенесення тексту //</p>
//             `
//             overview.innerHTML = `
//             <h2>Виберіть правильні відповіді </h2> <div class="answers"><label class="answer" value="red" draggable="true">red</label><label class="answer" value="blue" draggable="true">blue</label><label class="answer" value="white" draggable="true">white</label></div>
//                     <h1 id="right_answers" class="text-success"></h1>
//                             <table style="margin: 0 auto;"><tr>
//                                 <td><label class="input_label">червоний </label></td>
//                                 <td><label class="input" answer="red"></td>
//                             </tr>
//                             <tr>
//                                 <td><label class="input_label">синій </label></td>
//                                 <td><label class="input" answer="blue"></td>
//                             </tr>
//                             <tr>
//                                 <td><label class="input_label">білий </label></td>
//                                 <td><label class="input" answer="white"></td>
    //                             </tr>
//                             </table> <button type="button" class="btn btn-primary" disabled id="check">Перевірити</button>`
//                             body.value = `
//             <h2>Виберіть правильні відповіді </h2> <div class="answers"><label class="answer" value="red" draggable="true">red</label><label class="answer" value="blue" draggable="true">blue</label><label class="answer" value="white" draggable="true">white</label></div>
//                     <h1 id="right_answers" class="text-success"></h1>
//                             <table style="margin: 0 auto;"><tr>
    //                                 <td><label class="input_label">червоний </label></td>
    //                                 <td><label class="input" answer="red"></td>
//                             </tr>
//                             <tr>
    //                                 <td><label class="input_label">синій </label></td>
    //                                 <td><label class="input" answer="blue"></td>
        //                             </tr>
        //                             <tr>
            //                                 <td><label class="input_label">білий </label></td>
            //                                 <td><label class="input" answer="white"></td>
//                             </tr>
//                             </table> <button type="button" class="btn btn-primary" disabled id="check">Перевірити</button>`
//         }
//     }
//     if(task_type.value == 2)
//     {
    // textarea.value = `
// --task:Fill_in_the_gaps
// --answers:red,blue,white
// --textstart
// --text:What's_your_tshirt_color?_It's
// --gap:red
// //
// --text:What's_the_color_of_sky?_It's
// --gap:blue
// //
// --text:What_will_be_your_next_move?
// --gap:white
// --textend
// //
// --check
// `
// hints.innerHTML = `
//                 <p>Суть завдання --task:*text*</p>
//                 <p>Початок тексту --textstart</p>
//                 <p>Кінець тексту --textend</p>
//                 <p>Написати текст --text:*text*</p>
//                 <p>Варіанти відповідей --answers:*answer1*,*answer2*.. необмежена кількість, слідкуйте щоб кількіть відповідей і запитань бути рівні</p>
//                 <p>Місця для варіантів --gap:*answer*,*answer*.. будьте уважними щоб *answer* з --answers сходився</p>
//                 <p>Кнопка перевірки --check</p>
//                 <p>Перенесення тексту //</p>
//             `
//             overview.innerHTML = `
// <h2>Fill in the gaps </h2> <div class="answers"><label class="answer" value="red" draggable="true">red</label><label class="answer" value="blue" draggable="true">blue</label><label class="answer" value="white" draggable="true">white</label></div>
            //         <h1 id="right_answers" class="text-success"></h1> <p> <i class="text">What's your tshirt color? It's </i> <label class="input" answer="red"></label> <br> <i class="text">What's the color of sky? It's </i> <label class="input" answer="blue"></label> <br> <i class="text">What will be your next move? </i> <label class="input" answer="white"></label> </p> <br> <button type="button" class="btn btn-primary" disabled id="check">Перевірити</button>
//             `
//             body.value = `
//             <h2>Fill in the gaps </h2> <div class="answers"><label class="answer" value="red" draggable="true">red</label><label class="answer" value="blue" draggable="true">blue</label><label class="answer" value="white" draggable="true">white</label></div>
//                     <h1 id="right_answers" class="text-success"></h1> <p> <i class="text">What's your tshirt color? It's </i> <label class="input" answer="red"></label> <br> <i class="text">What's the color of sky? It's </i> <label class="input" answer="blue"></label> <br> <i class="text">What will be your next move? </i> <label class="input" answer="white"></label> </p> <br> <button type="button" class="btn btn-primary" disabled id="check">Перевірити</button>
//             `
//     }
//     if(task_type.value == 3)
//     {
//         textarea.value = `
// --task:Fill_in_the_gaps
// --wgap:What_is_the_color_of_sky?_It's_-blue,you_dumb_moth..
// //
// --wgap:Okey..._then_what_is_your_favourite_color?-black,of_course,_maybe_becourse_I_am_a-businessman
// //
// //
// --check
// `
//         hints.innerHTML = `
//         <p>Суть завдання --task:</p>
//         <p>Текст і поля для впису --wgap:*text*-*asnwer*,*text*-*answer*</p>
//         <p>Атрибут *answer* необовязковий, тому ви можете спокійно писати текст далі, --wgap:What_color_are_niggas?They_are-black,oh_really?</p>
//         <p>Кнопка перевірки --check</p>
//         <p>Перенесення тексту //</p>
//         `
//         overview.innerHTML = `
//         <h2>Fill in the gaps </h2>
//                             <i style="font-size: 20px; text-align:left;">What is the color of sky? It's
    //                                 <label for="">
        //                                     <input type="text" class="form-control" solution="blue" style="font-size: 17px;width: 200px; border: 1px solid black; text-align: center;">
        //                                 </label>
        //                             </i>

//                             <i style="font-size: 20px; text-align:left;">you dumb moth.. </i>
//                              <br>
//                             <i style="font-size: 20px; text-align:left;">Okey... then what is your favourite color?
//                                 <label for="">
//                                     <input type="text" class="form-control" solution="black" style="font-size: 17px;width: 200px; border: 1px solid black; text-align: center;">
//                                 </label>
//                             </i>

//                             <i style="font-size: 20px; text-align:left;">of course </i>

//                             <i style="font-size: 20px; text-align:left;"> maybe becourse I am a
//                                 <label for="">
    //                                     <input type="text" class="form-control" solution="businessman" style="font-size: 17px;width: 200px; border: 1px solid black; text-align: center;">
    //                                 </label>
    //                             </i>
    //                              <br> <br> <button type="button" class="btn btn-primary" disabled id="check">Перевірити</button>
    //         `
    //         body.value = `
    //         <h2>Fill in the gaps </h2>
//                             <i style="font-size: 20px; text-align:left;">What is the color of sky? It's
    //                                 <label for="">
//                                     <input type="text" class="form-control" solution="blue" style="font-size: 17px;width: 200px; border: 1px solid black; text-align: center;">
//                                 </label>
//                             </i>

//                             <i style="font-size: 20px; text-align:left;">you dumb moth.. </i>
//                              <br>
//                             <i style="font-size: 20px; text-align:left;">Okey... then what is your favourite color?
//                                 <label for="">
    //                                     <input type="text" class="form-control" solution="black" style="font-size: 17px;width: 200px; border: 1px solid black; text-align: center;">
    //                                 </label>
    //                             </i>

    //                             <i style="font-size: 20px; text-align:left;">of course </i>

    //                             <i style="font-size: 20px; text-align:left;"> maybe becourse I am a
        //                                 <label for="">
            //                                     <input type="text" class="form-control" solution="businessman" style="font-size: 17px;width: 200px; border: 1px solid black; text-align: center;">
            //                                 </label>
//                             </i>
//                              <br> <br> <button type="button" class="btn btn-primary" disabled id="check">Перевірити</button>
//         `
//     }
//     if(task_type.value == 4)
//     {
//         textarea.value = ``
//         hints.innerHTML = `
//         <h2>НЕ ПРАЦЮЄ</h2>
//         <p>Суть завдання --task:</p>
//         <p>Запитання і варіанти відповіді --question:*text*-*variant1*,*variant2*,*variant3*</p>
//         <p>Кнопка перевірки --check</p>
//         <p>Перенесення тексту //</p>
//         `
//         overview.innerHTML = ``
//         body.value = ``
//     }
//     if(task_type.value == 5)
//     {
    //         overview.remove()

    //         left.innerHTML = '<textarea name="body"></textare>'


//         tinymce.init({
    //         selector: 'textarea',
//         plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
//         toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
//         tinycomments_mode: 'embedded',
//         tinycomments_author: 'Author name',
//         mergetags_list: [
    //             { value: 'First.Name', title: 'First Name' },
    //             { value: 'Email', title: 'Email' },
//         ]
//         });
//     }
// })

// textarea.addEventListener('keyup', function () {
    //     textarea.style.border = ''
//     let words = textarea.value.split(/[\s\n]+/)
//     for (let i = 0; i < words.length; i++) {
//         if(words[i].includes('--table:'))
//         {
    //             let needed = words[i].slice(8)
    //             words[i] = '<table>'
//             if(needed.includes(','))
//             {

    //             }
//             else
//             {
    //                 words[i] += `
//                 <tbody>
//                     <tr>
//                         asdsd
//                     </tr>
//                 </tbody>
//                     `
//             }
//             words[i] += '</table>'
//         }
//         if(words[i].includes('--question:'))
//         {
    //             let needed = words[i].slice(11)
    //             if(needed.includes('-'))
    //             {
//                 let array1 = needed.split('-')
//                 array1[0] = without(array1[0], '_')
//                 words[i] = `<h3>${array1[0]}</h3>`
//                 if(array1[1].includes(','))
//                 {
//                     let array2 = array1[1].split(',')
//                     for (let index = 0; index < array2.length; index++) {
    //                         words[i] += `
    //                         <div class="form-check" style="text-align: left; margin: 0 auto; width: 100px;">
        //                             <input class="form-check-input" type="radio" name="${array1[0]}" id="flexRadioDefault${index}">
//                             <label class="form-check-label" for="flexRadioDefault${index}">
    //                                 ${array2[index]}
    //                             </label>
    //                         </div>
    //                         `
    //                     }
    //                 }
    //                 else
//                 {
//                     words[i] += `
//                     <div class="form-check" style="text-align: left;">
    //                         <input class="form-check-input" type="radio" name="${needed}" id="flexRadioDefault1">
    //                         <label class="form-check-label" for="flexRadioDefault1">
        //                             ${array1[1]}
        //                         </label>
//                     </div>
//                     `

//                 }
//             }
//             else
//             {
    //                 needed = without(needed, '_')
    //                 words[i] = `<h3>${needed}</h3>`
    //             }
    //         }
    //         if(words[i].includes('--wgap:'))
    //         {
        //             let needed = words[i].slice(7)
//             if(needed.includes(','))
//             {
//                 let array1 = needed.split(',')
//                 words[i] = ''
//                 array1.forEach(element => {
    //                     if(element.includes('-'))
    //                     {
        //                         element = element.split('-')
        //                         element[0] = without(element[0], '_')
        //                         words[i] += `
        //                         <i style="font-size: 20px; text-align:left;">${element[0]}
            //                             <label for="">
                //                                 <input type="text" class="form-control solution" solution="${element[1]}" style="font-size: 17px;width: 200px; border: 1px solid black; text-align: center;">
                //                             </label>
                //                         </i>
                //                         `
                //                     } else
//                     {
//                         element = without(element, '_')
//                         words[i] += `
//                         <i style="font-size: 20px; text-align:left;">${element}</i>
//                         `
//                     }
//                 });
//             } else
//             {
//                 if(needed.includes('-'))
//                 {
//                     array1 = needed.split('-')
//                     array1[0] = without(array1[0], '_')
//                     words[i] = `
//                     <i style="font-size: 20px; text-align:left;">${array1[0]}
    //                         <label for="">
        //                             <input type="text" class="form-control solution" solution="${array1[1]}" style="font-size: 17px;width: 200px; border: 1px solid black; text-align: center;">
//                         </label>
//                     </i>
//                     `
//                 } else
//                 {
    //                     needed = without(needed, '_')
    //                     words[i] = `
    //                     <i style="font-size: 20px; text-align:left;">${needed}</i>
    //                     `
//                 }
//             }
//         }
//         if(words[i].includes('--task:'))
//         {
//             let needed = words[i].slice(7)
//             let array1
//             if(needed.includes('_'))
//             {
    //                 array1 = needed.split('_')
    //                 words[i] = `<h2>`
        //                 array1.forEach(element => {
//                     words[i] += `${element}`+' '
//                 });
//                 words[i] += `</h2>`
//             }
//             else
//             {
    //                 words[i] = `<h2>${needed}</h2>`;
    //             }
//         }
//         if(words[i].includes('--answers:'))
//         {
    //             let needed = words[i].slice(10)
//             let array2
//             if(needed.includes(','))
//             {
    //                 array2 = needed.split(',')
    //                 words[i] = `<div class="answers">`;
//                 array2.forEach(element => {
    //                     if(element.includes('_'))
//                     {
    //                         let lowercase = element.toLowerCase()
    //                         words[i] += `<label class="answer" value="${lowercase}" draggable="true">`
        //                         array3 = element.split('_')
        //                         array3.forEach(element => {
//                             words[i] += element+' '
//                         });
//                         words[i] += `</label>`
//                     } else
//                     {
    //                         words[i] += `<label class="answer" value="${element}" draggable="true">${element}</label>`
    //                     }
//                 });
//                 words[i] += `</div>
//                 <h1 id="right_answers" class="text-success"></h1>`;
//             }
//             else
//             {
    //                 if(needed.includes('_'))
    //                 {
        //                     array2 = needed.split('_')
        //                     let lowercase = needed.toLowerCase()
        //                     needed = ''
        //                     array2.forEach(element => {
//                         needed += element+' '
//                     });
//                     words[i] = `<div class="answers">`;
//                     words[i] += `<label class="answer" value="${lowercase}" draggable="true">${needed}</label>`;
//                     words[i] += `</div>`;
//                 } else
//                 {
    //                     let lowercase = needed.toLowerCase()
    //                     words[i] = `<div class="answers">`;
        //                     words[i] += `<label class="answer" value="${lowercase}" draggable="true">${needed}</label>`;
//                     words[i] += `</div>`;
//                 }
//             }
//         }
//         if(words[i].includes('--dgap:'))
//         {
    //             let needed = words[i].slice(7)
    //             if(needed.includes(','))
//             {
//                 if(needed.includes('-'))
//                 {
//                     let array1 = needed.split(',')
//                     words[i] = '<table style="margin: 0 auto;">'
    //                     array1.forEach(element => {
//                         let array2 = element.split('-')
//                         let ukrainian = without(array2[0], '_')
//                         let lowercase = array2[1].toLowerCase()

//                         words[i] += `<tr>
    //                             <td><label class="input_label">${ukrainian}</label></td>
    //                             <td><label class="input" answer="${lowercase}"></td>
//                         </tr>
//                         `
//                     });
//                     words[i] += '</table>'
//                 }
//             }
//             else
//             {
    //                 if(needed.includes('-'))
//                 {
//                     let array1 = needed.split('-')
//                     let ukrainian = without(array1[0], '_')
//                     let lowercase = array1[1].toLowerCase()


//                     words[i] = `<div class="d-flex">
    //                         <label class="input_label">${ukrainian}</label>
    //                         <label class="input" answer="${array1[1]}">
//                     </div>
//                     `

//                 }
//             }
//         }
//         if(words[i].includes('--gap:'))
//         {
//             needed = words[i].slice(6)
//             if(needed.includes(','))
//             {
//                 array1 = needed.split(',')
//                 words[i] = ''
//                 array1.forEach(element => {
//                     element = element.toLowerCase()
//                     words[i] += `<label class="input" answer="${element}"></label>`
//                 });
//             }
//             else
//             {
//                 needed = needed.toLowerCase()
//                 words[i] = `<label class="input" answer="${needed}"></label>`
//             }
//         }
//         if(words[i].includes('--text:'))
//         {
    //             let needed = words[i].slice(7)
    //             if(needed.includes('_'))
    //             {
        //                 let array1 = without(needed, '_')
//                 words[i] = `<i class="text">${array1}</i>`
//             }
//             else
//             {
    //                 words[i] = `<i class="text">${needed}</i>`
    //             }

    //         }
    //         if(words[i].includes('--check'))
    //         {
//             words[i] = `<button type="button" class="btn btn-primary" disabled id="check">Перевірити</button>`
//         }
//         if(words[i].includes('--textstart'))
//         {
//             words[i] = `<p>`
    //         }
    //         if(words[i].includes('--textend'))
    //         {
        //             words[i] = `</p>`
//         }
//         if(words[i].includes('//'))
//         {
    //             words[i] = `<br>`
    //         }
    //     }
    //     overview.innerHTML = ''
//     hidden.value = ''
//     words.forEach(word => {
//         overview.innerHTML += word+' '
//         hidden.value += word+' '
//     });
// })

// function without(str, without)
// {
//     let array1 = str.split(without)
//     let returnable = ''
//     array1.forEach(element => {
//         returnable += element+' '
//     });
//     return returnable
// }

// const items = document.querySelectorAll('.answer')
// const inputs = document.querySelectorAll('.input')
// let check = document.querySelector('#check')
// let count = 0;
// // let hidden = document.querySelector('#hidden')
// let hiddenButton = document.querySelector('#hidden_button')
// let rightAnswers = document.querySelector('#right_answers')
// let rightCount = 0;

// check.addEventListener('click', function (element) {
    //     inputs.forEach(element => {

        //     })
//     for (let i = 0; i < inputs.length; i++) {
//         let childValue = inputs[i].children[0].attributes.value.value
//         let answer = inputs[i].attributes.answer.value
//         if(childValue == answer)
//         {
    //             inputs[i].style.backgroundColor = 'green'
    //             rightCount++

    //         }
//         else
//         {
    //             inputs[i].style.backgroundColor = 'red'
    //         }
//         hidden.innerHTML += `<input name="answer${i+1}" value="${childValue}"> <input name="question${i+1}" value="${answer}">`
//     }
//     let percentage = (100 * rightCount) / inputs.length
//     rightAnswers.innerHTML = `Правильних відповідей: ${percentage}%`
//     hidden.innerHTML += `<input name="percentage" value="${percentage}">`
//     // setTimeout(function () { hiddenButton.click() }, 3000);
// })

// function clickSubmit()
// {
//     hiddenButton.click()
// }

// items.forEach(item => {
    //     item.addEventListener('dragstart', dragStart)
//     item.addEventListener('dragend', dragEnd)
// });

// let dragItem = null;

// function dragStart() {
    //     // console.log('drag started');
    //     dragItem = this;
    //     setTimeout(() => this.className = 'invisible', 0)
// }
// function dragEnd() {
//     // console.log('drag ended');
//   	this.className = 'answer'
//   	dragItem = null;
// }
// function dragOver(e) {
//   e.preventDefault()
// //   console.log('drag over');
// }
// function dragEnter() {
    //     // console.log('drag entered');
    // }
    // function dragLeave() {
        //     count = 0
        // }
        // function dragDrop() {
//     // console.log('drag dropped');
//     this.append(dragItem);
//     count = 0
//     inputs.forEach(element => {
    //         if(element.children.length == 1)
    //         {
        //             count++
//         }
//         else
//         {
    //             count--
    //         }
    //     })
    //     if(count == items.length)
//     {
    //         check.removeAttribute('disabled')
    //     }
    //     if(count !== items.length)
    //     {
        //         check.setAttribute('disabled', '')
//     }
//     inputs.forEach(element => {
    //         if(element.children.length == 1)
    //         {
        //         }
        //         else
        //         {
            //             count--
            //         }
//     })
// }

// inputs.forEach(input => {
//     input.addEventListener('dragover', dragOver);
//     input.addEventListener('dragenter', dragEnter);
//     input.addEventListener('dragleave', dragLeave);
//     input.addEventListener('drop', dragDrop);
// });
// функції для перетягування

    // const items = document.querySelectorAll('.answer')
    // const inputs = document.querySelectorAll('.input')

    // items.forEach(item => {
    //     item.addEventListener('dragstart', dragStart)
    //     item.addEventListener('dragend', dragEnd)
    // });

    // let dragItem = null;

    // function dragStart() {
    //     // console.log('drag started');
    //     dragItem = this;
    //     setTimeout(() => this.className = 'invisible', 0)
    // }
    // function dragEnd() {
    //     // console.log('drag ended');
    //       this.className = 'answer'
    //       dragItem = null;
    // }
    // function dragOver(e) {
    //   e.preventDefault()
    // //   console.log('drag over');
    // }
    // function dragEnter() {
    //     // console.log('drag entered');
    // }
    // function dragLeave() {
    //     count = 0
    // }
    // function dragDrop() {
    //     // console.log('drag dropped');
    //     this.append(dragItem);
    // }

    // inputs.forEach(input => {
    //     input.addEventListener('dragover', dragOver);
    //     input.addEventListener('dragenter', dragEnter);
    //     input.addEventListener('dragleave', dragLeave);
    //     input.addEventListener('drop', dragDrop);
    // });

</script>

@endsection
