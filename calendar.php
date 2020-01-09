<?php include "bbdd.php";?>
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8' />
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link href='packages/core/main.css' rel='stylesheet' />
  <link href='packages/daygrid/main.css' rel='stylesheet' />

  <script src='packages/core/main.js'></script>
  <script src='packages/daygrid/main.js'></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid'],
        defaultView: 'dayGridMonth',
        defaultDate: '2020-01-07',
        header: {
          left: 'prev,next',
          center: 'title',
          right: 'timeGridWeek,timeGridDay'
        },
        events: [<?php 
        
         $reservas=recogerReservas();
        if($reservas->num_rows > 0){
          while($row= $reservas->fetch_assoc()){
              $LeavingDate = $row['LeavingDate'];
              $BookingDate = $row['BookingDate'];
              $IdCliente= $row['IdCliente'];
              $IdHabitacion= $row['IdHabitacion'];
              $booking=strval($LeavingDate);
              $leave=strval($BookingDate);
              echo"{title: 'Cliente:$IdCliente  habitacion:$IdHabitacion',start: '$booking',end: '$leave'},";
          }
      }
      else{
          echo ("Ha petado");
      }
        ?>
        ]
      });

      calendar.render();
    });
  </script>
</head>
<?php
include 'cabecera.php';
?>
<body>
  <div class="mt-5" id='calendar'></div>
</body>

</html>