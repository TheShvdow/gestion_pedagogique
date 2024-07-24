<?php

namespace App\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $host ="127.0.0.1";
        $db = "gestion_pedagogique";
        $user = 'root';
        $pass = 'Cybershvdow10@';
        $charset = 'utf8mb4'; // Charset for MySQL
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {
            $this->connection = new PDO($dsn, $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            echo "Erreur de connexion à MySQL : " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
?>
