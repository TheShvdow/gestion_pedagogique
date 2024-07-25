<?php
namespace App\Models;

use App\Core\Database;

class CourseModel
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

    public function getCourses($limit, $offset, $userId, $semestre)
    {
        $query = "SELECT 
                    c.id_cours, 
                    m.libelle AS nom_module, 
                    c.nombre_heure_global, 
                    c.semestre,
                    cl.libelle AS nom_classe
                  FROM 
                    cours c
                  JOIN 
                    modules m ON c.id_module = m.id_module
                  JOIN 
                    classes cl ON c.id_classe = cl.id_classe
                  WHERE 
                    c.id_professeur = :userId 
                  ORDER BY 
                     c.semestre
                  LIMIT :limit OFFSET :offset";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':userId', $userId, \PDO::PARAM_INT);
        // $stmt->bindValue(':semestre', $semestre, \PDO::PARAM_STR); // Assurez-vous que le type est correct
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        // var_dump($result); 
        return $result;
    }

    public function countCourses($userId, $semestre)
    {
        $query = "SELECT COUNT(*) as total FROM cours WHERE id_professeur = :userId AND semestre = :semestre";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':userId', $userId, \PDO::PARAM_INT);
        $stmt->bindValue(':semestre', $semestre, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC)['total'];
    }
}
