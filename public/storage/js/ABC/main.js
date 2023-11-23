    container.style.cssText = 'padding-bottom: 200px;'

    // YOUTUBE VIDEO

    let youtube = document.querySelector('.youtube')
    let youtube_add = document.querySelector('.youtube_add')
    let deletes

    // DELETING VIDEO
    function youtube_delete()
    {

        youtube.children[0].remove()
        youtube.children[0].remove()
        youtube.children[0].remove()

        youtube.innerHTML = `
            <div class="youtube_add" role="button" style="display: table; margin: 0px auto; background: rgb(255, 15, 55); border: 1px solid rgb(0, 0, 0); border-radius: 10px; color: white;">

                <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">

                    Додати відео з YouTube

                </p>

            </div>
        `

        youtube.children[0].addEventListener('click', youtube_add_f)

        check_task()

    }

    // EDITING VIDEO
    function youtube_edit()
    {

        let youtube_hint = youtube.children[1]
        let youtube_ov = youtube.children[2]
        let value = this.value

        if(value.includes('youtu.be') || value.includes('youtube.com'))
        {

            youtube_hint.classList.remove('text-danger')
            youtube_hint.classList.add('text-muted')
            youtube_hint.innerHTML = `Для того аби видалити відео - нажміть цю <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`
            deletes = document.querySelectorAll('.delete_video')

            deletes.forEach(deletee => {

                deletee.addEventListener('click', youtube_delete)

            });

            if(value.includes('embed'))
            {

                youtube_ov.setAttribute('src', this.value)

            } else
            {

                if(value.includes('youtube.com'))
                {

                    let str = value
                    if(str.includes('watch?v='))
                    {

                        str = str.replace('watch?v=', 'embed/')

                    }

                    if(str.includes('?si='))
                    {

                        str = str.slice(0, str.indexOf('?'))

                    }

                    youtube_ov.setAttribute('src', str)

                } else if(value.includes('youtu.be'))
                {

                    let str = value
                    str = str.replace('youtu.be/', 'youtube.com/embed/')

                    if(str.includes('?si='))
                    {

                        str = str.slice(0, str.indexOf('?'))

                    }

                    youtube_ov.setAttribute('src', str)

                }

            }

        } else
        {

            youtube_hint.classList.remove('text-muted')
            youtube_hint.classList.add('text-danger')
            youtube_hint.innerHTML = `Вставте посилання з YouTube або <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">ВИДАЛІТЬ</b>`
            deletes = document.querySelectorAll('.delete_video')

            deletes.forEach(deletee => {

                deletee.addEventListener('click', youtube_delete)

            });
            youtube_ov.setAttribute('src', 'https://youtube.com/dfghdrthxc')

        }

        check_task()


    }

    // ADD VIDEO

    function youtube_add_f()
    {

        youtube.children[0].remove()

        youtube.style.cssText = `display: table; margin: 30px auto 20px; border-radius: 10px; color: black;`

        let youtube_input = document.createElement('input')
        youtube_input.classList.add('form-control')
        youtube_input.classList.add('text-center')
        youtube_input.style.cssText = 'font-size: 20px; padding: 10px 20px;'
        youtube_input.setAttribute('placeholder', 'Вставте ссилку з YouTube')

        youtube_input.focus()

        youtube.appendChild(youtube_input)

        let youtube_hint = document.createElement('p')
        youtube_hint.classList.add('small')
        youtube_hint.classList.add('text-muted')
        youtube_hint.innerHTML = `Для того аби видалити відео - нажміть цю <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`
        youtube_hint.classList.add('p-0')
        youtube_hint.classList.add('m-0')

        youtube.appendChild(youtube_hint)

        let youtube_ov = document.createElement('iframe')
        youtube_ov.setAttribute('width', '450')
        youtube_ov.setAttribute('height', '250')
        youtube_ov.setAttribute('src', 'https://www.youtube.com/embed/Ib1W1nZbzKc?si=9zg2ACet01abtLaK')
        youtube_ov.setAttribute('title', 'YouTube video player')
        youtube_ov.setAttribute('frameborder', '0')
        youtube_ov.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share')
        youtube_ov.setAttribute('allowfullscreen', '')

        youtube.appendChild(youtube_ov)

        youtube_input.addEventListener('keyup', youtube_edit)

        check_task()

        deletes = document.querySelectorAll('.delete_video')

        deletes.forEach(deletee => {

            deletee.addEventListener('click', youtube_delete)

        });

    }

    youtube_add.addEventListener('click', youtube_add_f)

    // ABC TEXT

    // CHANGING DIV TO EDITABLE INPUT
    function change()
    {

        this.style.backgroundColor = ''
        this.style.color = ''
        this.setAttribute('contenteditable', 'true')
        this.removeEventListener('click', change)
        this.children[0].innerText = 'Нажміть щоб відредагувати'
        this.parentElement.children[1].innerText = 'змініть запитання'

        // ADDING EVENTLISTENER TO INPUT CHECKING VALUE
        this.addEventListener('keyup', function () {

            check_task()

        })

        this.addEventListener('keydown', function (e) {
            if (e.keyCode == 8 || e.keyCode == 46)
            {
                if (this.children.length === 1) { // last inner element
                    if (this.children[0].innerText < 1) { // last element is empty
                        e.preventDefault()
                    }
                }
            }
        })

    }

    // ABC IMAGE

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
                    img.style.cssText = `width: 450px; height: 250px; margin: 0 auto; background-image: url('${dis.value}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
                    hint.innerHTML = `Щоб видалити картинку нажміть цю <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`

                    deletes = document.querySelectorAll('.image_delete')

                    deletes.forEach(deletee => {

                        deletee.addEventListener('click', image_delete_f)

                    });

                    check_task()

                }
                test_img.onerror = function () {

                    img.style.cssText = `width: 450px; height: 250px; margin: 0 auto; background-image: url('${empty_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
                    dis.value = ''
                    dis.setAttribute('placeholder', 'Вставте поправний URL-адрес')
                    dis.setAttribute('status', 2)

                    check_task()

                }

            } else
            {

                img.style.cssText = `width: 450px; height: 250px; margin: 0 auto; background-image: url('${empty_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
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
        this.style.cssText = `margin: 30px auto 20px; gap: 20px;`

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
        parent.style.cssText = `display: table; margin: 20px auto; margin-top: 30px; background-image: url("${bg_jpg}"); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

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
        parent.style.cssText = `display: table; margin: 30px auto 20px; border-radius: 10px; color: black;`

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
        parent.style.cssText = `display: table; margin: 30px auto 20px; border-radius: 10px; color: black;`

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
        add_image_image.style.cssText = `width: 450px; height: 250px; margin: 0 auto; background-image: url("${empty_jpg}"); background-position: center; background-size: cover; background-repeat: no-repeat;`

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

    // ABC ANSWERS

    // CREATING NEW EDITABLE AND DELETABLE ABC ANSWER ON CLICK
    function add_answer_f()
    {

        // LIMIT TO 6 ANSWERS
        if(this.parentElement.children.length == 6)
        {

            this.setAttribute('hidden', '')

        }

        // ADDING OUR NEW DIV
        let new_div = document.createElement('div')
        new_div.style.cssText = 'border: 1px solid black; border-radius: 5px; width: 32%; height: 50px; overflow: auto;'
        new_div.setAttribute('contenteditable', 'true')
        new_div.classList.add('abc_answer')
        let p_inside_div = document.createElement('p')
        p_inside_div.style.cssText = `font-size: 20px; padding-top: 10px; height: 30px;`
        new_div.appendChild(p_inside_div)
        this.parentElement.insertBefore(new_div, this)

        check_existance(this.parentElement, 'add')

        if(this.parentElement.children.length < 3)
        {

            this.parentElement.parentElement.children[1].classList.remove('text-muted')
            this.parentElement.parentElement.children[1].classList.add('text-danger')
            this.parentElement.parentElement.children[1].classList.add('text-decoration-underline')
            this.parentElement.parentElement.children[1].innerHTML = 'В завданні повинно бути принаймі 2 відповіді'

        }

        check_task()

        // ADDING FUNCTIONS FOR ALL ADDED ANSWERS
        abc_answers = document.querySelectorAll('.abc_answer')
        abc_answers.forEach(answer => {

            answer.addEventListener('mousedown', start_deleting)
            answer.addEventListener('mouseup', stop_deleting)
            answer.addEventListener('keydown', function (e) {
                if (e.keyCode == 8 || e.keyCode == 46)
                {
                    if (answer.children.length === 1) { // last inner element
                        if (answer.children[0].innerText < 1) { // last element is empty
                            e.preventDefault()
                        }
                    }
                }
            })

        });

    }

    // DELETING ELEMENT

    // OUR TIMER
    let timer
    let starting_value
    let deletings
    let deleting1
    let deleting2
    let deleting3
    let deleting4
    let deleting5

    function start_deleting()
    {

        this.style.animation = 'delete 2s 1'

        starting_value = this.children[0].innerText

        this.children[0].style.color = 'black'

        deletings = window.setTimeout(() => {

            deleting1 = window.setTimeout(() => {this.children[0].innerHTML = `Deleting.`}, 0);
            deleting2 = window.setTimeout(() => {this.children[0].innerHTML = `Deleting..`}, 400);
            deleting3 = window.setTimeout(() => {this.children[0].innerHTML = `Deleting...`}, 800);
            deleting4 = window.setTimeout(() => {this.children[0].innerHTML = `Deleting.`}, 1200);
            deleting5 = window.setTimeout(() => {this.children[0].innerHTML = `Deleting..`}, 1300);

        }, 400)

        timer = window.setTimeout(() => {

            if(this.parentElement.children.length == 7)
            {

                this.parentElement.children[6].removeAttribute('hidden')

            }

            // TEMPORARY DADDY
            let tda = this.parentElement.parentElement.parentElement

            // CHECK EXISTANCE AFTER DELETING
            check_existance(this.parentElement, 'del')

            if(this.parentElement.children.length < 4)
            {

                this.parentElement.parentElement.children[1].classList.remove('text-muted')
                this.parentElement.parentElement.children[1].classList.add('text-danger')
                this.parentElement.parentElement.children[1].classList.add('text-decoration-underline')
                this.parentElement.parentElement.children[1].innerHTML = 'В завданні повинно бути принаймі 2 відповіді'

            }

            this.remove()

            check_task()

        }, 2000);

    }

    function stop_deleting()
    {

        this.style.animation = ''

        this.children[0].style.color = ''

        if(timer)
        {

            window.clearTimeout(timer)

        }
        if(deletings || deleting1 || deleting2 || deleting3 || deleting4 || deleting5)
        {
            window.clearTimeout(deletings)
            window.clearTimeout(deleting1)
            window.clearTimeout(deleting2)
            window.clearTimeout(deleting3)
            window.clearTimeout(deleting4)
            window.clearTimeout(deleting5)

            this.children[0].style.color = ''

            if(this.children[0].innerHTML !== starting_value)
            {

                this.children[0].innerHTML = starting_value

                if(starting_value.length > 0)
                {

                    let range = document.createRange()
                    let sel = window.getSelection()
                    range.setStart(this.children[0], 1)
                    range.collapse(true)

                    sel.removeAllRanges()
                    sel.addRange(range)

                }

            }

        }

    }

    // ABC CHOOSE

    function abc_choose_f()
    {
        // SHOWING HINT
        let abc_choose = this
        let abc_choose_hint = this.parentElement.children[1]
        abc_choose_hint.innerHTML = 'нажміть на правильну відповідь'

        // CHECKING IF TEXT IS DANGER
        if(abc_choose_hint.classList.contains('text-danger'))
        {

            abc_choose_hint.classList.remove('text-danger')
            abc_choose_hint.classList.remove('text-decoration-underline')
            abc_choose_hint.classList.add('text-muted')

        }

        // GIVING ALL ANSWERS BORDER AND CLICK EVENT LISTENER
        let abc_task = this.parentElement.parentElement
        let abc_task_answers = abc_task.querySelector('.abc_div').children

        for (let i = 0; i < abc_task_answers.length; i++) {

            if(abc_task_answers[i].classList.contains('abc_answer'))
            {

                abc_task_answers[i].style.border = '1px solid green'
                abc_task_answers[i].style.cursor = 'pointer'
                abc_task_answers[i].removeAttribute('contenteditable')

                abc_task_answers[i].addEventListener('click', make_right)

            }

        }
    }

    // MAKE AN ANSWER RIGHT ONE
    function make_right()
    {

        answers = this.parentElement.children

        for (let a = 0; a < answers.length; a++) {

            if(answers[a].classList.contains('abc_answer'))
            {

                answers[a].style.border = '1px solid black'
                answers[a].style.cursor = ''
                answers[a].setAttribute('contenteditable', 'true')

            }

            if(answers[a].classList.contains('right_one'))
            {

                answers[a].classList.remove('right_one')

            }

            answers[a].removeEventListener('click', make_right)

        }

            this.classList.add('right_one')
            this.style.border = '1px solid green'

            // CHANGING CHOOSE BUTTON`S TEXT
            this.parentElement.parentElement.parentElement.querySelector('.abc_choose').parentElement.children[1].innerHTML = ''

            if(this.parentElement.parentElement.parentElement.querySelector('.abc_choose').children[0].innerText !== 'Змінити правильну відподь')
            {

                this.parentElement.parentElement.parentElement.querySelector('.abc_choose').children[0].innerText = 'Змінити правильну відподь'

            }

            check_task()

    }

    // CHECK IF THERE IS THE ELEMENTS WHICH WE CAN CHOOSE
    function check_existance(parent, type)
    {
        if(type == 'add')
        {

            if(parent.children.length >= 3)
            {

                parent.parentElement.parentElement.querySelector('.abc_choose').removeAttribute('hidden')

            } else
            {

                parent.parentElement.parentElement.querySelector('.abc_choose').setAttribute('hidden', '')

            }

            if(parent.children.length >= 2)
            {

                if(parent.parentElement.children[1].classList.contains('text-danger'))
                {

                    parent.parentElement.children[1].classList.remove('text-danger')
                    parent.parentElement.children[1].classList.remove('text-decoration-underline')
                    parent.parentElement.children[1].classList.add('text-muted')

                }

                parent.parentElement.children[1].innerHTML = 'Щоб видалити одну з відповідей - наведіться на неї і зажміть мишку'

            } else
            {

                parent.parentElement.children[1].innerHTML = ''

            }

        } else
        {

            if(parent.children.length >= 4)
            {

                parent.parentElement.parentElement.querySelector('.abc_choose').removeAttribute('hidden')

            } else
            {

                parent.parentElement.parentElement.querySelector('.abc_choose').setAttribute('hidden', '')

            }

            if(parent.children.length >= 3)
            {

                if(parent.parentElement.children[1].classList.contains('text-danger'))
                {

                    parent.parentElement.children[1].classList.remove('text-danger')
                    parent.parentElement.children[1].classList.remove('text-decoration-underline')
                    parent.parentElement.children[1].classList.add('text-muted')

                }

                parent.parentElement.children[1].innerHTML = 'Щоб видалити одну з відповідей - наведіться на неї і зажміть мишку'

            } else
            {

                parent.parentElement.children[1].innerHTML = ''

            }

        }

    }

    // ABC TASK

    let options = document.querySelector('.options')

    function check_task()
    {

        let parent
        let count = 0

        for (let i = 0; i < document.querySelectorAll('.abc').length; i++) {

            parent = document.querySelectorAll('.abc')[i]
            // MAIN DIVS
            let text = parent.querySelector('.abc_text')
            let answers = parent.querySelector('.abc_div')
            let choose = parent.querySelector('.abc_choose')
            let image = parent.querySelector('.abc_image')

            // HINTS
            let text_hint = text.parentElement.children[1]
            let answers_hint = answers.parentElement.children[1]
            let choose_hint = choose.parentElement.children[1]
            let image_hint = image.querySelector('p')

            // START CHECKING IF THERE ISSET DEFAULT ELEMENTS
            if(answers.children.length > 2 && text.children[0].innerText !== 'Додати запитання')
            {

                text_hint.classList.remove('text-muted')
                text_hint.classList.add('text-danger')
                text_hint.classList.add('text-decoration-underline')

                // CHECK IF TEXT`S BEEN CHANGED
                if(text.children[0].innerText == 'Нажміть щоб відредагувати')
                {

                    text_hint.innerText = 'Змініть запитання'

                } else
                {

                    text_hint.innerText = ''

                    // CHECK IF TEXT`S LENGTH IS NOT NULL
                    if(text.children[0].innerText.length < 6)
                    {

                        text_hint.innerText = 'Запитання не може бути таким коротким'

                    } else
                    {

                        text_hint.innerText = ''

                        // CHECK IF THERE IS A RIGHT ANSWER
                        let is = false
                        for (let i = 0; i < answers.children.length; i++) {

                            if(answers.children[i].classList.contains('right_one'))
                            {
                                is = true
                            }

                        }

                        if(!is)
                        {

                            choose_hint.classList.remove('text-muted')
                            choose_hint.classList.add('text-danger')
                            choose_hint.classList.add('text-decoration-underline')
                            choose_hint.innerHTML = 'Ви повинні вибрати правильну відповідь'

                        } else
                        {

                            choose_hint.classList.remove('text-danger')
                            choose_hint.classList.remove('text-decoration-underline')
                            choose_hint.classList.add('text-muted')
                            choose_hint.innerHTML = ''

                            // CHECK IF IMAGE ISSET AND FILLED
                            if(image.children.length !== 1 && image.children.length !== 2)
                            {

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

                                    // CHECK IF VIDEO ISSET AND FILLED

                                    if(youtube.children.length !== 1)
                                    {

                                        if(youtube.children[1].innerText.length == 49 && youtube.children[2].attributes.src.value !== `https://www.youtube.com/embed/Ib1W1nZbzKc?si=9zg2ACet01abtLaK`)
                                        {

                                            count = count + 1

                                        } else
                                        {

                                            youtube.children[1].innerHTML = `Для того аби видалити відео - нажміть цю <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`
                                            deletes = document.querySelectorAll('.delete_video')

                                            deletes.forEach(deletee => {

                                                deletee.addEventListener('click', youtube_delete)

                                            });

                                        }

                                    } else
                                    {

                                        count = count + 1

                                    }

                                }

                            } else
                            {

                                // CHECK IF VIDEO ISSET AND FILLED

                                if(youtube.children.length !== 1)
                                {

                                    if(youtube.children[1].innerText.length == 49 && youtube.children[2].attributes.src.value !== `https://www.youtube.com/embed/Ib1W1nZbzKc?si=9zg2ACet01abtLaK`)
                                    {

                                        count = count + 1

                                    } else
                                    {

                                        youtube.children[1].innerHTML = `Для того аби видалити відео - нажміть цю <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">КНОПОЧКУ</b>`
                                        deletes = document.querySelectorAll('.delete_video')

                                        deletes.forEach(deletee => {

                                            deletee.addEventListener('click', youtube_delete)

                                        });

                                    }

                                } else
                                {

                                    count = count + 1

                                }

                            }

                        }

                    }

                }

            }

        }

        if(count == document.querySelectorAll('.abc').length)
        {

            options.removeAttribute('hidden')

        } else
        {

            options.setAttribute('hidden', '')

        }

    }

    check_task()

    function create_task()
    {

        options.setAttribute('hidden', '')
        let number_of_divs = document.querySelectorAll('.abc').length

        // CREATING OUR DIV

        // NEW PARENT
        let parent = document.createElement('div')
        parent.classList.add('abc')
        parent.classList.add('mt-5')
        parent.classList.add('mx-auto')
        parent.style.cssText = 'padding-bottom: 50px; width: 80%;'

        // ABC TEXT

        // ADDING ADD TEXT DIV TO PARENT
        let add_text_div = document.createElement('div')
        add_text_div.style.cssText = 'padding-top: 20px;'

        parent.appendChild(add_text_div)

        // ADDING ABC TEXT DIV TO PARENT DIV
        let abc_text = document.createElement('div')
        abc_text.classList.add('abc_text')
        abc_text.style.cssText = 'max-width: 80%; display: table; margin: 0 auto; background: #D886FF; border: 1px solid #000; border-radius: 10px; color: black;'
        abc_text.setAttribute('role', 'button')

        add_text_div.appendChild(abc_text)

        // ADDING PARAGRAF CHILD TO ABC TEXT DIV
        let abc_text_child = document.createElement('p')
        abc_text_child.style.cssText = 'padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;'
        abc_text_child.innerText = 'Додати запитання'

        abc_text.appendChild(abc_text_child)

        // ADDING ABC HINT TO TEXT DIV
        let abc_text_hint = document.createElement('p')
        abc_text_hint.classList.add('small')
        abc_text_hint.classList.add('text-muted')

        add_text_div.appendChild(abc_text_hint)

        // ABC IMAGE

        // ABC IMAGE DIV
        let abc_image_div = document.createElement('div')
        abc_image_div.classList.add('abc_image')
        abc_image_div.setAttribute('role', 'button')
        abc_image_div.style.cssText = `display: table; margin: 20px auto; margin-top: 30px; background-image: url("${bg_jpg}"); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

        parent.appendChild(abc_image_div)

        // ABC IMAGE PARAGRAPH
        let abc_image_p = document.createElement('p')
        abc_image_p.style.cssText = 'padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;'
        abc_image_p.innerText = 'Додати картинку'

        abc_image_div.appendChild(abc_image_p)

        // ABC ANSWERS

        // ADDING HEADING TO PARENT
        let h2 = document.createElement('h2')
        h2.innerText = 'Додайте варіанти відповіді'

        parent.appendChild(h2)

        // ADDING ADD ANSWERS DIV TO PARENT
        let abc_answers_div = document.createElement('div')

        parent.appendChild(abc_answers_div)

        // ADDING ANSWERS DIV TO PARENT
        let abc_div = document.createElement('div')
        abc_div.classList.add('abc_div')
        abc_div.style.cssText = 'position: relative; display: flex; justify-content: center; column-gap: 5px; row-gap: 10px; flex-wrap: wrap; width: 80%; margin: 0 auto; margin-top: 10px;'

        abc_answers_div.appendChild(abc_div)

        // ADDING ADD ANSWER BUTTON TO ANSWERS DIV
        let add_button = document.createElement('div')
        add_button.classList.add('add_button')
        add_button.classList.add('dashed')
        add_button.style.cssText = 'width: 32%; height: 50px; border-radius: 5px; user-select: none;'
        add_button.setAttribute('role', 'button')

        abc_div.appendChild(add_button)

        // ADDING PARAGRAF TO ADD ANSWER BUTTON
        let add_button_child = document.createElement('p')
        add_button_child.style.cssText = 'font-size: 20px; padding: 0; margin: 0; margin-top: 9px;'
        add_button_child.innerText = '+'

        add_button.appendChild(add_button_child)

        // ADDING ANSWERS HINT
        let abc_div_hint = document.createElement('p')
        abc_div_hint.classList.add('small')
        abc_div_hint.classList.add('text-muted')

        abc_answers_div.appendChild(abc_div_hint)

        // CHOOSE ANSWER

        // ADD ABC CHOOSE PARENT DIV TO PARENT DIV
        let abc_choose_div = document.createElement('div')

        parent.appendChild(abc_choose_div)

        // ADDING ABC CHOOSE DIV TO ABC CHOOSE PARENT DIV
        let abc_choose = document.createElement('div')
        abc_choose.classList.add('abc_choose')
        abc_choose.style.cssText = 'background-color: rgba(0, 255, 106, 0.521); display: table; margin: 0 auto; margin-top: 30px; border: 1px solid black; border-radius: 10px;'
        abc_choose.setAttribute('role', 'button')
        abc_choose.setAttribute('hidden', '')

        abc_choose_div.appendChild(abc_choose)

        // ADDING ABC CHOOSE DIV CHILD
        let abc_choose_child = document.createElement('p')
        abc_choose_child.style.cssText = 'padding: 8px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 17px;'
        abc_choose_child.innerText = 'Вибрати правильну відповідь'

        abc_choose.appendChild(abc_choose_child)

        // ADDING ABC CHOOSE HINT
        let abc_choose_hint = document.createElement('p')
        abc_choose_hint.classList.add('small')
        abc_choose_hint.classList.add('text-muted')

        abc_choose_div.appendChild(abc_choose_hint)

        container.insertBefore(parent, options)

        // ADDING FUNCTIONS
        abc_text.addEventListener('click', change)
        abc_image_div.addEventListener('click', add_image_f)
        add_button.addEventListener('click', add_answer_f)
        abc_choose.addEventListener('click', abc_choose_f)

    }

    // CREATING FIRST DEFAULT TASK
    create_task()

    // ADD NEW TASK
    let task_add = document.querySelector('.task_add')

    task_add.addEventListener('click', create_task)

    // FINISH EDITING TASKS
    let task_finish = document.querySelector('.task_finish')

    task_finish.addEventListener('click', function () {

        // REMOVE SOME ATTRIBUTES AND ELEMENTS
        window.setTimeout(() => {

            // YOUTUBE
            document.querySelector('.youtube').children[0].setAttribute('hidden', '')

            // ADD / EDIT TEXT
            for (let i = 0; i < document.querySelectorAll('.abc_text').length; i++) {

                document.querySelectorAll('.abc_text')[i].removeEventListener('click', change)
                document.querySelectorAll('.abc_text')[i].removeAttribute('contenteditable')
                document.querySelectorAll('.abc_text')[i].removeAttribute('role')

            }

            // ADD IMAGE / EDIT IMAGE
            let ai = document.querySelectorAll('.abc_image')
            for (let i = 0; i < ai.length; i++) {

                if(ai[i].children.length == 1)
                {

                    ai[i].setAttribute('hidden', '')

                } else
                {

                    ai[i].querySelector('input').setAttribute('hidden', '')

                }

            }

            // ADD ANSWER BUTTON
            let ab = document.querySelectorAll('.add_button')
            for (let i = 0; i < ab.length; i++) {

                ab[i].removeEventListener('click', add_answer_f)
                ab[i].parentElement.parentElement.parentElement.querySelector('h2').remove()
                ab[i].parentElement.parentElement.children[1].remove()
                ab[i].remove()

            }

            // EDITING ANSWERS
            let as = document.querySelectorAll('.abc_answer')
            for (let i = 0; i < as.length; i++) {

                as[i].removeAttribute('contenteditable')
                as[i].removeEventListener('mousedown', start_deleting)
                as[i].removeEventListener('mouseup', stop_deleting)

            }

            // CHANGING / PICKING RIGHT ANSWER
            let ac = document.querySelectorAll('.abc_choose')
            for (let i = 0; i < ac.length; i++) {

                ac[i].removeEventListener('click', abc_choose_f)
                ac[i].remove()

            }

        }, 0);

        options.setAttribute('hidden', '')
        document.querySelector('.task_create').removeAttribute('hidden')

    })

    // CREATING ACTUAL TASK

    let task_create = document.querySelector('.task_create')

    task_create.addEventListener('click', function () {

        // CREATING TASK BODY
        let abcs = document.querySelectorAll('.abc')
        let body = ''

        if(youtube.children.length !== 1)
        {

            body += `<h4>Перегляньте перед виконанням завдання</h4>`
            body += `
                <div class="youtube" style="width: 700px; height: 350px; margin: 0 auto; margin-bottom: 50px;">
                    <iframe style="width: inherit; height: inherit;" src="${youtube.children[2].attributes.src.value}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            `

        }

        abcs.forEach(adiv => {

            // START OF MAIN DIV
            body += `<div class="abc_task">`

            // ADDING QUESTION
            let txt = adiv.querySelector('.abc_text').innerText
            body += `<h3 class="text-center">${txt}</h3>`

            if(adiv.querySelector('.abc_image').children.length !== 1)
            {

                if(adiv.querySelector('.abc_image').children[0].classList.contains('text-center'))
                {

                    let immg = adiv.querySelector('.abc_image').querySelector('input').value
                    body += `<div style="width: 550px; height: 320px; margin: 15px auto; background-image: url('${immg}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>`

                } else
                {

                    let name_value = adiv.querySelector('.abc_image').querySelector('input').attributes.name.value
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

            // ADDING ANSWERS
            body += `<div class="abc_answers">`
            let answers = adiv.querySelectorAll('.abc_answer')
            let abcdef = ['A', 'B', 'C', 'D', 'E', 'F']

            for (let i = 0; i < answers.length; i++) {

                if(answers[i].classList.contains('right_one'))
                {

                    body += `
                        <div class="abc_ans right">

                            <div style="text-align: center; display: table; width: 60px; border-right: 1px solid black;">
                                <h2>${abcdef[i]}</h2>
                            </div>

                            <div style="display: table;">
                                <h4>${answers[i].innerText}</h4>
                            </div>

                        </div>
                    `

                } else
                {

                    body += `
                        <div class="abc_ans">

                            <div style="text-align: center; display: table; width: 60px; border-right: 1px solid black;">
                                <h2>${abcdef[i]}</h2>
                            </div>

                            <div style="display: table;">
                                <h4>${answers[i].innerText}</h4>
                            </div>

                        </div>
                    `

                }

            }

            // FINISHING ANSWERS
            body += `</div>`

            // FINISHING TASK
            body += `</div>`

            let task_body = document.querySelector('.task_body')
            task_body.value = body
            submitik = document.createElement('button')
            submitik.setAttribute('type', 'submit')
            document.querySelector('.hidden').appendChild(submitik)
            submitik.click()

        });

    })
