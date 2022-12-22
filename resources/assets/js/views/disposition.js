const Swal = require('sweetalert2')

const dispositionMessage = (errorList = '', icon, title) => {
    Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: toast => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    }).fire({
        title,
        icon,
        html:
            `
            <ul>${errorList}</ul>
            `
    })
}

const saveDispositionData = e => {
    const form = new FormData(e.target.form)

    fetch(`${origin}/disposisi`, {
        method: 'POST',
        body: form
    })
        .then(e => e.json())
        .then(e => {
            if (e.errors) {
                let errorList = ''

                const errors = e.errors
                for (err in errors) {
                    errorList += `<li>${errors[err]}</li>`
                }
                dispositionMessage(errorList, 'error', 'Disposisi Gagal')
            } else {
                dispositionMessage('', 'success', 'Disposisi Berhasil')

                document.querySelector('.disposition .btn-close').click()
            }
        })
}

const getMailData = e => {
    if (!e.target.classList.contains('btn-disposition')) return
    document.getElementById('regardingMail').value = e.target.dataset.regardingmail
    document.querySelector('.regardingMailInput').value = e.target.dataset.regardingmail

    document.querySelector('[name="incomingMailId"]').value = e.target.dataset.mailid

    document.querySelector('.btn-save-disposition').addEventListener('click', saveDispositionData)
}

document.addEventListener('click', getMailData)