<?php
namespace App\Models;

use App\Core\Database;

class UserModel
{
    private $db;
    private static $instance;

    private function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function authenticate($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', md5($password)); // Assurez-vous d'utiliser une méthode de hashage plus sécurisée en production
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function UserRegister($nom, $prenom, $telephone, $username, $password, $role)
        {
            $query = "INSERT INTO users (nom, prenom, telephone, username, password, id_role) VALUES (:nom, :prenom, :telephone, :username, :password, :role)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nom', $nom);
            $stmt->bindValue(':prenom', $prenom);
            $stmt->bindValue(':telephone', $telephone);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':password', md5($password)); // Remarque : utilisez bcrypt ou Argon2 pour le hashage des mots de passe en production
            $stmt->bindValue(':role', $role); // Correction ici
            $stmt->execute();
            return $this->db->lastInsertId();
        }

}
?>
