<?php
require_once 'config/config.php';

class Alumno
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function obtenerAlumnos()
    {
        $sql = "SELECT alumnos.*, colegios.nombre AS nombre_colegio 
                FROM alumnos 
                JOIN colegios ON alumnos.colegio_id = colegios.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerGrados()
    {
        $sql = "SELECT * FROM grados";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregarAlumno($nombre, $apellido, $grado, $sexo, $colegio_id)
    {
        $sql = "INSERT INTO alumnos (nombre, apellido, grado, sexo, colegio_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nombre, $apellido, $grado, $sexo, $colegio_id]);
    }

    public function obtenerAlumnosPorColegioYGrado($colegioNombre, $grados)
    {
        $gradoPlaceholders = implode(',', array_fill(0, count($grados), '?'));
        $sql = "SELECT alumnos.* FROM alumnos 
                JOIN colegios ON alumnos.colegio_id = colegios.id 
                WHERE colegios.nombre = ? AND alumnos.grado IN ($gradoPlaceholders)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_merge([$colegioNombre], $grados));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para actualizar un alumno
    public function actualizarAlumno($id, $nombre, $apellido, $grado, $sexo, $colegio_id)
    {
        $sql = "UPDATE alumnos 
                SET nombre = ?, apellido = ?, grado = ?, sexo = ?, colegio_id = ? 
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nombre, $apellido, $grado, $sexo, $colegio_id, $id]);
    }

    public function eliminarAlumno($id)
    {
        // Eliminar las calificaciones asociadas al alumno
        $sql = "DELETE FROM calificaciones WHERE alumno_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        $sql = "DELETE FROM alumnos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
