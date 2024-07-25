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
        $userId = $user['id'];

        $semestre = isset($_GET['semestre']) ? $_GET['semestre'] : '1'; // Ajuster selon le format attendu

        // var_dump($_SESSION['user']);
        // var_dump($semestre);
        
        
        $limit = $perPage;
        $offset = ($page - 1) * $perPage;
        
        $courses = $this->courseModel->getCourses($limit, $offset, $userId, $semestre);
        $totalCourses = $this->courseModel->countCourses($userId, $semestre);
        // var_dump($courses);

        $totalPages = ceil($totalCourses / $perPage);

        $this->runderVieuw("listCours",['courses' => $courses,
                                        'page' => $page,
                                        'totalPages' => $totalPages]);
    }

    public function runderVieuw($views,$data){
        extract($data);
        require_once '/var/www/gestion_pedagogique/app/Views/'.$views.'.html.php';

        
    }
}
