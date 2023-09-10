// добавлення варіантів

let radio_input = document.querySelectorAll('.radio_input')
let radio_editt = document.querySelectorAll('.radio_edit')

for (let i = 0; i < radio_editt.length; i++) {
    radio_editt[i].addEventListener('click', function () {
        answer_edit(i)
    })
}

function answer_edit(i)
{
    let add_answers = document.querySelector('.add_answers')
    let radio_edit = document.querySelectorAll('.radio_edit')
    if(document.querySelector('.radio_change') == null)
        {
            let number = i+1
            radio_edit[i].outerHTML = `
            <div class="input-group radio_change" style="width: 33%; border-radius: 0px;">
                <input value="${radio_edit[i].innerText}" type="text" class="form-control radio_change_input" style="font-size: 15px; padding-left: 5px; padding-right: 5px; text-align: center; border-radius: 0px;">
                <button type="button" class="btn btn-success radio_apply" style="border-radius: 0px;">&#10003;</button>
            </div>
            `
            let radio_change = document.querySelector('.radio_change')
            let radio_apply = document.querySelector('.radio_apply')
            let radio_change_input = document.querySelector('.radio_change_input')
            radio_apply.addEventListener('click', function () {
                if(number == 1)
                {
                    radio_change.outerHTML = `
                        <div class="answer1 radio_edit" style="z-index: 999; cursor: pointer; padding: 10px 0; width: 33%;">
                            <label class="radio_label" style="cursor:pointer;" for="first">${radio_change_input.value}</label>
                            <input class="radio_input" style="display: none;" type="radio" name="answer" id="first">
                        </div>
                    `
                    let new_radio = document.querySelector('.answer1')
                    new_radio.addEventListener('click', function () {
                        answer_edit(0)
                    })
                } else if(number == 2)
                {
                    radio_change.outerHTML = `
                        <div class="answer2 radio_edit" style="z-index: 999; cursor: pointer; padding: 10px 0; width: 33%; border-left: 1px solid black;">
                            <label class="radio_label" style="cursor:pointer;" for="second">${radio_change_input.value}</label>
                            <input class="radio_input" style="display: none;" type="radio" name="answer" id="second">
                        </div>
                    `
                    let new_radio = document.querySelectorAll('.radio_edit')
                    new_radio[i].addEventListener('click', function () {
                        answer_edit(i)
                    })
                } else if(number == 3)
                {
                    radio_change.outerHTML = `
                        <div class="answer3 radio_edit" style="z-index: 999; cursor: pointer; padding: 10px 0; width: 34%; border-left: 1px solid black;">
                            <label class="radio_label" style="cursor:pointer;" for="third">${radio_change_input.value}</label>
                            <input class="radio_input" style="display: none;" type="radio" name="answer" id="third">
                        </div>
                    `
                    let new_radio = document.querySelectorAll('.radio_edit')
                    new_radio[i].addEventListener('click', function () {
                        answer_edit(i)
                    })
                }
                let radio = document.querySelectorAll('.radio_edit')
                let count = 0
                radio.forEach(e => {
                    if(e.innerText.includes('First') || e.innerText.includes('Second') || e.innerText.includes('Third'))
                    {
                        count++
                    }
                });
                if(count <= 2)
                {
                    let next = document.querySelector('.next')
                    next.removeAttribute('hidden')
                    next.addEventListener('click', function () {
                        next.outerHTML = `
                        <div class="choose my-3 mx-auto" style="width: 80%;">
                            <p class="my-1">Виберіть правильну відповідь</p>
                            <select class="form-select choose_select w-50 mx-auto" style="font-size: 20px;" aria-label="Default select example">
                                <option selected></option>
                            </select>
                            <div class="btn btn-primary my-2 choose_accept" hidden>Підтвердити правильний варіант</div>
                        </div>
                        `
                        let choose = document.querySelector('.choose')
                        let choose_select = document.querySelector('.choose_select')
                        let choose_accept = document.querySelector('.choose_accept')
                        
                        radio = document.querySelectorAll('.radio_edit')
                        console.log(radio)
                        for (let a = 0; a < radio.length; a++) {
                            choose_select.innerHTML += `
                                <option value="${a+1}">${radio[a].innerText}</option>
                            `
                        }

                        choose_select.addEventListener('change', function () {
                            if(choose_select.value >= 1)
                            {
                                choose_accept.removeAttribute('hidden')
                            } else
                            {
                                choose_accept.setAttribute('hidden', '')
                            }
                        })

                        choose_accept.addEventListener('click', function () {
                            if(choose_select.value == 1)
                            {
                                document.querySelector('#first').classList.add('right')
                            }
                            if(choose_select.value == 2)
                            {
                                document.querySelector('#second').classList.add('right')
                            }
                            if(choose_select.value == 3)
                            {
                                document.querySelector('#third').classList.add('right')
                            }
                            let ans = document.querySelector('.answersss').outerHTML
                            textt[2] = ``
                            textt[2] += ans
                            choose.setAttribute('hidden', '')
                            choose.outerHTML += `
                            <div class="d-flex mx-auto" style="width: 70%">
                                <div class="bg-success mx-auto finish" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                                    <h5 class="py-2" >Завершити редактування завдання</h5>
                                </div>
                            </div>
                            `
                            let finish = document.querySelector('.finish')
                            finish.addEventListener('click', function () {
                                textt[3] = `
                                    <button disabled type="button" class="btn btn-primary mt-3" id="check">Перевірити</button>
                                `
                                finish.outerHTML = `
                                <div class="d-flex mx-auto" style="width: 70%">
                                    <div class="bg-info mx-auto show" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;" data-bs-toggle="modal" data-bs-target="#showModal">
                                        <h5 class="py-2" >Переглянути результат</h5>
                                    </div>
                                        <div class="bg-success mx-auto create" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                                            <h5 class="py-2" >Створити завдання</h5>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Перегляд кінцевого результату</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити перегляд</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                `
                                let modal_body = document.querySelector('.modal-body')
                                let task_body = document.querySelector('.task_body')
                                let texxx = ''
                                textt.forEach(e => {
                                    modal_body.innerHTML += e
                                    texxx += e
                                });
                                task_body.setAttribute('value', texxx)
                                let hidden = document.querySelector('.hidden')
                                hidden.innerHTML += `<button class="task_submit" type="submit">asd</button>`
                                let task_submit = document.querySelector('.task_submit')
                                let create = document.querySelector('.create')
                                create.addEventListener('click', function () {
                                    task_submit.click()
                                })
                            })
                        })
                    })
                }
            })
        } else
        {
            
        }

}