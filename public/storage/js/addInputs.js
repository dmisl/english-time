// добавлення і зміна полей

let input_edit = document.querySelectorAll('.input_edit')
let tasks = document.querySelectorAll('.task')
let finish = document.querySelector('.finish')

function inputs_check()
{
    let words = document.querySelectorAll('.word')
    let count = 0
    for (let i = 0; i < words.length; i++) {
        if (words[i].innerText == tr_enter_the_word_for_translation || words[i].innerText == ``)
        {
            words[i].style.color = 'red'
        } else
        {
            count++
        }
    }
    if(count == document.querySelectorAll('.answer').length)
    {
        input_add.setAttribute('hidden', '')
        finish.removeAttribute('hidden')
        finish.addEventListener('click', function () {
            document.querySelectorAll('.input_edit').forEach(e => {
                e.setAttribute('hidden', '')
            });
            finish.setAttribute('hidden', '')
            finish.outerHTML += `
                <div class="d-flex mx-auto" style="width: 70%">
                    <div class="bg-primary bg-gradient text-light mx-auto show" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;" data-bs-toggle="modal" data-bs-target="#showModal">
                        <h5 class="py-2" >${tr_view_the_result}</h5>
                    </div>
                    <div class="bg-success bg-gradient text-light mx-auto create" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                        <h5 class="py-2" >${tr_create_a_task}</h5>
                    </div>
                </div>
                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">${tr_view_the_final_result}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">${tr_close_view}</button>
                        </div>
                        </div>
                    </div>
                </div>
            `
            text += `
            <table class="table table-dark table-bordered mx-auto" style="width: 80%;">
                    <tr>
                        <td style="width: 50%">${tr_word}</td>
                        <td style="width: 50%">${tr_translation}</td>
                    </tr>
                </table>
                <table class="table table-primary table-bordered mt-2 mb-3 mx-auto" style="width: 80%;">
            `
            let answerss = document.querySelectorAll('.answer')
            let wordss = document.querySelectorAll('.word')
            for (let index = 0; index < words.length; index++) {
                text += `
                    <tr>
                        <td style="width: 50%">
                            <h5 class="word">${wordss[index].innerText}</h5>
                        </td>
                        <td style="width: 50%">
                            <label class="input" answer="${answerss[index].attributes.value.value}"></label>
                        </td>
                    </tr>
                `
            }
            text += `</table>
            <button type="button" disabled class="btn btn-primary" id="check">${tr_check}</button>`

            task_body.setAttribute('value', text)

            let show = document.querySelector('.show')
            let create = document.querySelector('.create')

            show.addEventListener('click', function () {
                let modal_body = document.querySelector('.modal-body')
                modal_body.innerHTML = text
            })

            document.querySelector('.hidden').innerHTML += `<button type="submit" class="task_submit"></button>`

            create.addEventListener('click', function () {
                document.querySelector('.task_submit').click()
            })
        })
    }
}

for (let i = 0; i < input_edit.length; i++) {
    input_edit[i].addEventListener('click', function () {
        input_add.setAttribute('hidden', '')
        input_editing(this, i)
        for (let a = 0; a < input_edit.length; a++) {
            if(a == i)
            {

            } else
            {
                input_edit[a].setAttribute('hidden', '')
            }
        }
    })
}

function input_editing(input_edit, i)
{
    input_add.setAttribute('hidden', '')
    let words = document.querySelectorAll('.word')
    let inputss = document.querySelectorAll('.input')
    let word_text = words[i].innerText
    let input_answer = inputss[i].innerText
    words[i].outerHTML = `
        <td style="width: 47%">
            <input id="word_edit" value="${word_text}" type="text" placeholder="${tr_word}" class="form-control text-center">
        </td>
    `
    inputss[i].outerHTML = `
        <td style="width: 47%">
            <input id="translation_edit" value="${input_answer}" type="text" placeholder="${tr_translation}" class="form-control text-center">
        </td>
    `
    input_edit.outerHTML = `
        <img id="input_accept_changes" style="height: 38px; cursor:pointer;" src="${accept_icon}" alt="">
    `
    // asd
    let accept = document.querySelector('#input_accept_changes')
    // NIE PRACUJE
    words[i].addEventListener('keyup', function () {
        if(inputss[i].value.length >= 1 && words[i].value.length >= 1)
        {
            accept.removeAttribute('hidden')
        } else
        {
            accept.setAttribute('hidden', '')
        }
    })
    inputss[i].addEventListener('keyup', function () {
        if(inputss[i].value.length >= 1 && words[i].value.length >= 1)
        {
            accept.removeAttribute('hidden')
        } else
        {
            accept.setAttribute('hidden', '')
        }
    })
    accept.addEventListener('click', function () {
        input_edit_accept(accept, i)
        if(document.querySelectorAll('.input').length == document.querySelectorAll('.answer').length)
        {
            input_add.setAttribute('hidden', '')
        } else
        {
            input_add.removeAttribute('hidden')
        }
    })

}

function input_edit_accept(input_edit, i) {
    if(document.querySelectorAll('.input').length == document.querySelectorAll('.answer').length)
    {
        input_add.setAttribute('hidden', '')
    } else
    {
        input_add.removeAttribute('hidden')
    }
    for (let a = 0; a < input_edit.length; a++) {
        if(a == i)

        {
        } else
        {
            input_edit[a].removeAttribute('hidden')
        }
    }
    let word_edit = document.querySelector('#word_edit')
    let translation_edit = document.querySelector('#translation_edit')
    let word_edit_value = word_edit.value
    let translation_edit_value = translation_edit.value
    word_edit.outerHTML = `
        <h5 class="word">${word_edit_value}</h5>
    `
    translation_edit.outerHTML = `
        <label class="input" answer="${translation_edit_value}"><h3>${translation_edit_value}</h3></label>
    `
    input_edit.outerHTML = `
    <img class="mt-1 input_edit" style="height: 38px; cursor:pointer;" src="${edit_icon}" alt="">
    `
    let new_input_edit = document.querySelectorAll('.input_edit')
    new_input_edit[i].addEventListener('click', function () {
        input_editing(new_input_edit[i], i)
    })
    for (let x = 0; x < new_input_edit.length; x++) {
        new_input_edit[x].removeAttribute('hidden')
    }

    inputs_check();

}

let inputss = document.querySelector('.inputs')

let input_translation = document.querySelector('.input_translation')
let input_word = document.querySelector('.input_word')

let input_add = document.querySelector('.input_add')
let input_accept = document.querySelector('.input_accept')

let input_adding = document.querySelector('.input_adding')

input_accept.addEventListener('click', function () {
    input_add.removeAttribute('hidden')
    document.querySelectorAll('.input_edit').forEach(e => {
        e.removeAttribute('hidden')
    })
    let needed = input_translation.value.toLowerCase()
    inputss.innerHTML += `
        <tr>
            <td style="width: 47%;">
                <h3 class="word">${input_word.value}</h3>
            </td>
            <td style="width: 47%;">
                <label class="input" answer="${needed}"><h3>${input_translation.value}</h3></label>
            </td>
            <td style="width: 6%">
                <img class="mt-1 input_edit" style="height: 38px; cursor:pointer;" src="${edit_icon}" alt="">
            </td>
        </tr>
    `
    input_translation.value = ''
    input_word.value = ''
    input_adding.setAttribute('hidden', '')
    let input_edits = document.querySelectorAll('.input_edit')
    for (let i = 0; i < input_edits.length; i++) {
        input_edits[i].addEventListener('click', function () {
            input_editing(this, i)
        })
    }

    inputs_check()
})

input_add.addEventListener('click', function () {
    document.querySelectorAll('.input_edit').forEach(e => {
        e.setAttribute('hidden', '')
    })
    input_add.setAttribute('hidden', '')
    input_adding.removeAttribute('hidden')
})

