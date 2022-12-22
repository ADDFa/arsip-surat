const { el } = require('../function/global')

const rows = {
    getColumnAction(url, token,
        {
            isDetail = true,
            isUpdate = true,
            isDelete = true
        }) {
        const detail = /* html */
            `
            <a href="${url}" class="btn btn-success">
                <i class="bi bi-info-circle"></i>
            </a>
            `

        const update = /* html */
            `
            <a href="${url}/edit" class="btn btn-info">
                <i class="bi bi-pen"></i>
            </a>
            `

        const deleted = /* html */
            `
            <form action="${url}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="${token}">

                <button type="button" class="btn btn-danger delete">
                    <i class="bi bi-trash delete"></i>
                </button>
                <button hidden type="submit"></button>
            </form>
            `

        let action = '<td class="action">'

        if (isDetail) action += detail
        if (isUpdate) action += update
        if (isDelete) action += deleted

        action += '</td>'


        return action
    },

    user(user, i, token) {
        return /* html */ `
        <tr>
            <td>${++i}</td>
            <td>${user.name}</td>
            <td>${user.credential.email}</td>
            <td class="text-capitalize">${user.role}</td>
            ${this.getColumnAction(`/pengguna/${user.id}`, token, { isUpdate: false })}
        </tr>
        `
    },

    outgoingMail(mail, i, token) {
        return /* html */ `
            <tr>
                <td>${++i}</td>
                <td>${mail.mail_number}</td>
                <td>${mail.mail_nature}</td>
                <td>${mail.mail_destination}</td>
                ${this.getColumnAction(`/surat-keluar/${mail.id}`, token, {})}
            </tr>
        `
    },

    incomingMail(mail, i, token) {
        return /* html */ `
            <tr>
                <td>${++i}</td>
                <td>${mail.mail_number}</td>
                <td>${mail.mail_nature}</td>
                <td>${mail.sender}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-warning btn-disposition" data-bs-toggle="modal"
                        data-bs-target="#dispositionModal" data-regardingMail="${mail.regarding_mail}"
                        data-mailId="${mail.id}">
                        <i class="bi bi-send btn-disposition" data-regardingMail="${mail.regarding_mail}"
                            data-mailId="${mail.id}"></i>
                    </button>
                </td>
                ${this.getColumnAction(`/surat-masuk/${mail.id}`, token, {})}
            </tr>
        `
    }
}

const setTable = (data, token, table) => {
    let res = ''

    if (table === 'users') data.map((user, i) => res += rows.user(user, i, token))
    if (table === 'outgoing_mails') data.map((mail, i) => res += rows.outgoingMail(mail, i, token))
    if (table === 'incoming_mails') data.map((mail, i) => res += rows.outgoingMail(mail, i, token))

    el('.table tbody').innerHTML = res
}

const search = e => {
    if (!e.target.parentElement.classList.contains('search')) return

    // parameter wajib : t -> table | v -> value
    fetch(`${origin}/cari?t=${e.target.dataset.table}&v=${e.target.value}`)
        .then(res => res.json())
        .then(res => setTable(res.data, res.token, e.target.dataset.table))
}

module.exports = {
    search
}