let finish = document.querySelector('.finish')
let deletes

finish.parentElement.style.paddingBottom = '200px'

finish.addEventListener('click', function () {

    let trs = document.querySelectorAll(".tr")
    let translations = document.querySelectorAll(".translation")
    let body = ''

    // PARENT DIV
    body += `<div style="font-family: 'Inter', sans-serif;">`

    if(document.querySelector('.add_text').style.backgroundColor !== 'rgb(130, 255, 132)')
    {

        body += `<h3 class="additional_text p-0 m-0 pt-4">${document.querySelector('.add_text').innerText}</h3>`

    }

    // IMAGE IF ISSET
    if(document.querySelector('.add_image').children.length !== 1)
    {

        if(document.querySelector('.add_image').children[0].classList.contains('text-center'))
        {

            let immg = document.querySelector('.add_image').querySelector('input').value
            body += `<div class="image" style="width: 550px; height: 320px; margin: 15px auto; background-image: url('${immg}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>`

        } else
        {

            let name_value = document.querySelector('.add_image').querySelector('input').attributes.name.value
            let name_length = name_value.length
            if(name_length == 9)
            {

                let num = name_value.slice(name_length-2, name_length-1)
                body += `<div class="image" style="width: 550px; height: 320px; margin: 15px auto; background-image: url('change${num}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>`

            } else
            {

                let num = name_value.slice(name_length-3, name_length-1)
                body += `<div class="image" style="width: 550px; height: 320px; margin: 15px auto; background-image: url('change${num}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>`

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

        let add_text = document.querySelector('.add_text')
        let add_text_hint = document.querySelector('.add_text_hint')

        if(add_text.style.backgroundColor !== 'rgb(130, 255, 132)')
        {

            let changed = false
            let long = false

            if(add_text.innerText == tr_click_to_edit)
            {

                add_text_hint.classList.replace('text-muted', 'text-danger')
                add_text_hint.innerHTML = `${tr_change_text_content_or_delete_it} <span style="cursor: pointer; text-decoration: underline;" class="add_text_delete text-danger"><b>${tr_buttonchik}</b></span>`

                document.querySelector('.add_text_delete').addEventListener('click', delete_text_f)

            } else
            {

                changed = true

            }

            if(add_text.innerText.length < 4)
            {

                add_text_hint.classList.replace('text-muted', 'text-danger')
                add_text_hint.innerHTML = `${tr_text_cannot_be_so_short} <span style="cursor: pointer; text-decoration: underline;" class="add_text_delete text-danger"><b>${tr_buttonchik}</b></span>`

                document.querySelector('.add_text_delete').addEventListener('click', delete_text_f)

            } else
            {

                long = true

            }

            if(image_has)
            {

                if(image_good && translations.length >= 2 && changed && long)
                {

                    finish.removeAttribute('hidden')

                } else
                {

                    finish.setAttribute('hidden', '')

                }

            } else
            {

                if(translations.length >= 2 && changed && long)
                {

                    finish.removeAttribute('hidden')

                } else
                {

                    finish.setAttribute('hidden', '')

                }

            }

        } else
        {

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
    this.children[0].innerText = tr_click_to_edit

    add_image.parentElement.style.paddingTop = '20px'
    add_text_hint.innerHTML = `${tr_to_delete_additional_text} <span style="cursor: pointer; text-decoration: underline;" class="add_text_delete text-danger"><b>${tr_buttonchik}</b></span>`

    document.querySelector('.add_text_delete').addEventListener('click', delete_text_f)

    this.addEventListener('keydown', prevent_deleting)
    this.addEventListener('keyup', edit_text_f)

    this.removeEventListener('click', add_text_f)

    check_task()

}

function edit_text_f()
{

    if(this.innerText.length < 4)
    {

        add_text_hint.classList.replace('text-muted', 'text-danger')
        add_text_hint.innerHTML = `${tr_text_cannot_be_so_short} <span style="cursor: pointer; text-decoration: underline;" class="add_text_delete text-danger"><b>${tr_buttonchik}</b></span>`

        document.querySelector('.add_text_delete').addEventListener('click', delete_text_f)

    } else
    {

        add_text_hint.classList.replace('text-danger', 'text-muted')
        add_text_hint.innerHTML = `${tr_to_delete_additional_text} <span style="cursor: pointer; text-decoration: underline;" class="add_text_delete text-danger"><b>${tr_buttonchik}</b></span>`

        document.querySelector('.add_text_delete').addEventListener('click', delete_text_f)

    }

    check_task()

}

function delete_text_f()
{

    add_text_hint.innerHTML = ''

    add_text.style.backgroundColor = `rgb(130, 255, 132)`
    add_text.style.color = 'black'
    add_text.setAttribute('role', 'button')
    add_text.removeAttribute('contenteditable')

    add_text.children[0].innerText = tr_add_text

    add_image.parentElement.style.paddingTop = '30px'

    add_text.addEventListener('click', add_text_f)

    check_task()

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
