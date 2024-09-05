<?php require './app/views/layout/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2>Bienvenido al Sistema de Control de Alumnos</h2>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Este sistema te permite gestionar alumnos, calificaciones y más. Usa el menú de navegación para acceder a las diferentes secciones.
                    </p>
                    <a href="?controller=AlumnoController&action=listarAlumnos" class="btn btn-primary">Ver Alumnos</a>
                    <a href="?controller=CalificacionController&action=listarCalificaciones" class="btn btn-secondary">Ver Calificaciones</a>
                </div>
                <div class="card-footer text-muted">
                    Sistema de Gestión Educativa - 2024
                </div>
            </div>
        </div>
    </div>
</div>