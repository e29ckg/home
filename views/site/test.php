<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href="<?= Url::to('@web/plugins/fullcalendar/packages/core/main.css')?>" rel='stylesheet' />
<link href="<?= Url::to('@web/plugins/fullcalendar/packages/daygrid/main.css')?>" rel='stylesheet' />
<link href="<?= Url::to('@web/plugins/fullcalendar/packages/list/main.css')?>" rel='stylesheet' />
<script src="<?= Url::to('@web/plugins/fullcalendar/packages/core/main.js')?>"></script>
<script src="<?= Url::to('@web/plugins/fullcalendar/packages/interaction/main.js')?>"></script>
<script src="<?= Url::to('@web/plugins/fullcalendar/packages/daygrid/main.js')?>"></script>
<script src="<?= Url::to('@web/plugins/fullcalendar/packages/list/main.js')?>"></script>
<script src="<?= Url::to('@web/plugins/fullcalendar/packages/google-calendar/main.js')?>"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

      plugins: [ 'interaction', 'dayGrid', 'list', 'googleCalendar' ],

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },

      displayEventTime: false, // don't show the time column in list view

      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      googleCalendarApiKey: 'AIzaSyCtp0KVVxbk9VapZoU-X4J6uaulYafzMQw',

      // US Holidays
      events: 'pkkjc.coj@gmail.com',

      eventClick: function(arg) {
        // opens events in a popup window
        window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

        arg.jsEvent.preventDefault() // don't navigate in main tab
      },

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }

    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='loading'>loading...</div>

  <div id='calendar'></div>

</body>
</html>
