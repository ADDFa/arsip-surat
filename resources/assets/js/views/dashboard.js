google.charts.load('current', { 'packages': ['corechart'] })

const dashboardChart = document.getElementById('chart_div')

const density = () => {
    return new Promise(resolve => {
        fetch(`${origin}/surat-masuk-bulan-ini`)
            .then(e => e.json())
            .then(e => resolve(e))
    })
}

const drawChart = async () => {
    let mailsThisYear = await density()
    mailsThisYear = mailsThisYear.mailsThisYear

    const data = [['Bulan', 'Jumlah Surat', { role: 'style' }]]

    const colors = {
        jan: '#b87333',
        feb: '#b87333',
        mar: '#b87333',
        apr: '#b87333',
        may: '#b87333',
        jun: '#b87333',
        jul: '#b87333',
        aug: '#b87333',
        sep: '#b87333',
        oct: '#b87333',
        nov: '#b87333',
        dec: '#b87333',
    }

    for (month in mailsThisYear) {
        data.push([month.toUpperCase(), mailsThisYear[month], colors[month]])
    }

    const options = {
        'title': 'Surat yang masuk tahun ini',
    }

    const chart = new google.visualization.ColumnChart(dashboardChart)
    chart.draw(google.visualization.arrayToDataTable(data), options)
}

if (dashboardChart ?? false) google.charts.setOnLoadCallback(drawChart)