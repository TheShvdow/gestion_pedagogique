<?php

namespace App\Controllers;

use App\Models\SessionModel;

class SessionController
{
    private $sessionModel;

    public function __construct()
    {
        $this->sessionModel = new SessionModel();
    }

    public function listSessions()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        // var_dump($_SESSION['user']);

        $sessions = $this->sessionModel->getSessions();

        include __DIR__ . '/../Views/session.html.php';
    }

    public function showSessions($page = 1, $perPage = 10)
{
    if (!isset($_SESSION['user'])) {
        header('Location: /login'); // Redirection vers la page de connexion si non connecté
        exit;
    }

    $user = $_SESSION['user'];
    $userId = $user['id'];

        echo '<pre>';
print_r($_SESSION['user']);
echo '</pre>';

    $semestre = isset($_GET['semestre']) ? intval($_GET['semestre']) : 1;
    $limit = $perPage;
    $offset = ($page - 1) * $perPage;

    // Récupérer les sessions filtrées
    $sessionCourses = $this->sessionModel->getFilteredSessions($userId, $semestre);

    include __DIR__ . '/../Views/session.html.php';
}

}
?>
