let declared = document.querySelector('.declared')
let editing = document.querySelector('.editing')

let task_update = document.querySelector('.task_update')

task_update.addEventListener('click', function () {

    let task_body = document.querySelector('.task_body')

    let body = ``

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

    let answers = document.querySelectorAll('.bold')

    let to_shuffle = []

    answers.forEach(answer => {

        to_shuffle.push(answer.innerHTML)

    });

    to_shuffle = shuffle(to_shuffle)
    to_shuffle = shuffle(to_shuffle)

    body += `<div class="answers_div border">`

    body += `
        <h2 class="m-0 p-0" style="color: black;">${tr_answers}</h2>
        <p class="answers_hint small text-muted m-0 p-0">${tr_drag_and_drop_translations_into_the_relevant_cells}</p>
        <div class="mt-3">
            <div class="answers">
    `

    to_shuffle.forEach(answer => {

        body += `<p class="answer" draggable="true">${answer}</p>`

    });

    body += `
            </div>
        </div>
    </div>
    `

    body += `<div class="text_div mt-3" style="display: flex; flex-wrap: wrap; justify-content: center; column-gap: 10px; row-gap: 5px; width: 80%; margin: 0 auto; margin-bottom: 50px;">`

    let written_text = document.querySelector('.fill_gaps_add').innerHTML

    body += `<p class="m-0" style="height: 30px; font-size: 20px; padding-top: 5px;">`

    written_text = written_text.replaceAll('<div>', '<p class="m-0" style="height: 30px; font-size: 20px; padding-top: 5px;">')
    written_text = written_text.replaceAll('</div>', '</p>')

    body += written_text

    answers.forEach(answer => {

        body = body.replace(answer.outerHTML, `</p><label class="input" answer="${answer.innerText}"></label><p class="m-0" style="height: 30px; font-size: 20px; padding-top: 5px;">`)

    });


    body += `</p>`

    body += `</div>`

    let ov = document.querySelector('.ov')
    ov.innerHTML = body

    let ps = ov.querySelectorAll('p')
    ps.forEach(p => {

        if(p.innerText.length <= 1)
        {

            p.remove()

        }

    });

    task_body.value = ov.innerHTML

    let submitik = document.createElement('button')
    submitik.setAttribute('type', 'submit')
    document.querySelector('.hidden').appendChild(submitik)

    submitik.click()

})

// EDITING TASK NAME
let name = document.querySelector('.name')
let name_hint = document.querySelector('.name_hint')
let task_name = document.querySelector('.task_name')

name.addEventListener('keyup', function () {

    if(name.innerText.length > 2)
    {

        task_name.value = name.innerText
        name_hint.classList.remove('text-danger')
        name_hint.classList.add('text-muted')
        name_hint.innerText = tr_click_to_change_task_name

    } else
    {

        name_hint.classList.remove('text-muted')
        name_hint.classList.add('text-danger')
        name_hint.innerText = tr_task_name_cannot_be_so_short

    }

    check_task()

})

function check_task()
{
    let bolds = document.querySelectorAll('.bold')
    let fill_gaps_hint = document.querySelector('.fill_gaps_hint')

    let image = document.querySelector('.add_image')

    if(bolds.length >= 3)
    {

        if(image.children.length !== 1 && image.children.length !== 2)
        {

            let image_hint = image.children[1]

            if(image.children[2].style.backgroundImage == 'url("https://english/storage/icons/empty.jpg")')
            {

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

                task_update.setAttribute('hidden', '')

            } else
            {

                image_hint.innerHTML = `${tr_to_delete_picture_click_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`
                deletes = document.querySelectorAll('.image_delete')

                deletes.forEach(deletee => {
                    deletee.addEventListener('click', image_delete_f)
                });

                if(name.innerText.length > 2)
                {

                    task_update.removeAttribute('hidden')

                } else
                {

                    task_update.setAttribute('hidden', '')

                }

            }

        } else
        {

            if(name.innerText.length > 2)
            {

                task_update.removeAttribute('hidden')

            } else
            {

                task_update.setAttribute('hidden', '')

            }

        }

    } else
    {

        task_update.setAttribute('hidden', '')

    }

}

// IMAGE

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
    image_upload_p.style.cssText = `padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
    image_upload_p.innerText = tr_upload_from_computer

    image_upload.appendChild(image_upload_p)

    // ADD IMAGE URL DIV
    let image_url = document.createElement('div')
    image_url.setAttribute('role', 'button')
    image_url.style.cssText = `display: table; background-image: url('${bg_image_url}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

    this.appendChild(image_url)

    let image_url_p = document.createElement('p')
    image_url_p.style.cssText = `padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
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
    abc_image_p.style.cssText = 'padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;'
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

// CREATING FROM DECLARED

function create()
{

    let fill_gaps = document.createElement('div')
    fill_gaps.classList.add('fill_gaps')

    editing.appendChild(fill_gaps)

    if(declared.children.length == 3)
    {

        let declared_image = declared.children[0].style.backgroundImage

        let add_image_parent = document.createElement('div')
        add_image_parent.style.cssText = `padding-top: 30px;`

        fill_gaps.appendChild(add_image_parent)

        let add_image_div = document.createElement('div')
        add_image_div.classList.add('add_image')
        add_image_div.setAttribute('role', 'button')
        add_image_div.style.cssText = `display: table; margin: 0px auto; border-radius: 10px; color: black;`

        add_image_parent.appendChild(add_image_div)

        let add_image_input = document.createElement('input')
        add_image_input.classList.add('form-control')
        add_image_input.classList.add('text-center')
        add_image_input.setAttribute('placeholder', tr_paste_image_url)
        add_image_input.style.cssText = `font-size: 20px; padding: 10px 20px;`
        add_image_input.value = declared_image.slice(5, declared_image.length-2)

        add_image_div.appendChild(add_image_input)

        let add_image_hint = document.createElement('p')
        add_image_hint.classList.add('small')
        add_image_hint.classList.add('text-muted')
        add_image_hint.classList.add('p-0')
        add_image_hint.classList.add('m-0')
        add_image_hint.innerHTML = `${tr_to_delete_picture_click_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`

        add_image_div.appendChild(add_image_hint)

        let add_image_preview = document.createElement('div')
        add_image_preview.classList.add('img')
        add_image_preview.style.cssText = `margin: 0px auto; width: 450px; height: 250px; background-image: ${declared_image}; background-position: center center; background-size: cover; background-repeat: no-repeat;`

        add_image_div.appendChild(add_image_preview)

        let add_image_test = document.createElement('img')
        add_image_test.style.cssText = `display: none;`

        add_image_div.appendChild(add_image_test)

        add_image_input.addEventListener('keyup', url_image_edit_f)

        deletes = document.querySelectorAll('.image_delete')

        deletes.forEach(deletee => {
            deletee.addEventListener('click', image_delete_f)
        });

    } else
    {

        let add_image_div = document.createElement('div')
        add_image_div.style.cssText = `padding-top: 30px;`

        fill_gaps.appendChild(add_image_div)

        let add_image = document.createElement('div')
        add_image.classList.add('add_image')
        add_image.setAttribute('role', 'button')
        add_image.style.cssText = `display: table; margin: 0 auto; background-image: url('{{ asset('storage/icons/bg.jpg') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

        add_image_div.appendChild(add_image)

        add_image_p = document.createElement('p')
        add_image_p.style.cssText = `padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
        add_image_p.innerText = tr_add_image

        add_image.appendChild(add_image_p)

        add_image.addEventListener('click', add_image_f)

    }

    let declared_text = ''
    declared_text += declared.querySelector('.text_div').innerHTML

    declared.remove()

    // MAKING AND REMOVING BOLD TEXT
    let buttons_div = document.createElement('div')
    buttons_div.style.cssText = `padding-top: 30px; height: 76px;`

    fill_gaps.appendChild(buttons_div)

    let make_bold = document.createElement('div')
    make_bold.classList.add('make_bold')
    make_bold.setAttribute('hidden', '')
    make_bold.setAttribute('role', 'button')
    make_bold.style.cssText = `background-color: #98CCFC; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;`

    buttons_div.appendChild(make_bold)

    let make_bold_p = document.createElement('p')
    make_bold_p.style.cssText = `padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
    make_bold_p.innerText = tr_make_highlighted_answer

    make_bold.appendChild(make_bold_p)

    let remove_bold = document.createElement('div')
    remove_bold.classList.add('remove_bold')
    remove_bold.setAttribute('hidden', '')
    remove_bold.setAttribute('role', 'button')
    remove_bold.style.cssText = `background-color: #FF8D8D; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px; color: black;`

    buttons_div.appendChild(remove_bold)

    let remove_bold_p = document.createElement('p')
    remove_bold_p.style = `padding: 7px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
    remove_bold_p.innerText = tr_delete_answer

    remove_bold.appendChild(remove_bold_p)

    // TEXTAREA
    let fill_gaps_add = document.createElement('div')
    fill_gaps_add.classList.add('fill_gaps_add')
    fill_gaps_add.setAttribute('contenteditable', 'true')
    fill_gaps_add.style.cssText = `padding: 10px; width: 90%; margin: 0 auto; border: 1px solid black; border-radius: 15px; margin-top: 20px; height: 350px;`

    fill_gaps.appendChild(fill_gaps_add)

    // TEXTAREA HINT
    let fill_gaps_hint = document.createElement('p')
    fill_gaps_hint.classList.add('fill_gaps_hint')
    fill_gaps_hint.classList.add('small')
    fill_gaps_hint.classList.add('text-muted')
    fill_gaps_hint.classList.add('p-0')
    fill_gaps_hint.classList.add('m-0')
    fill_gaps_hint.innerHTML = `${tr_in_this_task_you_need_to_write} <br> ${tr_we_recommend_inserting_answers_after} <span class="text-primary" style="text-decoration: underline; cursor: pointer;" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="${tr_in_this_task_you_need_3_places}">${tr_read_more_here}</span>`

    fill_gaps.appendChild(fill_gaps_hint)

    // WORK WITH DECLARED TEXT

    declared_text = declared_text.replaceAll('<p class="m-0" style="height: 30px; font-size: 20px; padding-top: 5px;">', '')
    declared_text = declared_text.replaceAll('</p>', '')

    fill_gaps_add.innerHTML = declared_text

    let answers = document.querySelectorAll('.input')
    let new_ans

    for (let i = 0; i < answers.length; i++) {

        new_ans = `<b class="bold">${answers[i].attributes.answer.value}</b>`
        fill_gaps_add.innerHTML = fill_gaps_add.innerHTML.replace(answers[i].outerHTML, new_ans)

    }

    fill_gaps_add.addEventListener('keyup', check_task)

    const popoverTriggerListt = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverListt = [...popoverTriggerListt].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

}

create()

let fill_gaps_add = document.querySelector('.fill_gaps_add')

let selected
let sel
let type

let make_bold = document.querySelector('.make_bold')
let remove_bold = document.querySelector('.remove_bold')

make_bold.addEventListener('click', make_bold_f)
remove_bold.addEventListener('click', remove_bold_f)

function make_bold_f()
{

    fill_gaps_add.innerHTML = fill_gaps_add.innerHTML.replace(sel, `<b class="bold">${sel}</b>`)

    make_bold.setAttribute('hidden', '')

    check_task()

}

function remove_bold_f()
{

    if(selected.type == 'Caret')
    {

        selected = selected.baseNode.parentElement
        let parent = selected.parentElement

        parent.innerHTML = parent.innerHTML.replace(selected.outerHTML, selected.innerText)

    } else
    {

        fill_gaps_add.innerHTML = fill_gaps_add.innerHTML.replace(sel.outerHTML, sel.innerText)

    }

    remove_bold.setAttribute('hidden', '')

    check_task()

}

document.addEventListener("selectionchange", get_selected);

function get_selected() {

    if (window.getSelection) {
        selected = window.getSelection();
    } else if (window.document.getSelection) {
        selected = window.document.getSelection();
    } else if (window.document.selection) {
        selected = window.document.selection.createRange().text;
    }

    // ADDING AND DELETING
    if(selected.anchorNode.parentElement.classList.contains('bold') || selected.anchorNode.parentElement.classList.contains('fill_gaps_add') || selected.anchorNode.parentElement.parentElement.classList.contains('fill_gaps_add'))
    {

        if(selected.type == 'Range')
        {

            let txt = ''
            txt += selected

            if(selected.anchorNode.parentElement.tagName == 'DIV' && selected.focusNode.parentElement.tagName == 'DIV' && selected.focusNode.nextSibling == selected.anchorNode.nextSibling)
            {

                sel = selected
                make_bold.removeAttribute('hidden')
                remove_bold.setAttribute('hidden', '')

            } else
            {

                if(selected.anchorNode.parentElement.tagName == 'B')
                {

                    sel = selected.anchorNode.parentElement

                } else if(selected.focusNode.parentElement.tagName == 'B')
                {

                    sel = selected.focusNode.parentElement

                } else if(selected.focusNode.nextSibling !== selected.anchorNode.nextSibling)
                {

                    if(txt.includes(selected.anchorNode.nextElementSibling.innerText))
                    {

                        sel = selected.anchorNode.nextElementSibling

                    }
                    if(txt.includes(selected.focusNode.nextElementSibling.innerText))
                    {

                        sel = selected.focusNode.nextElementSibling

                    }

                }
                remove_bold.removeAttribute('hidden')
                make_bold.setAttribute('hidden', '')

            }

        }


        // DELETING
        if(selected.type == 'Caret')
        {

            if(selected.baseNode.parentElement.tagName == 'B' || selected.baseNode.parentElement.classList.contains('fill_gaps_add'))
            {

                if(selected.baseNode.parentElement.tagName == 'B')
                {

                    remove_bold.removeAttribute('hidden')
                    make_bold.setAttribute('hidden', '')

                } else
                {

                    make_bold.setAttribute('hidden', '')
                    remove_bold.setAttribute('hidden', '')

                }

            } else
            {

                make_bold.setAttribute('hidden', '')
                remove_bold.setAttribute('hidden', '')

            }

        }

    } else
    {

        make_bold.setAttribute('hidden', '')
        remove_bold.setAttribute('hidden', '')

    }

}
