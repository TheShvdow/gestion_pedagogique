    <?php require 'head.html.php'; ?>
<?php require 'header.html.php'; ?>
<body class="bg-gray-100 wax-w-screen">
    <div id="calendar" class="h-[70vh] container mx-auto mt-10"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Encodage JSON des données PHP pour JavaScript
            const session = <?= json_encode($sessionCourses); ?>;
            
            // Transformation des données en tableau d'événements
            const events = session.map(session => ({
                title: `${session.nom_cours}`,
                start: `${session.date}T${session.heure_debut}`,
                end: `${session.date}T${session.heure_fin}`,
                description: `Type: ${session.type_session}, Etat: ${session.etat_session}  , HEURE : ${session.nombre_heure}`
                 }));

            console.log(events); // Vérifiez que les événements sont correctement formatés

            // Initialisation du calendrier
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: events,
                eventDidMount: function(info) {
                    // Affichage de la description dans un tooltip (optionnel)
                    info.el.setAttribute('title', info.event.extendedProps.description);
                }
            });

            calendar.render();
        });
    </script>
<?php require 'footer.html.php'; ?>
</body>
</html>
