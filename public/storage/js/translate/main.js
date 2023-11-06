container.style.paddingBottom = '200px;'

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

        if(count == translations.length)
        {

            hint.classList.add('text-muted')
            hint.classList.remove('text-danger')
            hint.innerText = `Клацніть на цю кнопочку щоб добавити ще один переклад`

            add_translation.addEventListener('click', add_translation_f)
            add_translation.setAttribute('role', 'button')

            if(translations.length >= 2)
            {



            }

        }

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

            check_task()

            this.remove()

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

    let add_translation = document.querySelector('.add_translation')

    add_translation.addEventListener('click', add_translation_f)
