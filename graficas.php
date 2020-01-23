<?php 
include 'cabecera.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<script type="text/javascript" src="JS/jquery.min.js"></script>
<script type="text/javascript" src="JS/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container" class="vertical-center">
        <canvas id="graphCanvas"></canvas>
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

                    for (var i in data) {
                        marks.push(data[i].NumReservas);
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
                        data: chartdata
                    });
                });
            }
        }
        </script>

</body>
</html>