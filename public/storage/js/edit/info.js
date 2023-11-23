let editing = document.querySelector('.editing')
let declared = document.querySelector('.declared')

let textarea = document.createElement('textarea')
textarea.setAttribute('name', 'body')
textarea.style.height = '500px'

document.querySelector('.task_body').remove()

editing.appendChild(textarea)

if(dark_mode_input.checked)
{
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        skin: 'oxide-dark',
        content_css: 'dark',
        setup: (editor) => {
            editor.on('init', () => {
                editor.setContent(declared.innerHTML)
            })
        }
    });

} else
{
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        setup: (editor) => {
            editor.on('init', () => {
                editor.setContent(declared.innerHTML)
            })
        }
    });
}

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
