let add_answers = document.querySelector('#add_answers')
let next_section = document.querySelector('.next_section')
let overview = document.querySelector('.overview')

add_answers.addEventListener('click', addAnswers)

function addAnswers() {
    add_answers.innerHTML = `
            <h3>Відповіді</h3>
            <label id="answers">

            </label>
            <label id="adding">
                <input placeholder="Впишіть відповідь" class="answer_input" draggable="true">
                <label class="answer_accept" style="padding: 3px 7px; cursor:pointer"><img style="width: 20px;" src="${accept_icon}" alt=""></label>
            </label>
            <label class="answer_add">+</label>
        `
    next_section.innerHTML = `
            <div hidden class="bg-info mx-auto next" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
            <h5 class="py-2" >Перейти до наступного етапу</h5>
            </div>
        `
    add_answers.removeEventListener('click', addAnswers)

    let scriptFillGapsAnswers = document.createElement("script")
    scriptFillGapsAnswers.setAttribute("src", scriptfAnswers)
    document.body.appendChild(scriptFillGapsAnswers)
}
