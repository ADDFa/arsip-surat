const { el } = require('../function/global')

const setTable = data => {
    const no = iteration => /* html */
        `
        <td>${iteration}</td>
        `

    let table = ''

    data.data.map((e, i) => {
        return table +=
            /* html */
            `
            <tr>
                ${no(++i)}
                <td>${e.name}</td>
                <td>${e.credential.email}</td>
                <td class="text-capitalize">${e.role}</td>
                <td class="action">
                    <a href="/pengguna/${e.id}" class="btn btn-success">
                        <i class="bi bi-info-circle"></i>
                    </a>

                    <form action="/pengguna/${e.id}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="${data.token}">

                        <button type="button" class="btn btn-danger delete">
                            <i class="bi bi-trash delete"></i>
                        </button>
                        <button hidden type="submit"></button>
                    </form>
                </td>
            </tr>
            `
    })

    el('.table tbody').innerHTML = table
}

const search = e => {
    if (!e.target.parentElement.classList.contains('search')) return

    const dataset = e.target.dataset

    // parameter wajib : t -> table | v -> value
    fetch(`${origin}/cari?t=${dataset.table}&v=${e.target.value}`)
        .then(e => e.json())
        .then(e => setTable(e))
}

module.exports = {
    search
}