let add_answer = document.querySelector('.answer_add')
let answers = document.querySelector('#answers')
let answer_input = document.querySelector('.answer_input')
let answer_accept = document.querySelector('.answer_accept')
let adding = document.querySelector('#adding')
let next = document.querySelector('.next')
let text = ''
let body = ''

add_answer.addEventListener('click', function () {
    adding.removeAttribute('hidden')
})
answer_accept.addEventListener('click', function () {
    let value = answer_input.value.toLowerCase()
    answers.innerHTML += `<label value="${value}" class="answer" draggable="true">` + answer_input.value + `</label>`
    answer_input.value = ''
    adding.setAttribute('hidden', '')
    if (answers.children.length >= 1) {
        next.removeAttribute('hidden')
        next.addEventListener('click', function () {
            next.outerHTML = `
                        <div class="add_inputs">
                            <div style="height: 38px;">
                                <div class="btn btn-primary bold " hidden>
                                    Зробити виділене відповіддю
                                </div>
                            </div>
                            <div class="mx-auto editor mt-2" style="width: 80%; height: 300px; border: 1px solid black; border-radius: 20px;" contenteditable="true"></div>
                                <p style="user-select: none;" class="mb-0">В цьому завданні, вам потрібно вписати текст і виділити те слово, на місце якого потрібно буде вставити відповідь</p>
                                <p style="user-select: none;">Раджу вставляти відповіді після повного заповнення тексту для уникнення проблем</p>
                            </div>
                        </div>
                        <div hidden class="btn btn-success mx-auto my-3 finish" style="width: 30%;">
                            Завершити редактування
                        </div>
                    `

            let finish = document.querySelector('.finish')
            finish.addEventListener('click', function () {
                let inputas = document.querySelectorAll('.inputas')
                body += '<p><i class="text">'
                body += editor.innerHTML
                inputas.forEach(e => {
                    body = body.replace(e.outerHTML, `</i><label class="input" answer="${e.innerText.toLowerCase()}"></label><i class="text">`)
                });
                body += `</i></p>
                            <button type="button" class="btn btn-primary" id="check">Перевірити</button>
                        `
                finish.outerHTML = `
                            <div class="d-flex mx-auto" style="width: 70%">
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
                                                ${body}
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
                let store = document.querySelector('.task_submit')
                let task_body = document.querySelector('.task_body')
                create.addEventListener('click', function () {
                    task_body.value = body
                    store.click()
                })
            })
            let answerss = document.querySelectorAll('.answer')
            body += `<div class="my-3" id="add_answers" style="cursor: pointer; border: 1px solid black;">
                        <h3>Відповіді</h3>
                    `
            for (let i = 0; i < answerss.length; i++) {
                body += answerss[i].outerHTML
            }
            body += `</div>`

            next.setAttribute('hidden', '')
            let editor = document.querySelector('.editor')
            let bold = document.querySelector('.bold')
            let selected = ''
            let text = ''

            document.addEventListener("selectionchange", () => {
                if (window.getSelection) {
                    txt = window.getSelection();
                } else if (window.document.getSelection) {
                    txt = window.document.getSelection();
                } else if (window.document.selection) {
                    txt = window.document.selection.createRange().text;
                }
                bold.addEventListener('click', makeBold)
                selected = txt
                text += selected
                if (text.length >= 1) {
                    bold.removeAttribute('hidden')
                } else {
                    bold.setAttribute('hidden', '')
                }
                text = ''
            });

            function makeBold() {
                text += selected
                let wholetext = editor.innerHTML
                if (wholetext.includes('<b class="inputas">' + text + '</b>')) {
                    wholetext = wholetext.replace('<b class="inputas">' + text + '</b>', text)
                }
                else if (wholetext.includes('<b>' + text + '</b>')) {
                    wholetext = wholetext.replace('<b>' + text + '</b>', text)
                } else {
                    wholetext = wholetext.replace(text, `<b class="inputas">` + text + `</b>`)
                }
                editor.innerHTML = wholetext
                bold.removeEventListener('click', makeBold)
                text = ''
                bold.setAttribute('hidden', '')
                check_inputs()
            }

            function check_inputs() {
                let inputas = document.querySelectorAll('.inputas')
                let answers = document.querySelectorAll('.answer')

                if (parseInt(answers.length) == parseInt(inputas.length)) {
                    count = 0
                    for (let i = 0; i < answers.length; i++) {
                        inputas.forEach(e => {
                            if (answers[i].innerText.toLowerCase() == e.innerText.toLowerCase()) {
                                count++
                            }
                        });
                    }
                    if (count == answers.length) {
                        finish.removeAttribute('hidden')
                    } else {
                        finish.setAttribute('hidden', '')
                    }
                }
            }
        })
    }
})
