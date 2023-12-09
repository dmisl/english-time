let editing = document.querySelector('.editing')
let declared = document.querySelector('.declared')

let textarea = document.createElement('textarea')
textarea.setAttribute('name', 'body')
textarea.classList.add('editor')
textarea.style.height = '500px'
textarea.innerHTML = declared.innerHTML

document.querySelector('.task_body').remove()

editing.appendChild(textarea)

ClassicEditor.create(document.querySelector('.editor'), {
    ckfinder: {
        uploadUrl: "{{ route('task.uploadImage', ['_token' => csrf_token()]) }}"
    }
}).catch(error => {
    console.error(error)
})

declared.remove()

let task_update = document.querySelector('.task_update')

// EDITING TASK NAME
let name = document.querySelector('.name')
let name_hint = document.querySelector('.name_hint')
let task_name = document.querySelector('.task_name')

name.addEventListener('keyup', function () {

    if(name.innerText.length > 2)
    {

        task_name.value = name.innerText
        name_hint.classList.remove('text-danger')
        name_hint.classList.add('text-muted')
        name_hint.innerText = `Нажміть щоб змінити назву завдання`
        task_update.removeAttribute('hidden', '')

    } else
    {

        name_hint.classList.remove('text-muted')
        name_hint.classList.add('text-danger')
        name_hint.innerText = `Назва завдання не може бути такою короткою`
        task_update.setAttribute('hidden', '')

    }

})

task_update.removeAttribute('hidden')

task_update.addEventListener('click', function () {

    let submitik = document.createElement('button')

    submitik.setAttribute('type', 'submit')

    document.querySelector('.hidden').appendChild(submitik)

    submitik.click()

})
