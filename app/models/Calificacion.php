<?php
require_once './config/config.php';

class Calificacion
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    // Método para agregar una calificación
    public function agregarCalificacion($alumno_id, $curso_id, $nota_final)
    {
        $sql = "INSERT INTO calificaciones (alumno_id, curso_id, nota_final) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$alumno_id, $curso_id, $nota_final]);
    }

    // Método para listar las calificaciones
    public function obtenerCalificaciones()
    {
        $sql = "SELECT calificaciones.*, 
                       alumnos.nombre, alumnos.apellido, 
                       cursos.nombre AS nombre_curso, 
                       colegios.nombre AS nombre_colegio  -- Agregar nombre del colegio
                FROM calificaciones 
                JOIN alumnos ON calificaciones.alumno_id = alumnos.id
                JOIN cursos ON calificaciones.curso_id = cursos.id
                JOIN colegios ON alumnos.colegio_id = colegios.id";  // Relacionar con colegios
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCursos()
    {
        $sql = "SELECT * FROM cursos";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para actualizar una calificación
    public function actualizarCalificacion($id, $alumno_id, $curso_id, $nota_final)
    {
        $sql = "UPDATE calificaciones 
                SET alumno_id = ?, curso_id = ?, nota_final = ? 
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$alumno_id, $curso_id, $nota_final, $id]);
    }

    // Método para eliminar una calificación
    public function eliminarCalificacion($id)
    {
        $sql = "DELETE FROM calificaciones WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
