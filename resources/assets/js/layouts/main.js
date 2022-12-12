const Swal = require('sweetalert2')

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

// active sidebar
const setActive = () => {
    let active = document.querySelector(`[data-active="${location.pathname}"]`)

    if (!active) active = document.querySelector(`[data-active-two="${location.pathname}"]`)
    if (!active) return

    active.classList.add('active')
}


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

document.addEventListener('click', deleteData)

window.addEventListener('load', () => {
    setActive()
    notification()
})