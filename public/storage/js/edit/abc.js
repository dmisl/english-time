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
                img.style.cssText = `width: 450px; height: 250px; background-image: url('${dis.value}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
                hint.innerHTML = `${tr_to_delete_picture_click_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`
                deletes = document.querySelectorAll('.image_delete')

                deletes.forEach(deletee => {
                    deletee.addEventListener('click', image_delete_f)
                });

                check_task()

            }
            test_img.onerror = function () {

                img.style.cssText = `width: 450px; height: 250px; background-image: url('${empty_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
                dis.value = ''
                dis.setAttribute('placeholder', tr_paste_the_correct_url)
                dis.setAttribute('status', 2)

                check_task()

            }

        } else
        {

            img.style.cssText = `width: 450px; height: 250px; background-image: url('${empty_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat;`
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
    this.style.cssText = `margin: 30px auto 20px; gap: 20px;`

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
    parent.style.cssText = `display: table; margin: 20px auto; margin-top: 30px; background-image: url("${bg_jpg}"); background-position: center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

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
    image_hint.innerHTML = `${tr_to_delete_picture_click_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`

    parent.appendChild(image_hint)

    let image_preview = document.createElement('div')
    image_preview.classList.add('img')
    image_preview.style.cssText = `background-image: url('${empty_jpg}'); margin: 0 auto; background-position: center; background-size: cover; background-repeat: no-repeat; width: 450px; height: 250px;`

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

// CHECK TASK FILLS
function check_task()
{

    let parent
    let count = 0

    for (let i = 0; i < document.querySelectorAll('.abc').length; i++) {

        parent = document.querySelectorAll('.abc')[i]
        // MAIN DIVS
        let text = parent.querySelector('.add_text')
        let answers = parent.querySelector('.abc_div')
        let choose = parent.querySelector('.abc_choose')
        let image = parent.querySelector('.abc_image')
        let youtube = document.querySelector('.youtube')

        // HINTS
        let text_hint = text.parentElement.children[1]
        let answers_hint = answers.parentElement.children[1]
        let choose_hint = choose.parentElement.children[1]
        let image_hint = image.querySelector('p')

        // START CHECKING IF THERE ISSET DEFAULT ELEMENTS
        if(answers.children.length > 2 && text.children[0].innerText !== tr_add_question)
        {

            text_hint.classList.remove('text-muted')
            text_hint.classList.add('text-danger')
            text_hint.classList.add('text-decoration-underline')

            // CHECK IF TEXT`S BEEN CHANGED
            if(text.children[0].innerText == tr_click_to_edit)
            {

                text_hint.innerText = tr_change_question

            } else
            {

                text_hint.innerText = ''

                // CHECK IF TEXT`S LENGTH IS NOT NULL
                if(text.children[0].innerText.length < 6)
                {

                    text_hint.innerText = tr_question_cannot_be_short

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
                        choose_hint.innerHTML = tr_you_must_choose_the_correct_answer

                    } else
                    {

                        choose_hint.classList.remove('text-danger')
                        choose_hint.classList.remove('text-decoration-underline')
                        choose_hint.classList.add('text-muted')
                        choose_hint.innerHTML = ''

                        // CHECK IF IMAGE ISSET AND FILLED
                        if(image.children.length !== 1 && image.children.length !== 2)
                        {

                            if(image.children[2].style.backgroundImage == 'url("https://english/storage/icons/empty.jpg")' || image.children[0].value.length < 3)
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

                            } else
                            {

                                image_hint.innerHTML = `${tr_to_delete_picture_click_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`

                                deletes = document.querySelectorAll('.image_delete')

                                deletes.forEach(deletee => {

                                    deletee.addEventListener('click', image_delete_f)

                                });

                                // CHECK IF VIDEO ISSET AND FILLED

                                if(youtube.children.length !== 1)
                                {

                                    if(youtube.children[1].innerText.length == tr_to_delete_video_click_this.length+tr_buttonchik.length+1 && youtube.children[2].attributes.src.value !== `https://www.youtube.com/embed/Ib1W1nZbzKc?si=9zg2ACet01abtLaK`)
                                    {

                                        count = count + 1

                                    } else
                                    {

                                        youtube.children[1].innerHTML = `${tr_to_delete_video_click_this} <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`
                                        document.querySelector('.delete_video').addEventListener('click', youtube_delete)

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

                                if(youtube.children[1].innerText.length == tr_to_delete_video_click_this.length+tr_buttonchik.length+1 && youtube.children[2].attributes.src.value !== `https://www.youtube.com/embed/Ib1W1nZbzKc?si=9zg2ACet01abtLaK`)
                                {

                                    count = count + 1

                                } else
                                {

                                    youtube.children[1].innerHTML = `${tr_to_delete_video_click_this} <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`
                                    document.querySelector('.delete_video').addEventListener('click', youtube_delete)

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

    if(count == document.querySelectorAll('.abc').length && document.querySelector('.name').innerText.length >= 3)
    {

        document.querySelector('.task_update').removeAttribute('hidden')

    } else
    {

        document.querySelector('.task_update').setAttribute('hidden', '')

    }

}

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
        this.parentElement.parentElement.children[1].innerHTML = tr_the_task_must_contain_2_answers

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
            this.parentElement.parentElement.children[1].innerHTML = tr_the_task_must_contain_2_answers

        }

        this.remove()

        check_task()

    }, 2000);

}

function stop_deleting()
{

    this.style.animation = ''
    this.style.color = ''

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
    abc_choose_hint.innerHTML = tr_click_on_the_correct_answer

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

        if(this.parentElement.parentElement.parentElement.querySelector('.abc_choose').children[0].innerText !== tr_change_right_answer)
        {

            this.parentElement.parentElement.parentElement.querySelector('.abc_choose').children[0].innerText = tr_change_right_answer

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

            parent.parentElement.children[1].innerHTML = tr_to_delete_one_of_answers_hover_and_click

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

            parent.parentElement.children[1].innerHTML = tr_to_delete_one_of_answers_hover_and_click

        } else
        {

            parent.parentElement.children[1].innerHTML = ''

        }

    }

}

// SAVING CHANGES
let task_update = document.querySelector('.task_update')

task_update.addEventListener('click', function () {

    // CREATING TASK BODY
    let abcs = document.querySelectorAll('.abc')
    let body = ''
    let youtube = document.querySelector('.youtube')

    if(youtube.children.length !== 1)
    {

        body += `<h4>${tr_review_before_completing_the_task}</h4>`
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
        let txt = adiv.querySelector('.add_text').innerText
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

// YOUTUBE
// DELETING VIDEO
function youtube_delete()
{

    let youtube = document.querySelector('.youtube')

    youtube.children[0].remove()
    youtube.children[0].remove()
    youtube.children[0].remove()

    youtube.innerHTML = `
        <div class="youtube_add" role="button" style="display: table; margin: 0px auto; background: rgb(255, 15, 55); border: 1px solid rgb(0, 0, 0); border-radius: 10px; color: white;">

            <p style="padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;">

                ${tr_add_video_from_youtube}

            </p>

        </div>
    `

    youtube.children[0].addEventListener('click', youtube_add_f)

    check_task()

}

// EDITING VIDEO
function youtube_edit()
{

    let youtube = document.querySelector('.youtube')

    let youtube_hint = youtube.children[1]
    let youtube_ov = youtube.children[2]
    let value = this.value

    if(value.includes('youtu.be') || value.includes('youtube.com'))
    {

        youtube_hint.classList.remove('text-danger')
        youtube_hint.classList.add('text-muted')
        youtube_hint.innerHTML = `${tr_to_delete_video_click_this} <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`

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
        youtube_hint.innerHTML = `${tr_paste_link_from_youtube_or} <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">${tr_delete_b}</b>`
        document.querySelector('.delete_video').addEventListener('click', youtube_delete)
        youtube_ov.setAttribute('src', 'https://youtube.com/dfghdrthxc')

    }

    check_task()


}

// ADD VIDEO

function youtube_add_f()
{

    let youtube = document.querySelector('.youtube')

    youtube.children[0].remove()

    youtube.style.cssText = `display: table; margin: 30px auto 20px; border-radius: 10px; color: black;`

    let youtube_input = document.createElement('input')
    youtube_input.classList.add('form-control')
    youtube_input.classList.add('text-center')
    youtube_input.style.cssText = 'font-size: 20px; padding: 10px 20px;'
    youtube_input.setAttribute('placeholder', tr_paste_link_from_youtube)

    youtube_input.focus()

    youtube.appendChild(youtube_input)

    let youtube_hint = document.createElement('p')
    youtube_hint.classList.add('small')
    youtube_hint.classList.add('text-muted')
    youtube_hint.innerHTML = `${tr_to_delete_video_click_this} <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`
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

// EDITING TASK NAME
let name = document.querySelector('.name')
let name_hint = document.querySelector('.name_hint')
let task_name = document.querySelector('.task_name')
let editing = document.querySelector('.editing')
let declared = document.querySelector('.declared')

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

if(declared.children.length >= 3)
{

    if(declared.children[1].classList.contains('youtube'))
    {

        let youtube = document.createElement('div')
        youtube.classList.add('youtube')
        youtube.style.cssText = `display: table; margin: 30px auto 20px; border-radius: 10px; color: black;`

        editing.appendChild(youtube)

        let youtube_input = document.createElement('input')
        youtube_input.classList.add('form-control')
        youtube_input.classList.add('text-center')
        youtube_input.setAttribute('placeholder', tr_paste_link_from_youtube)
        youtube_input.style.cssText = `font-size: 20px; padding: 10px 20px;`

        youtube.appendChild(youtube_input)

        let youtube_hint = document.createElement('p')
        youtube_hint.classList.add('small')
        youtube_hint.classList.add('text-muted')
        youtube_hint.classList.add('p-0')
        youtube_hint.classList.add('m-0')
        youtube_hint.innerHTML = `${tr_to_delete_video_click_this} <b class="text-danger delete_video user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`

        youtube.appendChild(youtube_hint)

        let youtube_overview = document.createElement('iframe')
        youtube_overview.setAttribute('width', '450')
        youtube_overview.setAttribute('height', '250')
        youtube_overview.setAttribute('src', declared.children[1].children[0].attributes.src.value)
        youtube_overview.setAttribute('title', 'YouTube video player')
        youtube_overview.setAttribute('frameborder', '0')
        youtube_overview.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share')
        youtube_overview.setAttribute('allowfullscreen', '')

        youtube.appendChild(youtube_overview)

        // ADDING EVENTLISTENERS FOR INPUT AND DELETE BUTTON

        youtube_input.addEventListener('keyup', youtube_edit)

        deletes = document.querySelectorAll('.delete_video')

        deletes.forEach(deletee => {

            deletee.addEventListener('click', youtube_delete)

        });

    } else
    {

        let youtube = document.createElement('div')
        youtube.classList.add('youtube')

        editing.appendChild(youtube)

        let youtube_add = document.createElement('div')
        youtube_add.classList.add('youtube_add')
        youtube_add.setAttribute('role', 'button')
        youtube_add.style.cssText = `display: table; margin: 0px auto; background: rgb(255, 15, 55); border: 1px solid rgb(0, 0, 0); border-radius: 10px; color: white;`

        youtube.appendChild(youtube_add)

        let youtube_p = document.createElement('p')
        youtube_p.style.cssText = `padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
        youtube_p.innerText = tr_add_video_from_youtube

        youtube_add.appendChild(youtube_p)

        youtube_add.addEventListener('click', youtube_add_f)

    }

} else
{

    let youtube = document.createElement('div')
    youtube.classList.add('youtube')

    editing.appendChild(youtube)

    let youtube_add = document.createElement('div')
    youtube_add.classList.add('youtube_add')
    youtube_add.setAttribute('role', 'button')
    youtube_add.style.cssText = `display: table; margin: 0px auto; background: rgb(255, 15, 55); border: 1px solid rgb(0, 0, 0); border-radius: 10px; color: white;`

    youtube.appendChild(youtube_add)

    let youtube_p = document.createElement('p')
    youtube_p.style.cssText = `padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
    youtube_p.innerText = tr_add_video_from_youtube

    youtube_add.appendChild(youtube_p)

    youtube_add.addEventListener('click', youtube_add_f)

}

// EDITING TASK

let tasks = document.querySelectorAll('.abc_task')

tasks.forEach(parent => {

    let declared_task_question = parent.children[0]
    let declared_task_image = parent.children[1].style.backgroundImage
    let task_answers = parent.querySelector('.abc_answers').children

    // TASK DIV
    let task = document.createElement('div')
    task.classList.add('abc')
    task.classList.add('mt-5')
    task.classList.add('mx-auto')
    task.style.cssText = `padding-bottom: 50px; width: 80%;`

    editing.appendChild(task)

    // ADDING QUESTION WITH EDITING
    window.setTimeout(() => {

        // TASK QUESTION PARENT DIV
        let task_question_parent = document.createElement('div')
        task_question_parent.style.cssText = `padding-top: 20px;`

        task.appendChild(task_question_parent)

        // TASK QUESTION
        let task_question = document.createElement('div')
        task_question.classList.add('add_text')
        task_question.setAttribute('role', 'button')
        task_question.setAttribute('contenteditable', 'true')
        task_question.style.cssText = `max-width: 80%; display: table; margin: 0 auto; border: 1px solid black; border-radius: 10px;`

        task_question_parent.appendChild(task_question)

        // TASK QUESTIONS P
        let task_question_p = document.createElement('p')
        task_question_p.style.cssText = `padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
        task_question_p.innerText = declared_task_question.innerText

        task_question.appendChild(task_question_p)

        // TASK QUESTION HINT
        let task_question_hint = document.createElement('p')
        task_question_hint.classList.add('small')
        task_question_hint.classList.add('text-muted')
        task_question_hint.innerText = tr_change_the_question

        task_question_parent.appendChild(task_question_hint)

        // ADDING EVENTLISTENER TO INPUT CHECKING VALUE
        task_question.addEventListener('keyup', function () {

            check_task()

        })

        task_question.addEventListener('keydown', function (e) {
        if (e.keyCode == 8 || e.keyCode == 46)
        {
            if (task_question.children.length === 1) { // last inner element
                if (task_question.children[0].innerText < 1) { // last element is empty
                    e.preventDefault()
                }
            }
        }
        })

    }, 0);

    // ADDING IMAGE IF ISSET
    window.setTimeout(() => {

        if(parent.children.length == 3)
        {

            // PARENT IMAGE DIV
            let task_image_parent = document.createElement('div')
            task_image_parent.classList.add('abc_image')
            task_image_parent.setAttribute('role', 'button')
            task_image_parent.style.cssText = `display: table; margin: 30px auto 20px; border-radius: 10px; color: black;`

            task.appendChild(task_image_parent)

            // TASK IMAGE INPUT
            let task_image_input = document.createElement('input')
            task_image_input.classList.add('form-control')
            task_image_input.classList.add('text-center')
            task_image_input.style.cssText = `font-size: 20px; padding: 10px 20px;`
            task_image_input.setAttribute('placeholder', tr_paste_image_url)
            task_image_input.value = declared_task_image.slice(5, declared_task_image.length-2)

            task_image_parent.appendChild(task_image_input)

            // TASK IMAGE HINT
            let task_image_hint = document.createElement('p')
            task_image_hint.classList.add('small')
            task_image_hint.classList.add('text-muted')
            task_image_hint.classList.add('p-0')
            task_image_hint.classList.add('m-0')
            task_image_hint.innerHTML = `${tr_to_delete_picture_click_this} <b class="image_delete text-danger user-select-none" style="text-decoration: underline;" role="button">${tr_buttonchik}</b>`

            task_image_parent.appendChild(task_image_hint)

            // TASK IMAGE PREVIEW
            let task_image = document.createElement('div')
            task_image.classList.add('img')
            task_image.style.backgroundImage = declared_task_image
            task_image.style.backgroundPosition = 'center'
            task_image.style.backgroundSize = 'cover'
            task_image.style.backgroundRepeat = 'no-repeat'
            task_image.style.width = '450px'
            task_image.style.height = '250px'
            task_image.style.margin = '0 auto'

            task_image_parent.appendChild(task_image)

            // TASK IMAGE TEST
            let task_image_test = document.createElement('img')
            task_image_test.style.cssText = 'display: none;'

            task_image_parent.appendChild(task_image_test)

            task_image_input.addEventListener('keyup', url_image_edit_f)

            deletes = document.querySelectorAll('.image_delete')

            deletes.forEach(deletee => {
                deletee.addEventListener('click', image_delete_f)
            });

        } else
        {

            // IMAGE PARENT DIV
            let task_image_parent = document.createElement('div')
            task_image_parent.classList.add('abc_image')
            task_image_parent.setAttribute('role', 'button')
            task_image_parent.style.cssText = `display: table; margin: 30px auto 20px; background-image: url('${bg_jpg}'); background-position: center center; background-size: cover; background-repeat: no-repeat; border: 1px solid black; border-radius: 10px; color: black;`

            task.appendChild(task_image_parent)

            // IMAGE P
            let task_image_p = document.createElement('p')
            task_image_p.style.cssText = `padding: 10px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 20px;`
            task_image_p.innerText = tr_add_image

            task_image_parent.appendChild(task_image_p)

            task_image_parent.addEventListener('click', add_image_f)

        }

    }, 0)

    // ADDING H2 TO TASK
    window.setTimeout(() => {

        let task_h2 = document.createElement('h2')
        task_h2.innerText = tr_add_answer_options

        task.appendChild(task_h2)

    }, 0)

    // ADDING ANSWERS
    window.setTimeout(() => {

        // PARENT OF PARENT
        let task_answers_parent_parent = document.createElement('div')

        task.appendChild(task_answers_parent_parent)

        // PARENT DIV
        let task_answers_parent = document.createElement('div')
        task_answers_parent.classList.add('abc_div')
        task_answers_parent.style.cssText = `width: 80%; margin: 0 auto; position: relative; display: flex; justify-content: center; gap: 10px 5px; flex-wrap: wrap;`

        task_answers_parent_parent.appendChild(task_answers_parent)

        // ANSWERS

        for (let i = 0; i < task_answers.length; i++) {

            if(task_answers[i].classList.contains('right'))
            {

                // ADDING NEW ANSWER DIV
                let new_answer = document.createElement('div')
                new_answer.setAttribute('contenteditable', 'true')
                new_answer.classList.add('abc_answer')
                new_answer.classList.add('right_one')
                new_answer.style.cssText = `border: 1px solid green; border-radius: 5px; width: 32%; height: 50px; overflow: auto;`

                task_answers_parent.appendChild(new_answer)

                // ANSWERS TEXT
                let new_answer_p = document.createElement('p')
                new_answer_p.style.cssText = `font-size: 20px; padding-top: 10px; height: 30px;`
                new_answer_p.innerText = task_answers[i].children[1].innerText

                new_answer.appendChild(new_answer_p)

            } else
            {

                // ADDING NEW ANSWER DIV
                let new_answer = document.createElement('div')
                new_answer.setAttribute('contenteditable', 'true')
                new_answer.classList.add('abc_answer')
                new_answer.style.cssText = `border: 1px solid black; border-radius: 5px; width: 32%; height: 50px; overflow: auto;`

                task_answers_parent.appendChild(new_answer)

                // ANSWERS TEXT
                let new_answer_p = document.createElement('p')
                new_answer_p.style.cssText = `font-size: 20px; padding-top: 10px; height: 30px;`
                new_answer_p.innerText = task_answers[i].children[1].innerText

                new_answer.appendChild(new_answer_p)

            }

        }

        // ADD ANSWERS BUTTON
        let task_answers_add = document.createElement('div')
        task_answers_add.classList.add('add_button')
        task_answers_add.classList.add('dashed')
        task_answers_add.setAttribute('role', 'button')
        task_answers_add.style.cssText = `width: 32%; height: 50px; border-radius: 5px; user-select: none;`

        task_answers_parent.appendChild(task_answers_add)

        // ADD BUTTONS P
        let task_answers_add_p = document.createElement('p')
        task_answers_add_p.style.cssText = `font-size: 20px; padding: 0px; margin: 9px 0px 0px;`
        task_answers_add_p.innerText = `+`

        task_answers_add.appendChild(task_answers_add_p)

        task_answers_add.addEventListener('click', add_answer_f)

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

        // ANSWERS HINT
        let task_answers_hint = document.createElement('p')
        task_answers_hint.classList.add('small')
        task_answers_hint.classList.add('text-muted')
        task_answers_hint.innerText = tr_to_delete_one_of_answers_hover_and_click

        task_answers_parent_parent.appendChild(task_answers_hint)

    }, 0)

    // TASK CHOOSE
    window.setTimeout(() => {

        let task_choose_parent = document.createElement('div')

        task.appendChild(task_choose_parent)

        // TASK CHOOSE BUTTON
        let task_choose = document.createElement('div')
        task_choose.classList.add('abc_choose')
        task_choose.setAttribute('role', 'button')
        task_choose.style.cssText = `background-color: rgba(0, 255, 106, 0.52); display: table; margin: 30px auto 0px; border: 1px solid black; border-radius: 10px;`

        task_choose_parent.appendChild(task_choose)

        // TASK CHOOSE BUTTON P
        let task_choose_p = document.createElement('p')
        task_choose_p.style.cssText = `color: black; padding: 8px 20px; display: table-cell; vertical-align: middle; user-select: none; position: relative; text-align: center; font-size: 17px;`
        task_choose_p.innerText = tr_change_right_answer

        task_choose.appendChild(task_choose_p)

        // TASK CHOOSE HINT
        let task_choose_hint = document.createElement('p')
        task_choose_hint.classList.add('small')
        task_choose_hint.classList.add('text-muted')

        task_choose_parent.appendChild(task_choose_hint)

        task_choose.addEventListener('click', abc_choose_f)

    })

});
