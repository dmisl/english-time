// ABC

let textt = []
// вставлення тексту

let add_text = document.querySelector('#text_edit')
let next = document.querySelector('.next')

add_text.addEventListener('click', text_add)

function text_add() {
    let text = document.querySelector('#text_edit')
    text.outerHTML = `
        <div class="text-adding bg-primary bg-gradient mx-auto" style="width: 80%; margin-top: 20px;">
            <input type="text" class="form-control text-value border text-center" style="font-size: 25px;">
        </div>
        <div class="text-accept mx-auto bg-primary bg-gradient" role="button" hidden style="width: 50px; border-radius: 100%; margin-top: 15px;">
            <img style="width: 100%;" src="${accept_icon}" alt="">
        </div>
    `
    let text_value = document.querySelector('.text-value')
    let text_adding = document.querySelector('.text-adding')
    let text_accept = document.querySelector('.text-accept')
    text_value.addEventListener('keyup', function (e) {
        if(text_value.value.length >= 1)
        {
            text_accept.removeAttribute('hidden')
        } else
        {
            text_accept.setAttribute('hidden', '')
        }
        if(e.keyCode === 13)
        {
            text_accept.click()
        }
    })
    text_accept.addEventListener('click', function () {
        let value = text_value.value
        text_adding.outerHTML = `
            <div id="text_edit" style="user-select: none; cursor: pointer;">
                <p class="mt-3 mb-0 text-text" style="font-size: 30px;">${value}</p>
                <p class="my-0 small text-muted">${tr_tap_to_edit_the_text}</p>
            </div>
        `
        text_accept.setAttribute('hidden', '')
        let text = document.querySelector('#text_edit')
        text.addEventListener('click', text_edit)
        next.removeAttribute('hidden')
        next.addEventListener('click', function () {
            text.children[1].setAttribute('hidden', '');
            text.removeEventListener('click', text_edit)
            let v = document.querySelector('.text-text').innerText
            textt[0] = `<p class="mt-3 mb-0 text-text" style="font-size: 30px;">${v}</p>`

            next.outerHTML = `
                <div id="image_add" class="bg-primary bg-gradient text-light mx-auto border" style="width: 80%; padding: 10px 0; border-radius: 15px; margin-top: 20px;">
                    <h3 style="user-select: none;">
                        ${tr_add_a_picture_q}
                    </h3>
                    <div class="d-flex mx-auto" style="width: 35%;">
                        <div class="image_yes border bg-success bg-gradient border" style="cursor: pointer; width: 47%; margin-right: 6%; border-radius: 5px; padding: 3px 10px; user-select: none;">
                            ${tr_yes}
                        </div>
                        <div class="image_no border bg-success bg-gradient border" style="cursor: pointer; width: 47%; border-radius: 5px; padding: 3px 10px; user-select: none;">
                            ${tr_no}
                        </div>
                    </div>
                </div>
            `
            let scriptAddImage = document.createElement("script")
            scriptAddImage.setAttribute("src", scriptABCImage)
            document.body.appendChild(scriptAddImage)
        })
    })
}

function text_edit()
{
    let text = document.querySelector('#text_edit')
    next.setAttribute('hidden', '')
    let text_text = document.querySelector('.text-text')
    text.outerHTML = `
        <div class="text-adding" style="width: 80%; background-color: aqua; margin: 0 auto; margin-top: 20px;">
            <input type="text" value="${text_text.innerText}" class="form-control text-value" style="border: 1px solid black; font-size: 25px; text-align: center;">
        </div>
        <div class="text-accept bg-primary bg-gradient mx-auto" role="button" hidden style="width: 50px; border-radius: 100%; margin-top: 15px; cursor: pointer;">
            <img style="width: 100%;" src="${accept_icon}" alt="">
        </div>
    `
    let text_value = document.querySelector('.text-value')
    let text_adding = document.querySelector('.text-adding')
    let text_accept = document.querySelector('.text-accept')
    text_value.addEventListener('keyup', function () {
        if(text_value.value.length >= 1)
        {
            text_accept.removeAttribute('hidden')
        } else
        {
            text_accept.setAttribute('hidden', '')
        }
    })
    text_accept.addEventListener('click', function () {
        let value = text_value.value
        text_adding.outerHTML = `
            <div id="text_edit" style="user-select: none; cursor: pointer;">
                <p class="mt-3 mb-0 text-text" style="font-size: 30px;">${value}</p>
                <p class="my-0 small text-muted">${tr_tap_to_edit_the_text}</p>
            </div>
        `
        text_accept.setAttribute('hidden', '')
        let text = document.querySelector('#text_edit')
        text.addEventListener('click', function () {
            text_add()
        })
        next.removeAttribute('hidden')
        next.addEventListener('click', function () {
            document.querySelector('#text_edit').children[1].setAttribute('hidden', '')
            let v = document.querySelector('.text-text').innerText
            textt[0] = `<p class="mt-3 mb-0 text-text" style="font-size: 30px;">${v}</p>`
            next.outerHTML = `
                <div role="button" class="image_add bg-primary bg-gradient text-light border mx-auto" style="width: 80%; padding: 10px 0; border-radius: 15px; margin-top: 20px;">
                    <h3 style="user-select: none;">
                        ${tr_add_a_picture_q}
                    </h3>
                    <div class="d-flex mx-auto" style="width: 35%;">
                        <div class="image_yes border bg-success bg-gradient" role="button" style=" width: 47%; margin-right: 6%; border-radius: 5px; padding: 3px 10px; user-select: none;">
                            ${tr_yes}
                        </div>
                        <div class="image_no border bg-success bg-gradient" role="button" style="width: 47%; border-radius: 5px; padding: 3px 10px; user-select: none;">
                            ${tr_no}
                        </div>
                    </div>
                </div>
            `
            let scriptAddImage = document.createElement("script")
            scriptAddImage.setAttribute("src", scriptABCImage)
            document.body.appendChild(scriptAddImage)
        })
    })
}
