"use strict";

var ctx = document.getElementById("perbulan").getContext('2d');

var myChart = new Chart(ctx, {
type: 'line',
data: {
    labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
    datasets: [{
    label: 'Pendapatan',
    data: [70, 62, 44, 40, 21, 63, 82, 52, 50, 31, 70, 50, 91, 63, 51, 60],
    borderWidth: 2,
    backgroundColor: 'rgb(144, 255, 144,0.2)',
    borderWidth: 3,
    borderColor: 'rgb(71, 195, 99)',
    pointBorderWidth: 0,
    pointBorderColor: 'transparent',
    pointRadius: 3,
    pointBackgroundColor: 'transparent',
    pointHoverBackgroundColor: 'rgba(63,82,227,1)',
    }]
},
options: {
    layout: {
    padding: {
        bottom: -1,
        left: -1
    }
    },
    legend: {
    display: false
    },
    scales: {
    yAxes: [{
        gridLines: {
        display: false,
        drawBorder: false,
        },
        ticks: {
        beginAtZero: true,
        display: false
        }
    }],
    xAxes: [{
        gridLines: {
        drawBorder: false,
        display: false,
        },
        ticks: {
        display: false
        }
    }]
    },
}
});


