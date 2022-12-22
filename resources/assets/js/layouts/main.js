const Swal = require('sweetalert2')

const { search } = require('../utils/search')
const { el } = require('../function/global')

// active sidebar
const setActive = () => {
    let active = el(`[data-active="${location.pathname}"]`)

    if (!active) active = el(`[data-active-two="${location.pathname}"]`)
    if (!active) return

    active.classList.add('active')
}

// selected form select
const selected = () => {
    const select = el('data-select')
    if (!select) return

    const dataSelect = select.dataset.select
    dataSelect ? select.querySelector(`[value="${dataSelect}"]`).setAttribute('select') : ''
}

// remove invalid form on input
const removeInvalid = e => {
    if (!e.target.classList.contains('is-invalid')) return
    e.target.classList.remove('is-invalid')
}

// Toast Notification
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

// notification
const notification = () => {
    const datasetnotif = document.getElementById('notification').dataset

    if (!datasetnotif.message) return
    Toast.fire({
        icon: datasetnotif.icon,
        title: datasetnotif.message
    })
}

// button-delete
const deleteData = e => {
    if (!e.target.classList.contains('delete')) return

    const formDelete = e.target.form ?? e.target.parentElement.form

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (!result.isConfirmed) return
        formDelete.querySelector('[type="submit"]').click()
    })
}

// event
document.addEventListener('input', e => {
    removeInvalid(e)
    search(e)
})

document.addEventListener('click', deleteData)

window.addEventListener('load', () => {
    setActive()
    notification()
    selected()
})