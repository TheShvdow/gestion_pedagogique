<?php

namespace App\Models;

use App\Core\Database;

class SessionModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getSessions()
    {
        $query = "SELECT * FROM session_cours";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getFilteredSessions($userId, $semestre)
{
    $query = "SELECT 
                sc.id_session, 
                sc.date, 
                sc.heure_debut, 
                sc.heure_fin, 
                sc.nombre_heure, 
                sc.type_session, 
                sc.etat_session, 
                
              FROM 
                session_cours sc
              JOIN 
                cours c ON sc.id_cours = c.id_cours
              WHERE 
                sc.id_professeur = :userId
              ORDER BY 
                sc.date, sc.heure_debut";
                
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':userId', $userId, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_CLASS);
}

}
?>
