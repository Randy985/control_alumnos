<?php
require_once './app/models/Calificacion.php';
require_once './app/models/Alumno.php';

class CalificacionController
{
    private $calificacionModel;
    private $alumnoModel;

    public function __construct()
    {
        $this->calificacionModel = new Calificacion();
        $this->alumnoModel = new Alumno();
    }

    public function agregarCalificacion()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $alumno_id = $_POST['alumno_id'];
            $curso_id = $_POST['curso_id'];
            $nota_final = $_POST['nota_final'];

            $this->calificacionModel->agregarCalificacion($alumno_id, $curso_id, $nota_final);

            header('Location: /control-alumnos/?controller=CalificacionController&action=listarCalificaciones');
            exit();
        }

        // Obtener los alumnos y cursos para el formulario
        $alumnos = $this->alumnoModel->obtenerAlumnos();
        $cursos = $this->calificacionModel->obtenerCursos();  // Método que veremos en el modelo
        require './app/views/agregar_calificacion.php';
    }


    public function listarCalificaciones()
    {
        // Listar todas las calificaciones
        $calificaciones = $this->calificacionModel->obtenerCalificaciones();

        // Obtener los alumnos y cursos para el modal de agregar calificación
        $alumnos = $this->alumnoModel->obtenerAlumnos();
        $cursos = $this->calificacionModel->obtenerCursos();

        require './app/views/lista_calificaciones.php';
    }

    // Método para actualizar una calificación
    public function actualizarCalificacion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $alumno_id = $_POST['alumno_id'];
            $curso_id = $_POST['curso_id'];
            $nota_final = $_POST['nota_final'];

            // Llamar al modelo para actualizar la calificación
            $this->calificacionModel->actualizarCalificacion($id, $alumno_id, $curso_id, $nota_final);

            // Redirigir a la lista de calificaciones después de actualizar
            header('Location: /control-alumnos/?controller=CalificacionController&action=listarCalificaciones');
            exit();
        }
    }

    // Método para eliminar una calificación
    public function eliminarCalificacion()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Llamar al modelo para eliminar la calificación
            $this->calificacionModel->eliminarCalificacion($id);

            // Redirigir a la lista de calificaciones después de eliminar
            header('Location: /control-alumnos/?controller=CalificacionController&action=listarCalificaciones');
            exit();
        }
    }
}
