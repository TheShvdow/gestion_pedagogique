<!DOCTYPE html>
<html>
<head>
    <title>Liste des Cours</title>
    <link rel="stylesheet" href="path/to/your/css/style.css">
</head>
<body>
    <h1>Liste des Cours</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Cours</th>
                <th>Professeur</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
                <td><?php echo htmlspecialchars($course['id']); ?></td>
                <td><?php echo htmlspecialchars($course['name']); ?></td>
                <td><?php echo htmlspecialchars($course['teacher']); ?></td>
                <td><?php echo htmlspecialchars($course['date']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
