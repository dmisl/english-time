// вставлення картинки

let image_add = document.querySelector('#image_add')
let image_yes = document.querySelector('.image_yes')
let image_no = document.querySelector('.image_no')

image_yes.addEventListener('click', function () {
    image_add.innerHTML = `
        <h3 style="user-select: none;">
            ${tr_choose_a_way_to_insert_a_picture}
        </h3>
        <div class="d-flex mx-auto" style="width: 70%;">
            <div class="image_load border bg-success bg-gradient" data-bs-toggle="modal" data-bs-target="#loadModal" style="cursor: pointer; width: 47%; margin-right: 6%; border-radius: 5px; padding: 3px 10px; user-select: none;">
                ${tr_upload}
            </div>
            <div class="image_link border bg-success bg-gradient" data-bs-toggle="modal" data-bs-target="#linkModal" style="cursor: pointer; width: 47%; border-radius: 5px; padding: 3px 10px; user-select: none;">
                ${tr_insert_link}
            </div>
        </div>
        <div class="modal fade" id="loadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">${tr_uploading_a_picture}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary my-3 btn-lg call_upload">${tr_upload_a_picture}</button>
                    <img class="image" style="height: 300px; width: 100%;" src="#" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary image_file_close" data-bs-dismiss="modal">${tr_close}</button>
                    <button disabled type="button" class="btn btn-primary image_file_add">${tr_add_a_picture}</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        ${tr_insert_a_picture_through_a_link}
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>
                        ${tr_paste_a_URL_link_to_the_image}
                    </label>
                    <input id="image_link_input" class="form-control text-center" style="border: 1px solid black;" type="text">
                    <img class="link_overview w-100 mt-2" src="#">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary image_link_close" data-bs-dismiss="modal">${tr_close}</button>
                    <button disabled type="button" class="btn btn-primary image_link_add">${tr_add_a_picture}</button>
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
                <img style="width: 60%; height: 400px; margin: 20px; auto; border-radius: 15px;" src="${image_src}">
            </div>
            <div class="bg-primary bg-gradient mx-auto next mt-3 border" style="width: 30%; border-radius: 10px; cursor:pointer; user-select: none;">
                <h5 class="py-2" >${tr_go_to_the_next_step}</h5>
            </div>
        `

        let next = document.querySelector('.next')
        next.addEventListener('click', function () {
            let replace_from = document.querySelector('.replace_from')
            let replace_to = document.querySelector('.replace_to')
            replace_from.setAttribute('value', image_src)
            replace_to.setAttribute('value', asset)
            textt[1] = `<img style="width: 60%; height: 400px; margin: 20px; auto; border-radius: 15px;" src="${image_src}">`
            next.outerHTML = `
            <div class="add_answers my-3">
                <div class="answersss" style="overflow: hidden; width: 60%; display: flex; margin: 0 auto; border: 1px solid black; border-radius: 10px;">
                    <div class="answer1 radio_edit bg-light" style="cursor: pointer; padding: 10px 0; width: 33%;">
                        <label class="radio_label" style="cursor:pointer;" for="first" >First</label>
                        <input class="radio_input" style="display: none;" type="radio" name="answer" id="first">
                    </div>
                    <div class="answer2 radio_edit bg-light" style="cursor: pointer; padding: 10px 0; width: 33%; border-left: 1px solid black;">
                        <label class="radio_label" style="cursor:pointer;" for="second">Second</label>
                        <input class="radio_input" style="display: none;" type="radio" name="answer" id="second">
                    </div>
                    <div class="answer3 radio_edit bg-light" style="z-index: 999; cursor: pointer; padding: 10px 0; width: 34%; border-left: 1px solid black;">
                        <label class="radio_label" style="cursor:pointer;" for="third">Third</label>
                        <input class="radio_input" style="display: none;" type="radio" name="answer" id="third">
                    </div>
                </div>
                <p style="user-select: none; font-size: 15px;" class="mt-1 mb-0">${tr_to_change_the_text_of_an_answer_option_click_on_the_option_you_want}</p>
                <p style="user-select: none; font-size: 12px;" class="text-muted my-0">${tr_i_recommend_changing_all_options_before_moving_on_to_the_next_stage}</p>
                <div class="bg-primary bg-gradient mx-auto next mt-3" hidden style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                    <h5 class="py-2" >${tr_go_to_the_next_step}</h5>
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
            <img style="width: 60%; height: 400px; margin: 20px; auto; border-radius: 15px;" src="${image_link_input.value}">
        </div>
        <div class="bg-primary bg-gradient border text-light mx-auto next mt-3" style="width: 30%; border-radius: 10px; cursor:pointer; user-select: none;">
            <h5 class="py-2" >${tr_go_to_the_next_step}</h5>
        </div>
    `
    let next = document.querySelector('.next')
    next.addEventListener('click', function () {
        textt[1] = `<img style="width: 60%; 400px; margin: 20px auto; border-radius: 15px;" src="${image_link_input.value}">`
        next.outerHTML = `
        <div class="add_answers my-3">
            <div class="answersss" style="overflow: hidden; width: 60%; display: flex; margin: 0 auto; border: 1px solid black; border-radius: 10px;">
                <div class="answer1 radio_edit bg-light" style="cursor: pointer; padding: 10px 0; width: 33%;">
                    <label class="radio_label" style="cursor:pointer;" for="first">First</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="first">
                </div>
                <div class="answer2 radio_edit bg-light" style="cursor: pointer; padding: 10px 0; width: 33%; border-left: 1px solid black;">
                    <label class="radio_label" style="cursor:pointer;" for="second">Second</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="second">
                </div>
                <div class="answer3 radio_edit bg-light" style="z-index: 999; cursor: pointer; padding: 10px 0; width: 34%; border-left: 1px solid black;">
                    <label class="radio_label" style="cursor:pointer;" for="third">Third</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="third">
                </div>
            </div>
            <p style="user-select: none; font-size: 15px;" class="mt-1 mb-0">${tr_to_change_the_text_of_an_answer_option_click_on_the_option_you_want}</p>
            <p style="user-select: none; font-size: 12px;" class="text-muted my-0">${tr_i_recommend_changing_all_options_before_moving_on_to_the_next_stage}</p>
            <div class="bg-primary bg-gradient mx-auto next mt-3" hidden style="width: 30%; border: 1px solid black; border-radius: 10px; cursor:pointer; user-select: none;">
                <h5 class="py-2">${tr_go_to_the_next_step}</h5>
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
        <div class="bg-primary bg-gradient border text-light mx-auto next mt-3" style="width: 30%; border-radius: 10px; cursor:pointer; user-select: none;">
            <h5 class="py-2">${tr_go_to_the_next_step}</h5>
        </div>
    `
    let next = document.querySelector('.next')
    next.addEventListener('click', function () {
        textt[1] = ``
        next.outerHTML = `
        <div class="add_answers mb-3">
            <div class="answersss mt-3" style="overflow: hidden; width: 60%; display: flex; margin: 0 auto; border: 1px solid black; border-radius: 10px;">
                <div class="answer1 radio_edit bg-light text-dark" style="cursor: pointer; padding: 10px 0; width: 33%;">
                    <label class="radio_label" style="cursor:pointer;" for="first">First</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="first">
                </div>
                <div class="answer2 radio_edit bg-light text-dark" style="cursor: pointer; padding: 10px 0; width: 33%; border-left: 1px solid black;">
                    <label class="radio_label" style="cursor:pointer;" for="second">Second</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="second">
                </div>
                <div class="answer3 radio_edit bg-light text-dark" style="z-index: 999; cursor: pointer; padding: 10px 0; width: 34%; border-left: 1px solid black;">
                    <label class="radio_label" style="cursor:pointer;" for="third">Third</label>
                    <input class="radio_input" style="display: none;" type="radio" name="answer" id="third">
                </div>
            </div>
            <p style="user-select: none; font-size: 15px;" class="mt-1 mb-0">${tr_to_change_the_text_of_an_answer_option_click_on_the_option_you_want}</p>
            <p style="user-select: none; font-size: 12px;" class="text-muted my-0">${tr_i_recommend_changing_all_options_before_moving_on_to_the_next_stage}</p>
            <div class="bg-primary bg-gradient text-light border mx-auto next mt-3" hidden style="width: 30%; border-radius: 10px; cursor:pointer; user-select: none;">
                <h5 class="py-2">${tr_go_to_the_next_step}</h5>
            </div>
        </div>
        `
        let scriptAddAnswers = document.createElement("script")
        scriptAddAnswers.setAttribute("src", scriptABCAnswers)
        document.body.appendChild(scriptAddAnswers)
    })
})
