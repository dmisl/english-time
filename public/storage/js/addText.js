// ABC

let textt = []
// вставлення тексту

let add_text = document.querySelector('#text_edit')
let next = document.querySelector('.next')

add_text.addEventListener('click', text_add)

function text_add() {
    let text = document.querySelector('#text_edit')
    text.outerHTML = `
        <div class="text-adding" style="width: 80%; background-color: aqua; margin: 0 auto; margin-top: 20px;">
            <input type="text" class="form-control text-value" style="border: 1px solid black; font-size: 25px; text-align: center;">
        </div>
        <div class="text-accept" hidden style="width: 50px; margin: 0 auto; background-color: aqua; border-radius: 100%; margin-top: 15px; cursor: pointer;">
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
                <p class="my-0 small text-muted">Нажміть щоб відредактувати текст</p>
            </div>
        `
        text_accept.setAttribute('hidden', '')
        let text = document.querySelector('#text_edit')
        text.addEventListener('click', function () {
            text_edit()
        })
        next.removeAttribute('hidden')
        next.addEventListener('click', function () {
            let v = document.querySelector('.text-text').innerText
            textt[0] = `<p class="mt-3 mb-0 text-text" style="font-size: 30px;">${v}</p>`

            next.outerHTML = `
                <div id="image_add" style="width: 80%; padding: 10px 0; background-color: aqua; border: 1px solid black; border-radius: 15px; margin: 0 auto; margin-top: 20px;">
                    <h3 style="user-select: none;">
                        Добавити картинку?
                    </h3>
                    <div class="d-flex mx-auto" style="width: 35%;">
                        <div class="image_yes" style="cursor: pointer; width: 47%; margin-right: 6%; border: 1px solid black; border-radius: 5px; background-color: #2aa1e6; padding: 3px 10px; user-select: none;">
                            Так
                        </div>
                        <div class="image_no" style="cursor: pointer; width: 47%; border: 1px solid black; border-radius: 5px; background-color: #2aa1e6; padding: 3px 10px; user-select: none;">
                            Ні
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
        <div class="text-accept" hidden style="width: 50px; margin: 0 auto; background-color: aqua; border-radius: 100%; margin-top: 15px; cursor: pointer;">
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
                <p class="my-0 small text-muted">Нажміть щоб відредактувати текст</p>
            </div>
        `
        text_accept.setAttribute('hidden', '')
        let text = document.querySelector('#text_edit')
        text.addEventListener('click', function () {
            text_add()
        })
        next.removeAttribute('hidden')
        next.addEventListener('click', function () {
            let v = document.querySelector('.text-text').innerText
            textt[0] = `<p class="mt-3 mb-0 text-text" style="font-size: 30px;">${v}</p>`
            next.outerHTML = `
                <div id="image_add" style="width: 80%; padding: 10px 0; background-color: aqua; border: 1px solid black; border-radius: 15px; margin: 0 auto; margin-top: 20px;">
                    <h3 style="user-select: none;">
                        Добавити картинку?
                    </h3>
                    <div class="d-flex mx-auto" style="width: 35%;">
                        <div class="image_yes" style="cursor: pointer; width: 47%; margin-right: 6%; border: 1px solid black; border-radius: 5px; background-color: #2aa1e6; padding: 3px 10px; user-select: none;">
                            Так
                        </div>
                        <div class="image_no" style="cursor: pointer; width: 47%; border: 1px solid black; border-radius: 5px; background-color: #2aa1e6; padding: 3px 10px; user-select: none;">
                            Ні
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
