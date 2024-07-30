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

    public function register()
    {
        $errors = [];
        $role = 4;  // Assurez-vous d'utiliser le role correspondant à l'utilisateur (par exemple, 4 pour l'utilisateur standard)
        $nom = '';
        $prenom = '';
        $telephone = '';
        $username = '';
        $password = '';


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $telephone = $_POST['telephone'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
        
            if (empty($nom)) {
                $errors[] = 'Le nom est requis.';
            }
            if (empty($prenom)) {
                $errors[] = 'Le prénom est requis.';
            }
            if (empty($telephone)) {
                $errors[] = 'Le téléphone est requis.';
            }
            if (empty($username)) {
                $errors[] = 'Le nom d\'utilisateur est requis.';
            }
            if (empty($password)) {
                $errors[] = 'Le mot de passe est requis.';
            }
        
            if (empty($errors)) {
                $userId = $this->userModel->UserRegister($nom, $prenom, $telephone, $username, $password,$role);
                if ($userId) {
                    header('Location: /login');
                    exit;
                } else {
                    $errors[] = 'Erreur lors de l\'enregistrement.';
                }
            }
        }
        

        // Passer les variables à la vue
        $viewData = [
            'errors' => $errors,
            'nom' => $nom,
            'prenom' => $prenom,
            'telephone' => $telephone,
            'email' => $username,
            'password' => $password

        ];
        include __DIR__. '/../Views/register.html.php';
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