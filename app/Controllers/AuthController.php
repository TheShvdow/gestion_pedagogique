<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Core\Validator;

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = UserModel::getInstance();
    }

    public function login()
    {
        $errors = [];
        $email = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Valider les champs du formulaire
            $errors = Validator::validateLogin($email, $password);

            if (empty($errors)) {
                $user = $this->userModel->authenticate($email, $password);
                if ($user) {
                    // Démarrez la session et stockez les informations de l'utilisateur
                    session_start();
                    $_SESSION['user'] = [
                        'id' => $user['id_user'],
                        'nom' => $user['nom'],
                        'prenom' => $user['prenom'],
                        'email' => $user['username']
                    ];
                    
                    header('Location: /?action=courses'); // Assurez-vous que l'URL correspond à celle gérée par votre routeur
                    exit;
                } else {
                    $errors[] = 'Identifiant ou mot de passe incorrect.';
                }
            }
        }

        // Passer les variables à la vue
        $viewData = [
            'errors' => $errors,
            'email' => $email
        ];

        include __DIR__ . '/../Views/login.html.php';
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /login'); // Redirection vers la page de connexion
        exit;
    }
}