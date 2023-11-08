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

            if(name.innerText.length > 2)
            {

                task_name.value = name.innerText
                name_hint.classList.remove('text-danger')
                name_hint.classList.add('text-muted')
                name_hint.innerText = `Нажміть щоб змінити назву завдання`

                count = count + 1

            } else
            {

                name_hint.classList.remove('text-muted')
                name_hint.classList.add('text-danger')
                name_hint.innerText = `Назва завдання не може бути такою короткою`

            }

        }


    });

    if(count == translations.length)
    {

        hint.classList.add('text-muted')
        hint.classList.remove('text-danger')
        hint.innerText = `Клацніть на цю кнопочку щоб добавити ще один переклад`

        add_translation.addEventListener('click', add_translation_f)
        add_translation.setAttribute('role', 'button')

        if(translations.length >= 2)
        {

            task_update.removeAttribute('hidden')

        } else
        {

            task_update.setAttribute('hidden', '')

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
