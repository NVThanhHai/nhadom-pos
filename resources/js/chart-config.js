$(document).ready(function () {
    const drawColumnDataNumber = {
        id: 'drawColumnDataNumber',
        afterDatasetsDraw: function (chart, args, options) {
            // To only draw at the end of animation, check for easing === 1
            var ctx = chart.ctx;
            chart.data.datasets.forEach(function (dataset, i) {
                var meta = chart.getDatasetMeta(i);
                if (!meta.hidden) {
                    console.log( dataset)
                    meta.data.forEach(function (element, index) {
                        if (dataset.data[index] <= 0) return;
                        // Draw the text in black, with the specified font
                        ctx.fillStyle = 'rgb(0,0,0)';
                        var fontSize = 16;
                        var fontStyle = 'normal';
                        var fontFamily = 'Helvetica Neue';
                        ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
                        // Just naively convert to string for now
                        var dataString = formatPrice(dataset.data[index]).toString();
                        // Make sure alignment settings are correct
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';
                        var padding = 5;
                        var position = element.tooltipPosition();
                        ctx.fillText(dataString, position.x , position.y);
                    });
                }
            });
        }
    };

    var formatPrice = function (value) {
        let val = (value/1).toFixed(0).replace('.', ',')
        return  val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }

    let salesPurchasesBar = document.getElementById('salesPurchasesChart');
    $.get('/sales-purchases/chart-data', function (response) {
        var label = [];
        var setdataProduct = [];
        var end = new Date().getDate();
        var month = new Date().getMonth();
        for (var i = 1; i<=end;i++){
            label.push(i);
        }
        var datas = [];
        var lables = [];
        response.sales.original.days.forEach(function (item, idx) {
            var date = new Date(item).getDate();
            datas[date] = response.sales.original.data[idx];
        })
        //console.log(datasets)
        $.each(label, function (i, item) {
            lables[i] = i+1
            datas[i] = datas[i+1] || 0;
        })
        let salesPurchasesChart = new Chart(salesPurchasesBar, {
            type: 'bar',
            data: {
                labels: lables,
                datasets: [{
                    label: 'Doanh thu',
                    data: datas,
                    backgroundColor: [
                        '#6366F1',
                    ],
                    borderColor: [
                        '#6366F1',
                    ],
                    borderWidth: 1
                }
                ]
            },
            options: {
                animation: {
                    duration: 500,
                    easing: "easeOutQuart",
                    onComplete: function({ chart }) {
                        const ctx = chart.ctx;
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';
                        chart.config.data.datasets.forEach(function(dataset, i) {
                            const meta = chart.getDatasetMeta(i);

                            meta.data.forEach(function(bar, index) {
                                const data = dataset.data[index];
                                if (data > 0 ) {
                                    ctx.fillText(formatPrice(data), bar.x, bar.y - 5);
                                }
                            });
                        });
                    }
                },
                scales: {
                    x: {
                        display: true
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        });
    });

    let overviewChart = document.getElementById('currentDailyChart');
    let overviewChartMonth = document.getElementById('currentMonthChart');
    $.get('/current-month/chart-data', function (response) {
        let currentDailyChart = new Chart(overviewChart, {
            type: 'doughnut',
            data: {
                labels: ['Ca sáng', 'Ca chiều', 'Ca tối'],
                datasets: [{
                    data: [response.morning, response.afternoon, response.night],
                    backgroundColor: [
                        '#F59E0B',
                        '#0284C7',
                        '#EF4444',
                    ],
                    hoverBackgroundColor: [
                        '#F59E0B',
                        '#0284C7',
                        '#EF4444',
                    ],
                }]
            },
            plugins: [drawColumnDataNumber]
        });
        let currentMonthChart = new Chart(overviewChartMonth, {
            type: 'doughnut',
            data: {
                labels: ['Ca sáng', 'Ca chiều', 'Ca tối'],
                datasets: [{
                    data: [response.morningMonth, response.afternoonMonth, response.nightMonth],
                    backgroundColor: [
                        '#F59E0B',
                        '#0284C7',
                        '#EF4444',
                    ],
                    hoverBackgroundColor: [
                        '#F59E0B',
                        '#0284C7',
                        '#EF4444',
                    ],
                }]
            },
            plugins: [drawColumnDataNumber]
        });
    });


});
