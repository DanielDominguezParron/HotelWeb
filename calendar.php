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
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      defaultView: 'dayGridMonth',
      defaultDate: '2019-11-07',
      header: {
        left: 'prev,next',
        center: 'title',
        right: 'timeGridWeek,timeGridDay'
      },
      events: [
        {
          title: 'Olympo',
          start: '2019-11-01'
        },
        {
          title: 'Puti',
          start: '2019-11-07',
          end: '2019-11-10'
        },
        {
          title: 'Paco-Suite',
          start: '2019-11-11',
          end: '2019-11-13'
        },
        {
          title: 'Lunch',
          start: '2019-11-12T12:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-11-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-11-28'
        }
      ]
    });

    calendar.render();
  });
    </script>
  </head>
  <body>
    <a href="javascript:history.back()"class="btn btn-primary center-block">Return main page</a>
    <div id='calendar'></div>
  </body>
</html>