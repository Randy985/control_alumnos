<?php
require_once './app/models/Alumno.php';
require_once './app/models/Colegio.php';

class AlumnoController
{
    private $alumnoModel;
    private $colegioModel;

    public function __construct()
    {
        $this->alumnoModel = new Alumno();
        $this->colegioModel = new Colegio();
    }

    public function listarAlumnos()
    {
        $alumnos = $this->alumnoModel->obtenerAlumnos();
        $colegios = $this->colegioModel->obtenerColegios();
        $grados = $this->alumnoModel->obtenerGrados();

        require './app/views/lista_alumnos.php';
    }


    public function agregarAlumno()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $grado = $_POST['grado'];
            $sexo = $_POST['sexo'];
            $colegio_id = $_POST['colegio_id'];

            // Llamar al modelo para agregar el alumno
            $this->alumnoModel->agregarAlumno($nombre, $apellido, $grado, $sexo, $colegio_id);

            // Redirigir a la lista de alumnos
            header('Location: ?controller=AlumnoController&action=listarAlumnos');
            exit();
        }
    }

    // Método para actualizar un alumno
    public function actualizarAlumno()
    {
        // Verificar si es una solicitud POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id']; // ID del alumno
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $grado = $_POST['grado'];
            $sexo = $_POST['sexo'];
            $colegio_id = $_POST['colegio_id'];

            // Llamar al modelo para actualizar el alumno
            $this->alumnoModel->actualizarAlumno($id, $nombre, $apellido, $grado, $sexo, $colegio_id);

            // Redirigir a la lista de alumnos después de actualizar
            header('Location: ?controller=AlumnoController&action=listarAlumnos');
            exit();
        }
    }

    public function eliminarAlumno()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Llamar al modelo para eliminar el alumno
            $this->alumnoModel->eliminarAlumno($id);

            // Redirigir a la lista de alumnos después de eliminar
            header('Location: ?controller=AlumnoController&action=listarAlumnos');
            exit();
        }
    }
}
