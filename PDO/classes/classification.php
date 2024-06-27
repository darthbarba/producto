<?php

require_once 'database.php';

class Classification {

    public static function getAll() {
        try {
            $db = Database::Connect();
            $query = 'SELECT * FROM classifications ORDER BY classification_name';
            $statement = $db->query($query);
            $classifications = $statement->fetchAll();
            return $classifications;
        } catch (PDOException $e) {
            error_log("Error al obtener todas las clasificaciones: " . $e->getMessage());
            return false;
        }
    }
}
?>
