let add_answer = document.querySelector('.answer_add')
let answers = document.querySelector('#answers')
let answer_input = document.querySelector('.answer_input')
let answer_accept = document.querySelector('.answer_accept')
let adding = document.querySelector('#adding')
let next = document.querySelector('.next')
let text = ''


add_answer.addEventListener('click', function () {
    add_answer.setAttribute('hidden', '')
    adding.removeAttribute('hidden')
})
answer_accept.addEventListener('click', function () {
    add_answer.removeAttribute('hidden')
    let value = answer_input.value.toLowerCase()
    answers.innerHTML += `<label value="${value}" class="answer" draggable="true">` + answer_input.value + `</label>`
    answer_input.value = ''
    adding.setAttribute('hidden', '')
    if(answers.children.length >= 1)
    {
        next.removeAttribute('hidden')
    }
})
next.addEventListener('click', function () {
    next.setAttribute('hidden', '')
    let answerss = document.querySelectorAll('.answer')
    text += `<div class="answers my-3 border">
    <h2>Відповіді:</h2>`
    let arr = []
    for (let i = 0; i < answerss.length; i++) {
        arr.push(answerss[i].outerHTML)
    }
    shuffle(arr)
    arr.forEach(e => {
        text += e
    });
    text += '</div>'
    add_answers.outerHTML += `
        <div id="add_inputs" class="mt-3 mx-auto" style="width: 80%; border-radius: 15px;">
            <h4 class="mt-5">Добавити поля для перекладу автоматично?</h4>
            <div class="d-flex mx-auto mt-3" style="width: 120px;">
                <img id="auto_input" class="me-2" style="width: 50px; cursor: pointer;" src="${accept_icon}" alt="">
                <img id="manual_input" style="width: 50px; cursor: pointer;" src="${deny_icon}" alt="">
            </div>
        </div>
        `
    let add_inputs = document.querySelector('#add_inputs')
    let manual_input = document.querySelector('#manual_input')
    let auto_input = document.querySelector('#auto_input')

    manual_input.addEventListener('click', function () {
        add_inputs.innerHTML = addInputs_text
        let scriptInput = document.createElement("script");
        scriptInput.setAttribute("src", scriptInputs);
        document.body.appendChild(scriptInput);
    })

    auto_input.addEventListener('click', function () {
        addInputs_text = `
            <div>
                <table class="table table-dark table-bordered">
                    <tr>
                        <td style="width: 50%">Слово</td>
                        <td style="width: 50%">Переклад</td>
                    </tr>
                </table>
            </div>
            <div>
                <table class="table table-primary table-bordered mt-2 mb-0 inputs">


        `

        let answerss = document.querySelectorAll('.answer')
        for (let x = 0; x < answerss.length; x++) {
            let answerss_value = answerss[x].attributes.value.value
            let answerss_text = answerss[x].innerText
            addInputs_text += `
                <tr>
                    <td style="width: 47%">
                        <h5 class="word text-danger">Впишіть слово для перекладу</h5>
                    </td>
                    <td style="width: 47%">
                        <label class="input" answer="${answerss_value}"><h3>${answerss_text}</h3></label>
                    </td>
                    <td style="width: 6%">
                        <img class="mt-1 input_edit" style="height: 38px; cursor:pointer;" src="${edit_icon}" alt="">
                    </td>
                </tr>
            `
        }

        addInputs_text += `
                </table>
            </div>
            <div>
                <table class="table table-primary table-bordered input_adding" hidden>
                    <tr>
                        <td style="width: 47%">
                            <input type="text" placeholder="Слово" class="form-control text-center input_word">
                        </td>
                        <td style="width: 47%">
                            <input type="text" placeholder="Переклад" class="form-control text-center input_translation">
                        </td>
                        <td style="width: 6%;">
                            <img class="input_accept" style="height: 38px; cursor:pointer;" src="${accept_icon}" alt="">
                        </td>
                    </tr>
                </table>
            </div>
            <table class="table table-dark" style="cursor:pointer; user-select: none;">
                    <tr class="input_add">
                        <td class="w-50">+</td>
                    </tr>
            </table>
            <div class="d-flex mx-auto" style="width: 70%">
                <div hidden class="bg-success bg-gradient text-light mx-auto finish" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                    <h5 class="py-2" >Завершити редактування завдання</h5>
                </div>
            </div>
        `
        add_inputs.innerHTML = addInputs_text
        document.querySelector('.input_add').setAttribute('hidden', '')
        let scriptInput = document.createElement("script");
        scriptInput.setAttribute("src", scriptInputs);
        document.body.appendChild(scriptInput);
    })
})
