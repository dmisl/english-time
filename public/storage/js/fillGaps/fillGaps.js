let add_answers = document.querySelector('#add_answers')
let overview = document.querySelector('.overview')

add_answers.addEventListener('click', addAnswers)

function addAnswers() {
    add_answers.innerHTML = `
            <h3>${tr_answers}</h3>
            <label id="answers">

            </label>
            <label id="adding">
                <input placeholder="${tr_enter_the_answer}" class="answer_input" draggable="true">
                <label class="answer_accept" style="padding: 3px 7px; cursor:pointer"><img style="width: 20px;" src="${accept_icon}" alt=""></label>
            </label>
            <label hidden class="answer_add">+</label>
        `
    add_answers.removeEventListener('click', addAnswers)

    let scriptFillGapsAnswers = document.createElement("script")
    scriptFillGapsAnswers.setAttribute("src", scriptfAnswers)
    document.body.appendChild(scriptFillGapsAnswers)
}
