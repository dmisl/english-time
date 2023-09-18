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
    add_answer.setAttribute('hidden', '')
})
answer_accept.addEventListener('click', function () {
    add_answer.removeAttribute('hidden')
    let value = answer_input.value.toLowerCase()
    answers.innerHTML += `<label value="${value}" class="answer" draggable="true">` + answer_input.value + `</label>`
    answer_input.value = ''
    adding.setAttribute('hidden', '')
    if (answers.children.length >= 1) {
        next.removeAttribute('hidden')
        next.addEventListener('click', function () {
            add_answer.setAttribute('hidden', '')
            next.outerHTML = `
                <div class="add_inputs mb-3">
                    <div style="height: 38px;">
                        <div class="btn btn-primary bold " hidden>
                            ${tr_make_the_highlighted_answer}
                        </div>
                        </div>
                        <div class="mx-auto editor mt-2" style="width: 80%; height: 300px; border: 1px solid black; border-radius: 20px;" contenteditable="true"></div>
                        <p style="user-select: none;" class="mb-0">${tr_in_this_task_you_need_to_write_the_text_and_highlight_the_word_that_you_will_need_to_insert_the_answer_in_its_place}</p>
                        <p style="user-select: none;">${tr_we_advise_you_to_paste_the_answers_after_filling_in_the_text_to_avoid_problems}</p>
                    </div>
                </div>
                <div hidden class="btn btn-success text-light mx-auto my-3 finish" style="width: 30%;">
                    ${tr_finish_editing_the_task}
                </div>
            `

            let finish = document.querySelector('.finish')
            finish.addEventListener('click', function () {
                let pchildren = document.querySelector('.add_inputs').children
                for (let i = 0; i < pchildren.length; i++) {
                    if(pchildren[i].tagName == 'P')
                    {
                        pchildren[i].setAttribute('hidden', '')
                    }
                }
                editor.removeAttribute('contenteditable')
                editor.style.userSelect = "none"
                document.removeEventListener("selectionchange", select_to_bold);
                let inputas = document.querySelectorAll('.inputas')
                body += '<div class="mx-auto" style="width: 80%;"><p><i class="text">'
                body += editor.innerHTML
                inputas.forEach(e => {
                    body = body.replace(e.outerHTML, `</i><label class="input" answer="${e.innerText.toLowerCase()}"></label><i class="text">`)
                });
                body += `</i></p></div>
                            <button type="button" disabled class="btn btn-primary" id="check">${tr_check}</button>
                        `
                finish.outerHTML = `
                            <div class="d-flex mx-auto" style="width: 70%">
                                <div class="bg-primary bg-gradient text-light mx-auto show" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;" data-bs-toggle="modal" data-bs-target="#showModal">
                                    <h5 class="py-2">${tr_view_the_result}</h5>
                                </div>
                                <div class="bg-success bg-gradient text-light mx-auto create" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                                    <h5 class="py-2">${tr_create_a_task}</h5>
                                </div>
                                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">${tr_view_the_final_result}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ${body}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">${tr_close_view}</button>
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
            body += `<div class="my-3 bg-success bg-gradient border" id="add_answers" style="cursor: pointer;">
                        <h3>${tr_answers}</h3>
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

            document.addEventListener("selectionchange", select_to_bold);

            function select_to_bold() {
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
            }

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
