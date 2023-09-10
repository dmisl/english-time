// вставлення картинки

let image_add = document.querySelector('#image_add')
let image_yes = document.querySelector('.image_yes')
let image_no = document.querySelector('.image_no')

image_yes.addEventListener('click', function () {
    image_add.innerHTML = `
        <h3 style="user-select: none;">
            Виберіть спосіб вставлення картинки
        </h3>
        <div class="d-flex mx-auto" style="width: 70%;">
            <div class="image_load" data-bs-toggle="modal" data-bs-target="#loadModal" style="cursor: pointer; width: 47%; margin-right: 6%; border: 1px solid black; border-radius: 5px; background-color: #2aa1e6; padding: 3px 10px; user-select: none;">
                Загрузити
            </div>
            <div class="image_link" data-bs-toggle="modal" data-bs-target="#linkModal" style="cursor: pointer; width: 47%; border: 1px solid black; border-radius: 5px; background-color: #2aa1e6; padding: 3px 10px; user-select: none;">
                Вставити ссилку
            </div>
        </div>
        <div class="modal fade" id="loadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Загруження картинки</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary my-3 btn-lg call_upload">Загрузити картинку</button>
                    <img class="image w-100" src="#" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary image_file_close" data-bs-dismiss="modal">Закрити</button>
                    <button disabled type="button" class="btn btn-primary image_file_add">Добавити картинку</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Вставлення картинки через ссилку
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>
                        Вставте URL-ссилку до картинки
                    </label>
                    <input id="image_link_input" class="form-control text-center" style="border: 1px solid black;" type="text">
                    <img class="link_overview w-100 mt-2" src="#">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary image_link_close" data-bs-dismiss="modal">Закрити</button>
                    <button disabled type="button" class="btn btn-primary image_link_add">Добавити картинку</button>
                </div>
                </div>
            </div>
        </div>
    `

    let call_upload = document.querySelector('.call_upload')
    let task_image = document.querySelector('.task_image')

    call_upload.addEventListener('click', function () {
        task_image.click()
    })

    let image_file_input = document.querySelector('.image_file_input')
    let image = document.querySelector('.image')
    let image_file_close = document.querySelector('.image_file_close')
    let image_file_add = document.querySelector('.image_file_add')
    let image_src = ''

    task_image.addEventListener('change', function () {
        let file = task_image.files[0]
        if(file)
        {
            image.src = URL.createObjectURL(file)
            image_src = URL.createObjectURL(file)
            image_file_add.removeAttribute('disabled')
        }
    })


    image_file_add.addEventListener('click', function () {
        image_file_close.click()
        image_add.outerHTML = `
            <div class="imagee">
                <img style="width: 80%; margin: 20px; auto; border-radius: 15px;" src="${image_src}">
            </div>
            <div class="bg-info mx-auto next mt-3" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                <h5 class="py-2" >Перейти до наступного етапу</h5>
            </div>
        `

        let next = document.querySelector('.next')
        next.addEventListener('click', function () {
            let replace_from = document.querySelector('.replace_from')
            let replace_to = document.querySelector('.replace_to')
            replace_from.setAttribute('value', image_src)
            replace_to.setAttribute('value', asset)
            textt[1] = `<img style="width: 80%; margin: 20px; auto; border-radius: 15px;" src="${image_src}">`
            next.outerHTML = `
            <div class="add_answers my-3">
                <div class="answersss" style="overflow: hidden; width: 60%; display: flex; margin: 0 auto; border: 1px solid black; border-radius: 10px;">
                    <div class="answer1 radio_edit" style="cursor: pointer; padding: 10px 0; width: 33%;">
                        <label class="radio_label" style="cursor:pointer;" for="first" >First</label>
                        <input class="radio_input" style="display: none;" type="radio" name="answer" id="first">
                    </div>
                    <div class="answer2 radio_edit" style="cursor: pointer; padding: 10px 0; width: 33%; border-left: 1px solid black;">
                        <label class="radio_label" style="cursor:pointer;" for="second">Second</label>
                        <input class="radio_input" style="display: none;" type="radio" name="answer" id="second">
                    </div>
                    <div class="answer3 radio_edit" style="z-index: 999; cursor: pointer; padding: 10px 0; width: 34%; border-left: 1px solid black;">
                        <label class="radio_label" style="cursor:pointer;" for="third">Third</label>
                        <input class="radio_input" style="display: none;" type="radio" name="answer" id="third">    
                    </div>
                </div>
                <p style="user-select: none; font-size: 15px;" class="mt-1 mb-0">Для змінення тексту варіанту відповіді, нажміть на потрібний вам варіант</p>
                <p style="user-select: none; font-size: 12px;" class="text-muted my-0">Рекомендую змінити всі варіанти перед переходом до наступного етапу</p>
                <div class="bg-info mx-auto next mt-3" hidden style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                    <h5 class="py-2" >Перейти до наступного етапу</h5>
                </div>
            </div>
            `
            let scriptAddAnswers = document.createElement("script")
            scriptAddAnswers.setAttribute("src", scriptABCAnswers)
            document.body.appendChild(scriptAddAnswers)
        })
    })

    let image_link_input = document.querySelector('#image_link_input')
    let link_overview = document.querySelector('.link_overview')
    let image_link_add = document.querySelector('.image_link_add')
    
    image_link_input.addEventListener('keyup', function (e) {
        link_overview.src = image_link_input.value
        image_link_add.removeAttribute('disabled')
        if(e.keyCode === 13)
        {
            image_link_add.click()
        }
    })

    image_link_add.addEventListener('click', image_link_add_func)
})

function image_link_add_func()
{
    let image_link_close = document.querySelector('.image_link_close')
    let image_link_input = document.querySelector('#image_link_input')


    image_link_close.click()
    image_add.outerHTML = `
        <div class="imagee">
            <img style="width: 80%; margin: 20px; auto; border-radius: 15px;" src="${image_link_input.value}">
        </div>
        <div class="bg-info mx-auto next mt-3" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
            <h5 class="py-2" >Перейти до наступного етапу</h5>
        </div>    
    `
    let next = document.querySelector('.next')
    next.addEventListener('click', function () {
        textt[1] = `<img style="width: 80%; margin: 20px; auto; border-radius: 15px;" src="${image_link_input.value}">`
        next.outerHTML = `
        <div class="add_answers my-3">
            <div class="answersss" style="overflow: hidden; width: 60%; display: flex; margin: 0 auto; border: 1px solid black; border-radius: 10px;">
                <div class="answer1 radio_edit" class="radio_label" for="first" style="cursor: pointer; padding: 10px 0; width: 33%;">
                    <label>First</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="first">
                </div>
                <div class="answer2 radio_edit" style="cursor: pointer; padding: 10px 0; width: 33%; border-left: 1px solid black;">
                    <label class="radio_label" style="cursor:pointer;" for="second">Second</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="second">
                </div>
                <div class="answer3 radio_edit" style="z-index: 999; cursor: pointer; padding: 10px 0; width: 34%; border-left: 1px solid black;">
                    <label class="radio_label" style="cursor:pointer;" for="third">Third</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="third">    
                </div>
            </div>
            <p style="user-select: none; font-size: 15px;" class="mt-1 mb-0">Для змінення тексту варіанту відповіді, нажміть на потрібний вам варіант</p>
            <p style="user-select: none; font-size: 12px;" class="text-muted my-0">Рекомендую змінити всі варіанти перед переходом до наступного етапу</p>
            <div class="bg-info mx-auto next mt-3" hidden style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                <h5 class="py-2" >Перейти до наступного етапу</h5>
            </div>
        </div>
        `
        let scriptAddAnswers = document.createElement("script")
        scriptAddAnswers.setAttribute("src", scriptABCAnswers)
        document.body.appendChild(scriptAddAnswers)
    })
}

image_no.addEventListener('click', function () {
    image_add.outerHTML = `
        <div class="bg-info mx-auto next mt-3" style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
            <h5 class="py-2" >Перейти до наступного етапу</h5>
        </div>    
    `
    let next = document.querySelector('.next')
    next.addEventListener('click', function () {
        textt[1] = ``
        next.outerHTML = `
        <div class="add_answers my-3">
            <div class="answersss" style="overflow: hidden; width: 60%; display: flex; margin: 0 auto; border: 1px solid black; border-radius: 10px;">
                <div class="answer1 radio_edit" class="radio_label" for="first" style="cursor: pointer; padding: 10px 0; width: 33%;">
                    <label>First</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="first">
                </div>
                <div class="answer2 radio_edit" style="cursor: pointer; padding: 10px 0; width: 33%; border-left: 1px solid black;">
                    <label class="radio_label" style="cursor:pointer;" for="second">Second</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="second">
                </div>
                <div class="answer3 radio_edit" style="z-index: 999; cursor: pointer; padding: 10px 0; width: 34%; border-left: 1px solid black;">
                    <label class="radio_label" style="cursor:pointer;" for="third">Third</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="third">    
                </div>
            </div>
            <p style="user-select: none; font-size: 15px;" class="mt-1 mb-0">Для змінення тексту варіанту відповіді, нажміть на потрібний вам варіант</p>
            <p style="user-select: none; font-size: 12px;" class="text-muted my-0">Рекомендую змінити всі варіанти перед переходом до наступного етапу</p>
            <div class="bg-info mx-auto next mt-3" hidden style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                <h5 class="py-2" >Перейти до наступного етапу</h5>
            </div>
        </div>
        `
        let scriptAddAnswers = document.createElement("script")
        scriptAddAnswers.setAttribute("src", scriptABCAnswers)
        document.body.appendChild(scriptAddAnswers)
    })
})