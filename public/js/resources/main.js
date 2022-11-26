require('./bootstrap.bundle.min')

const setActive = () => {
    let active = document.querySelector(`[data-active="${location.pathname}"]`)

    return active ?
        active.classList.add('active') :
        document.querySelector(`[data-active-two="${location.pathname}"]`).classList.add('active')
}

window.addEventListener('load', setActive)