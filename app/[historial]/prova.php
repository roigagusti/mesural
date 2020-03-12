<?php
$val = "{x:0, y:200},{x: 1, y: 202}, {x: 2, y: 210}, {x: 3, y: 205}, {x: 4, y: 215}, {x: 5, y: 202}, {x: 6, y: 212}, {x: 7, y: 207}, {x: 8, y: 217}, {x: 9, y: 212}, {x: 10, y: 205}, {x: 11, y: 215}, {x: 12, y: 202}, {x: 13, y: 212}, {x: 14, y: 207}, {x: 15, y: 217}";
?>
<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
<script src="utils.js"></script>
<style>
canvas{
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
</style>

<div class="chart-container" style="position: relative; height:100px; width:100%">
  <canvas id="myChart" width="20" height="20">
    <p>Your browser does not support our graphs. Please try another browser.</p>
  </canvas>
</div>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['08.00', '09.00', '10.00', '11.00', '12.00', '13.00', '14.00', '15.00', '16.00', '17.00', '18.00','19.00', '20.00', '21.00', '22.00', '23.00'],
        datasets: [{
            label: '',
            data: [<?php echo $val ?>],
            backgroundColor: 'rgba(160, 0, 0, 0.2)',
            borderColor: 'rgba(160, 0, 0, 1)',
            borderWidth: 1,
            pointBackgroundColor: 'rgba(160, 0, 0, 0)',
            pointBorderColor: 'rgba(160, 0, 0, 0)',
            pointHoverBackgroundColor: 'rgba(160, 0, 0, 1)',
            fill: true
        }]
    },
    options: {
        tooltips: {
            mode: 'y'
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                ticks: {
                    display: false
                },
                gridLine: {
                  display: false
                }
            }],
            yAxes: [{
                ticks: {
                    display: false
                }
            }]
        }
    }
});
</script>