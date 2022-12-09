google.charts.load('current', { 'packages': ['corechart'] })

const dashboardChart = document.getElementById('chart_div')

const drawChart = () => {
    const data = google.visualization.arrayToDataTable([
        ['Element', 'Density', { role: 'style' }],
        ['Jan', 8.94, '#b87333'],
        ['Cuk', 10.49, 'silver'],
        ['Mar', 19.30, 'gold'],
        ['Apr', 21.45, 'color: #e5e4e2'],
        ['Mei', 21.45, 'color: #e5e4e2'],
        ['Jun', 21.45, 'color: #e5e4e2'],
        ['Jul', 21.45, 'color: #e5e4e2'],
        ['Agu', 21.45, 'color: #e5e4e2'],
        ['Sep', 21.45, 'color: #e5e4e2'],
        ['Okt', 21.45, 'color: #e5e4e2'],
        ['Nov', 21.45, 'color: #e5e4e2'],
        ['Des', 51.45, 'color: #e5e4e2']
    ])

    const options = {
        'title': 'Surat yang masuk tahun ini',
    }

    const chart = new google.visualization.ColumnChart(dashboardChart)
    chart.draw(data, options)
}

if (dashboardChart ?? false) google.charts.setOnLoadCallback(drawChart)