// база даних

    let task_body = document.querySelector('.task_body')

// поле де буде змінюватись сенс завдання

let overview = document.querySelector('.overview')

// добавлення відповідей

let add_answers = document.querySelector('#add_answers')

add_answers.addEventListener('click', addAnswers)

function addAnswers()
{
    add_answers.innerHTML = `<h3>${tr_answers}</h3>
                    <label id="answers">

                    </label>
                    <label id="adding">
                        <input placeholder="${tr_enter_the_answer}" class="answer_input" draggable="true">
                        <label class="answer_accept" style="padding: 3px 7px; cursor:pointer"><img style="width: 20px;" src="${accept_icon}" alt=""></label>
                    </label>
                    <label class="answer_add" hidden>+</label>
                    `
    next_section.innerHTML = `
    <div hidden class="next bg-primary bg-gradient border mx-auto text-light" role="button" style="width: 30%; border-radius: 10px; user-select: none;">
        <h5 class="py-2" >${tr_go_to_the_next_step}</h5>
    </div>`
    let scriptEle = document.createElement("script");
    scriptEle.setAttribute("src", scriptAnswers);
    document.body.appendChild(scriptEle);
    add_answers.removeEventListener('click', addAnswers)
}


    let next_section = document.querySelector('.next_section')

    let addInputs_text = `
        <div>
            <table class="table table-dark table-bordered">
                <tr>
                    <td style="width: 50%">${tr_word}</td>
                    <td style="width: 50%">${tr_translation}</td>
                </tr>
            </table>
        </div>
        <div>
            <table class="table table-primary table-bordered mt-2 mb-0 inputs">

            </table>
        </div>
        <div>
            <table class="table table-primary table-bordered input_adding">
                <tr>
                    <td style="width: 47%">
                        <input type="text" placeholder="${tr_word}" class="form-control text-center input_word">
                    </td>
                    <td style="width: 47%">
                        <input type="text" placeholder="${tr_translation}" class="form-control text-center input_translation">
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
            <div hidden class="bg-success mx-auto finish" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                <h5 class="py-2" >${tr_finish_editing_the_task}</h5>
            </div>
        </div>
    `
