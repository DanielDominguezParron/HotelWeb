<?php 
include 'cabecera.php';
?>
    <div id="chart-container" class="vertical-center">
        <canvas id="graphCanvas" ></canvas>
    </div>
    <script>
        $(document).ready(function () {
            showGraph();
        });
        function showGraph()
        {
            {
                $.post("dataGraficas.php",
                function (data)
                {
                    console.log(data);
                    var marks = [];
                    var name = [];

                    for (var i in data) {
                        marks.push(data[i].NumReservas);
                        name.push(data[i].MES);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Reservas del mes',
                                backgroundColor: '#7286D5',
                                borderColor: '#7286D5',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                               
                                data: marks     
                            }
                        ]
                    };
                    var graphTarget = $("#graphCanvas");

                                var barGraph = new Chart(graphTarget, {
                                    type: 'bar',
                                    data: chartdata,
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                        });
                                    });
                                }
                            }
        </script>
