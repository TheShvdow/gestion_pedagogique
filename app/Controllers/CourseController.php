<?php
namespace App\Controllers;

use App\Models\CourseModel;

class CourseController
{
    private $courseModel;

    public function __construct()
    {
        $this->courseModel = CourseModel::getInstance();
    }

    public function listCourses($page = 1, $perPage = 10)
{
    if (!isset($_SESSION['user'])) {
        header('Location: /login'); // Redirection vers la page de connexion si non connecté
        exit;
    }

    $user = $_SESSION['user'];
    
    $userId = $user['id']; // Assurez-vous que l'identifiant de l'utilisateur est stocké dans la session
    // var_dump($userId);

    $viewData = ['user' => $user];

//     echo '<pre>';
// print_r($_SESSION['user']);
// echo '</pre>';

$_SESSION['user'] = [
    'id' => $userId
    // autres informations
];
// var_dump($userId);



    // Récupérer le semestre depuis les paramètres GET, avec une valeur par défaut si non spécifié
    $semestre = isset($_GET['semestre']) ? intval($_GET['semestre']) : 1;
    $limit = $perPage;
    $offset = ($page - 1) * $perPage;

    // Récupérer les cours filtrés en utilisant la méthode getCourses
    $courses = $this->courseModel->getCourses($limit, $offset, $userId, $semestre);

    // Compter le nombre total de cours (possibilité de mettre à jour si filtrage par semestre est requis)
    $totalCourses = $this->courseModel->countCourses(); // Assurez-vous que countCourses() peut être adapté pour le filtrage si nécessaire

    $totalPages = ceil($totalCourses / $perPage);

    include __DIR__ . '/../Views/listCours.html.php';
}

}
?>
