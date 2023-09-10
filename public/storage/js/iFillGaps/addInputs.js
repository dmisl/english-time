// adding inputs

let text = ''

let add_inputs = document.querySelector('.add_inputs')

// div, where we write text
let editor = document.querySelector('.editor')

// button to make selected text bold
let bold = document.querySelector('.bold')

// button to unbold selected text
let unbold = document.querySelector('.unbold')

// button to finish editing task
let finish = document.querySelector('.finish')

// inputs which we`ll use in future
let inputs = []

// function which`ll return us selected text

document.addEventListener("selectionchange", () => {
    if (window.getSelection) {
        selected = window.getSelection();
    } else if (window.document.getSelection) {
        selected = window.document.getSelection();
    } else if (window.document.selection) {
        selected = window.document.selection.createRange().text;
    }
    text += selected
    if(text.length >= 1)
    {
        if(editor.innerHTML.includes(`<b>${text}</b>`))
        {
            unbold.removeAttribute('hidden')
            bold.setAttribute('hidden', '')

            unbold.addEventListener('click', un_bold)
        } else
        {
            bold.removeAttribute('hidden')
            unbold.setAttribute('hidden', '')

            bold.addEventListener('click', make_bold)
        }
    } else
    {
        unbold.setAttribute('hidden', '')
        bold.setAttribute('hidden', '')
    }

    text = ''
});

// function to make selected text bold

function make_bold()
{
    if (window.getSelection) {
        selected = window.getSelection();
    } else if (window.document.getSelection) {
        selected = window.document.getSelection();
    } else if (window.document.selection) {
        selected = window.document.selection.createRange().text;
    }
    text += selected
    editor.innerHTML = editor.innerHTML.replace(text, `<b>${text}</b>`)
    inputs.push(`<b>${text}</b>`)
    text = ''

    bold.setAttribute('hidden', '')

    if(inputs.length >= 1)
    {
        finish.removeAttribute('hidden')
    } else
    {
        finish.setAttribute('hidden', '')
    }
}

// function unbold selected text

function un_bold()
{
    if (window.getSelection) {
        selected = window.getSelection();
    } else if (window.document.getSelection) {
        selected = window.document.getSelection();
    } else if (window.document.selection) {
        selected = window.document.selection.createRange().text;
    }
    text += selected
    let index = inputs.indexOf(`<b>${text}</b>`)
    inputs.splice(index, 1)

    editor.innerHTML = editor.innerHTML.replace(`<b>${text}</b>`, text)
    text = ''

    unbold.setAttribute('hidden', '')

    if(inputs.length >= 1)
    {
        finish.removeAttribute('hidden')
    } else
    {
        finish.setAttribute('hidden', '')
    }
}

// function to finish editing task

finish.addEventListener('click', function () {
    let outerHTML = '<p><i class="fi_text">'
    outerHTML += editor.innerHTML
    let needed = ''
    inputs.forEach(e => {
        needed = e
        needed = needed.replace('<b>', '')
        needed = needed.replace('</b>', '')
        needed = needed.toLocaleLowerCase()
        if(needed.slice(-1) == ' ')
        {
            needed = needed.slice(0, -1)
        }
        if(needed.charAt(0) == ' ')
        {
            needed = needed.slice(1)
        }
        needed = `</i><input class="fi_input" type="text" answer="${needed}"><i class="fi_text">`
        outerHTML = outerHTML.replace(e, needed)
        needed = ''
    });
    outerHTML += `</i></p>`

    result += outerHTML
    result += `<button disabled type="button" class="btn btn-primary mt-3" id="check">Перевірити</button>`
    document.querySelector('.task_body').setAttribute('value', result)

    add_inputs.outerHTML = `
        <div style="height: 38px;"></div>
        <div class="add_inputs mx-auto" style="width: 80%; user-select: none;">
            <div class="mx-auto editor mt-2" style="height: 300px; border: 1px solid black; border-radius: 20px;">
                ${editor.innerHTML}
            </div>
        </div>
    `
    finish.outerHTML = `
        <div class="d-flex mx-auto mt-3" style="width: 70%">
            <div class="bg-info mx-auto show" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;" data-bs-toggle="modal" data-bs-target="#showModal">
                <h5 class="py-2">Переглянути результат</h5>
            </div>
            <div class="bg-success mx-auto create" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                <h5 class="py-2">Створити завдання</h5>
            </div>
            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Перегляд фінального результату</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ${result}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити перегляд фінального результата</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `

    let create = document.querySelector('.create')
    create.addEventListener('click', function () {
        document.querySelector('.task_submit').click()
    })
})