<?php require 'head.html.php'; ?>

<?php require 'header.html.php'; ?>  
<body class="bg-gray-100">

<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Liste des Cours</h1>
    
    <!-- Formulaire de filtrage -->
    <form action="" method="GET" class="mb-4">
        <label for="semestre" class="mr-2">Sélectionnez le semestre :</label>
        <select name="semestre" id="semestre" class="border p-2">
            <option value="1" <?= (isset($_GET['semestre']) && $_GET['semestre'] == '1') ? 'selected' : '' ?>>Semestre 1</option>
            <option value="2" <?= (isset($_GET['semestre']) && $_GET['semestre'] == '2') ? 'selected' : '' ?>>Semestre 2</option>
        </select>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 ml-2">Filtrer</button>
    </form>

    <!-- Table des cours -->
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Nombre d'Heures</th>
                <th class="py-2">Module</th>
                <th class="py-2">Classe</th>
                <th class="py-2">semestre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): 
                ?>
                <tr>
                    <td class="py-2 px-4 border"><?= htmlspecialchars($course['nombre_heure_global']); ?></td>
                    <td class="py-2 px-4 border"><?= htmlspecialchars($course['nom_module']); ?></td>
                    <td class="py-2 px-4 border"><?= htmlspecialchars($course['nom_classe']); ?></td>
                    <td class="py-2 px-4 border"><?= htmlspecialchars($course['semestre']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>&semestre=<?= htmlspecialchars($semestre); ?>" class="text-blue-500">Précédent</a>
        <?php endif; ?>
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1 ?>&semestre=<?= htmlspecialchars($semestre); ?>" class="text-blue-500">Suivant</a>
        <?php endif; ?>
    </div>
</div>

<?php require 'footer.html.php'; ?>
