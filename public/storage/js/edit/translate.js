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
                hint.innerHTML = `Щоб видалити картинку нажміть цю <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`

                deletes = document.querySelectorAll('.image_delete')

                deletes.forEach(deletee => {

                    deletee.addEventListener('click', image_delete_f)

                });

                check_task()

            }
            test_img.onerror = function () {

                img.style.cssText = `margin: 0 auto; width: 450px; height: 250px; background-image: url('${empty_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
                dis.value = ''
                dis.setAttribute('placeholder', 'Вставте поправний URL-адрес')
                dis.setAttribute('status', 2)

                check_task()

            }

        } else
        {

            img.style.cssText = `margin: 0 auto; width: 450px; height: 250px; background-image: url('${empty_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
            dis.value = ''
            dis.setAttribute('placeholder', 'Вставте поправний URL-адрес')
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
    abc_image_p.innerText = 'Додати картинку'

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
    image_hint.innerHTML = `Щоб видалити картинку нажміть цю <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`

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
    add_image_input.setAttribute('placeholder', 'Вставте URL-адрес картинки')

    add_image_input.focus()

    parent.appendChild(add_image_input)

    let add_image_hint = document.createElement('p')
    add_image_hint.classList.add('small')
    add_image_hint.classList.add('text-muted')
    add_image_hint.classList.add('p-0')
    add_image_hint.classList.add('m-0')
    add_image_hint.innerHTML = `Щоб видалити картинку нажміть цю <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`

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

let editing = document.querySelector('.editing')

// SHOWING CURRENT TASK
// --------------------
editing.innerHTML = `
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
`

let declared = document.querySelector('.declared')
let declared_words = declared.querySelectorAll('.word')
let declared_answers = declared.querySelectorAll('.input')

if(declared.children[0].children.length == 3)
{

    let declared_image = declared.children[0].children[0].style.backgroundImage

    let add_image_div = document.createElement('div')
    add_image_div.style.cssText = `padding-top: 30px;`

    editing.querySelector('.translate').insertBefore(add_image_div, editing.querySelector('.translate').children[0])

    let add_image = document.createElement('div')
    add_image.classList.add('add_image')
    add_image.style.cssText = `display: table; margin: 0px auto; border-radius: 10px; color: black;`

    add_image_div.appendChild(add_image)

    let add_image_input = document.createElement('input')
    add_image_input.classList.add('form-control')
    add_image_input.classList.add('text-center')
    add_image_input.setAttribute('placeholder', 'Вставте URL-адрес картинки')
    add_image_input.style.cssText = `font-size: 20px; padding: 10px 20px;`
    add_image_input.value = declared_image.slice(5, declared_image.length-2)

    add_image.appendChild(add_image_input)

    let add_image_hint = document.createElement('p')
    add_image_hint.classList.add('small')
    add_image_hint.classList.add('text-muted')
    add_image_hint.classList.add('p-0')
    add_image_hint.classList.add('m-0')
    add_image_hint.innerHTML = `Щоб видалити картинку нажміть цю <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`

    add_image.appendChild(add_image_hint)

    let add_image_preview = document.createElement('div')
    add_image_preview.classList.add('img')
    add_image_preview.style.cssText = `margin: 0px auto; width: 450px; height: 250px; background-image: ${declared_image}; background-position: center center; background-size: cover; background-repeat: no-repeat;`

    add_image.appendChild(add_image_preview)

    let add_image_test = document.createElement('img')
    add_image_test.style.display = 'none'

    add_image.appendChild(add_image_test)

    add_image_input.addEventListener('keyup', url_image_edit_f)

    deletes = document.querySelectorAll('.image_delete')

    deletes.forEach(deletee => {
        deletee.addEventListener('click', image_delete_f)
    });

} else
{

    let add_image_div = document.createElement('div')
    add_image_div.style.cssText = `padding-top: 30px;`

    editing.querySelector('.translate').insertBefore(add_image_div, editing.querySelector('.translate').children[0])

    let add_image = document.createElement('div')
    add_image.classList.add('add_image')
    add_image.setAttribute('role', 'button')
    add_image.style.cssText = `display: table; margin: 0 auto; background-image: url('{{ asset('storage/icons/bg.jpg') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

    add_image_div.appendChild(add_image)

    add_image_p = document.createElement('p')
    add_image_p.style.cssText = `padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
    add_image_p.innerText = `Додати картинку`

    add_image.appendChild(add_image_p)

    add_image.addEventListener('click', add_image_f)

}

for (let i = 0; i < declared_words.length; i++) {

    let new_tr = document.createElement('div')
    new_tr.classList.add('tr')
    new_tr.style.cssText = `width: 500px; margin: 20px auto 0px; position: relative; display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;`

    let new_word = document.createElement('div')
    new_word.setAttribute('contenteditable', 'true')
    new_word.classList.add('word')
    new_word.style.cssText = `color: black; text-align: center; border: 1px solid black; border-radius: 10px; width: 49%; height: 40px; overflow: auto;`

    let new_word_p = document.createElement('p')
    new_word_p.style.cssText = `padding-top: 7px; height: 20px;`
    new_word_p.innerText = declared_words[i].innerText

    new_tr.appendChild(new_word)
    new_word.appendChild(new_word_p)

    let new_translation = document.createElement('div')
    new_translation.setAttribute('contenteditable', 'true')
    new_translation.classList.add('translation')
    new_translation.style.cssText = `color: black; text-align: center; border: 1px solid black; border-radius: 10px; width: 49%; height: 40px; overflow: auto;`

    let new_translation_p = document.createElement('p')
    new_translation_p.style.cssText = `padding-top: 7px; height: 20px;`
    new_translation_p.innerText = declared_answers[i].attributes.answer.value

    new_tr.appendChild(new_translation)
    new_translation.appendChild(new_translation_p)

    document.querySelector('.translate').insertBefore(new_tr, document.querySelector('.add_translation'))

    new_word.addEventListener('keyup', check_task)
    new_translation.addEventListener('keyup', check_task)

    new_word.addEventListener('keydown', prevent_deleting)
    new_translation.addEventListener('keydown', prevent_deleting)

    new_tr.addEventListener('mousedown', start_deleting)
    new_tr.addEventListener('mouseup', stop_deleting)

}
// --------------------
declared.remove()

// ADDING EVENTLISTENERS FOR CURRENT VALUES

// FINISH EDITING
let task_update = document.querySelector('.task_update')

task_update.addEventListener('click', function () {

    let trs = document.querySelectorAll(".tr")
    let translations = document.querySelectorAll(".translation")
    let body = ''

    // PARENT DIV
    body += `<div style="font-family: 'Inter', sans-serif;">`

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
    body += `<h2 class="m-0 p-0">Переклади</h2>`
    body += `<p class="answers_hint small text-muted m-0 p-0">Перетягніть переклади у відповідні комірки</p>`

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
    body += `<td style="font-size: 25px;">Слово</td>`
    body += `<td style="font-size: 25px;">Переклад</td>`
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
        name_hint.innerText = `Нажміть щоб змінити назву завдання`

    } else
    {

        name_hint.classList.remove('text-muted')
        name_hint.classList.add('text-danger')
        name_hint.innerText = `Назва завдання не може бути такою короткою`

    }

    check_task()

})

// CHECKING TASK
function check_task()
{

    let translations = document.querySelectorAll('.tr')
    let count = 0
    let hint = document.querySelector('.adding_hint')

    translations.forEach(parent => {

        let word = parent.querySelector('.word').children[0]
        let translation = parent.querySelector('.translation').children[0]
        let add_translation = document.querySelector('.add_translation')

        if(word.innerText == 'Слово' || translation.innerText == `Translation` || word.innerText.length <= 1 || translation.innerText.length <= 1)
        {

            if(word.innerText == 'Слово' || translation.innerText == `Translation`)
            {

                if(word.innerText == 'Слово')
                {

                    word.parentElement.style.border = `1px solid red`

                } else
                {

                    word.parentElement.style.border = `1px solid black`

                }

                if(translation.innerText == 'Translation')
                {

                    translation.parentElement.style.border = `1px solid red`

                } else
                {

                    translation.parentElement.style.border = `1px solid black`

                }

                hint.classList.remove('text-muted')
                hint.classList.add('text-danger')
                hint.innerText = `Щоб добавити ще один переклад ви повинні змінити текст слова або перекладу`

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
                hint.innerText = `І слово і переклад повинні бути заповнені`

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

        hint.innerText = `Клацніть на цю кнопочку щоб добавити ще один переклад`
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

        image_has = true

        if(image.children[2].style.backgroundImage == 'url("https://english/storage/icons/empty.jpg")')
        {

            if(image.children.length == 4)
            {

                image_hint.innerHTML = `Впишіть URL-адрес картинки, або видаліть картинку нажавши цю <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`
                deletes = document.querySelectorAll('.image_delete')

                deletes.forEach(deletee => {
                    deletee.addEventListener('click', image_delete_f)
                });

            } else
            {

                image_hint.innerHTML = `Виберіть картинку з комп'ютера, або видаліть картинку нажавши цю <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`
                deletes = document.querySelectorAll('.image_delete')

                deletes.forEach(deletee => {
                    deletee.addEventListener('click', image_delete_f)
                });

            }

        } else
        {

            image_hint.innerHTML = `Щоб видалити картинку нажміть цю <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`
            deletes = document.querySelectorAll('.image_delete')

            deletes.forEach(deletee => {
                deletee.addEventListener('click', image_delete_f)
            });

            image_good = true

        }

    } else
    {

        image_has = false
        image_good = false

    }

    if(count == translations.length)
    {

        hint.classList.add('text-muted')
        hint.classList.remove('text-danger')
        hint.innerText = `Клацніть на цю кнопочку щоб добавити ще один переклад`

        add_translation.addEventListener('click', add_translation_f)
        add_translation.setAttribute('role', 'button')

        if(image_has)
        {

            if(image_good && translations.length >= 2)
            {

                task_update.removeAttribute('hidden')

            } else
            {

                task_update.setAttribute('hidden', '')

            }

        } else
        {

            if(translations.length >= 2)
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

// ADD NEW TRANSLATION BUTTON AND FUNCTION
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
    word.style.cssText = `color: black; text-align: center; border: 1px solid black; border-radius: 10px; width: 49%; height: 40px; overflow: auto;`

    parent_div.appendChild(word)

    // WORD P
    let word_p = document.createElement('p')
    word_p.style.cssText = `padding-top: 7px; height: 20px;`
    word_p.innerText = `Слово`

    word.appendChild(word_p)

    // TRANSLATE DIV
    let translate = document.createElement('div')
    translate.setAttribute('contenteditable', 'true')
    translate.classList.add('translation')
    translate.style.cssText = `color: black; text-align: center; border: 1px solid black; border-radius: 10px; width: 49%; height: 40px; overflow: auto;`

    parent_div.appendChild(translate)

    // TRANSLATE P
    let translate_p = document.createElement('p')
    translate_p.style.cssText = `padding-top: 7px; height: 20px;`
    translate_p.innerText = `Translation`

    translate.appendChild(translate_p)

    word.addEventListener('keyup', check_task)
    translate.addEventListener('keyup', check_task)

    word.addEventListener('keydown', prevent_deleting)
    translate.addEventListener('keydown', prevent_deleting)

    parent_div.addEventListener('mousedown', start_deleting)
    parent_div.addEventListener('mouseup', stop_deleting)

    check_task()

}

// PREVENTING DELETING P INSIDE WORD DIV OR TRANSLATION
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

// DELETING TR
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

let add_translation = document.querySelector('.add_translation')

add_translation.addEventListener('click', add_translation_f)


let container = document.querySelector('.container')
container.style.paddingBottom = '200px;'
