<?php
require_once './config/config.php';

class Colegio {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function obtenerColegios() {
        $sql = "SELECT id, nombre FROM colegios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
