// final result
let result = ''

// Text adding

let add_text = document.querySelector('.add_text')

// next stage button
let next = document.querySelector('.next')

// yes button

let yes = document.querySelector('.yes')

// add eventlistener for button

yes.addEventListener('click', function () {
    // after clicking we`ll change innerhtml to input
    add_text.innerHTML = `
        <div class="input-group input-group-lg">
            <input type="text" class="text_input form-control" placeholder="Some text" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="text_change btn btn-success" disabled type="button" id="button-addon2">&#10003;</button>
        </div>
    `
    // after changing HTML I`ll give our input and button eventlisteners
    // input keyup to remove disabled attribute from button
    // and to button to change add_text`s innerHTML

    let text_input = document.querySelector('.text_input')
    let text_change = document.querySelector('.text_change')

    text_input.addEventListener('keyup', function () {
        text_change.removeAttribute('disabled')
    })

    text_change.addEventListener('click', function () {  
        add_text.outerHTML = `
            <div class="text_edit mx-auto mt-3" style="overflow: hidden; user-select: none; width: 80%; border-radius: 15px;">
                <p class="mb-0 text_text" style="font-size: 30px;">${text_input.value}</p>
                <p class="my-0 small text-muted">Нажміть щоб відредактувати текст</p>
            </div>
        `
        // after adding text I`ll create a function for editing this text

        next.removeAttribute('hidden')

        let text_edit = document.querySelector('.text_edit')
        text_edit.addEventListener('click', edit_text) 
    })
})

function edit_text() {

    next.setAttribute('hidden', '')

    // div where our text`ve been placed 
    let text_edit = document.querySelector('.text_edit')
    // text which will be defined
    let text_text = document.querySelector('.text_text')

    // changing our div to a form with input and button
    text_edit.outerHTML = `
        <div class="text_edit mx-auto mt-3" style="border: 1px solid black; overflow: hidden; user-select: none; width: 80%; border-radius: 15px;">
            <div class="input-group input-group-lg">
                <input type="text" class="text_input form-control" placeholder="Some text" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="text_change btn btn-success" disabled type="button" id="button-addon2">&#10003;</button>
            </div>
        </div>
    `
    
    let text_input = document.querySelector('.text_input')
    let text_change = document.querySelector('.text_change')

    text_input.addEventListener('keyup', function () {
        text_change.removeAttribute('disabled')
    })

    text_change.addEventListener('click', function () {  
        document.querySelector('.text_edit').outerHTML = `
            <div class="text_edit mx-auto mt-3" style="overflow: hidden; user-select: none; width: 80%; border-radius: 15px;">
                <p class="mb-0 text_text" style="font-size: 30px;">${text_input.value}</p>
                <p class="my-0 small text-muted">Нажміть щоб відредактувати текст</p>
            </div>
        `
        // after adding text I`ll create a function for editing this text
        next.removeAttribute('hidden')
        let text_edit = document.querySelector('.text_edit')
        text_edit.addEventListener('click', edit_text) 
    })

}


// no button

let no = document.querySelector('.no')

no.addEventListener('click', function() {
    add_text.outerHTML = ``
    next.removeAttribute('hidden')
})

// next function

next.addEventListener('click', function() {
    next.outerHTML = `
        <div class="add_inputs mx-auto" style="width: 80%;">
            <div style="height: 38px;">
                <div class="btn btn-primary bold" hidden>
                    Зробити виділене відповіддю
                </div>
                <div class="btn btn-primary unbold" hidden>
                    Видалити відповідь (виділене)
                </div>
            </div>
            <div class="mx-auto editor mt-2" style="height: 300px; border: 1px solid black; border-radius: 20px;" contenteditable="true"></div>
            <p style="user-select: none;" class="mb-0">В цьому завданні, вам потрібно вписати текст і виділити те слово, на місце якого <b>учню</b> потрібно буде <b>вписати</b> відповідь</p>
            <p style="user-select: none;"><b>Раджу вставляти відповіді після повного заповнення тексту для уникнення проблем</b></p>
        </div>

        <div hidden class="finish btn btn-success mx-auto my-3" style="width: 30%;">
            Завершити редактування
        </div>
    `

    result += document.querySelector('.text_text').outerHTML

    let scriptAddInputs = document.createElement("script");
    scriptAddInputs.setAttribute("src", scriptIAddInputs);
    document.body.appendChild(scriptAddInputs);
})