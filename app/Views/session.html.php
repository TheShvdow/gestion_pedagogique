<?php var_dump($sessions); ?>
<?php require 'head.html.php'; ?>
<?php require 'header.html.php';?>
<body class="bg-gray-100">
    <div id="calendar" class="h-[70vh] container mx-auto mt-10"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    <?php foreach ($sessionCourses as $session) : ?>
                        {
                            title: 'Session <?php echo $session['id_session']; ?>', // Titre ou autre info
                            start: '<?php echo $session['date'] . 'T' . $session['heure_debut']; ?>',
                            end: '<?php echo $session['date'] . 'T' . $session['heure_fin']; ?>',
                            description: 'Type: <?php echo $session['type_session']; ?>, Etat: <?php echo $session['etat_session']; ?>'
                        },
                    <?php endforeach; ?>
                ]
            });

            calendar.render();
        });
    </script>
<?php require 'footer.html.php'; ?>
</body>
</html>
