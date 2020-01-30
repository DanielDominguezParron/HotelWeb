<?php include "bbdd.php";
$date = diaReserva();
if ($date->num_rows > 0) {
  while ($row = $date->fetch_assoc()) {
    $BookingDate = $row['BookingDate'];
    $booking = strval($BookingDate);
  }
} else {
  echo ("Ha petado");
}
?>
<!-- Latest compiled and minified CSS -->


<?php
include 'cabecera.php';
?>
<link href='calendar/core/main.css' rel='stylesheet' />
<link href='calendar/daygrid/main.css' rel='stylesheet' />
<link href='calendar/bootstrap/main.css' rel='stylesheet' />

<script src='calendar/core/main.js'></script>
<script src='calendar/daygrid/main.js'></script>
<script src='calendar/bootstrap/main.js'></script>
<script src='calendar/core/locales/es.js'></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['interaction', 'dayGrid', 'timeGrid'],
      themeSystem: 'standard',
      defaultView: 'dayGridMonth',
      showNonCurrentDates: false,
      locale: "es",
      titleFormat: {
        year: 'numeric',
        month: 'long'
      },
      defaultDate: <?php echo "'$booking'"; ?>,
      header: {
        left: 'prev,next',
        prev: 'fa-chevron-left',
        next: 'fa-chevron-right',
        center: 'title',
        right: 'today,timeGridWeek,timeGridDay'
      },
      events: [<?php

                $reservas = recogerReservas();
                if ($reservas->num_rows > 0) {
                  while ($row = $reservas->fetch_assoc()) {
                    $LeavingDate = $row['LeavingDate'];
                    $BookingDate = $row['BookingDate'];
                    $IdCliente = $row['IdCliente'];
                    $IdHabitacion = $row['IdHabitacion'];
                    $booking = strval($LeavingDate);
                    $leave = strval($BookingDate);
                    echo "{title: 'Cliente:$IdCliente  habitacion:$IdHabitacion',start: '$booking',end: '$leave'},";
                  }
                } else {
                  echo ("Ha petado");
                }
                ?>],
      eventColor: 'green',
      eventBackgroundColor: '#7386D5',
      eventBorderColor: '#7386D5',

    });

    calendar.render();
  });
</script>
</head>


<body>
  <div class="mt-5" id='calendar'></div>
</body>

</html>