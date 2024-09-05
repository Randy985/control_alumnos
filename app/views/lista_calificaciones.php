<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php require './app/views/layout/header.php'; ?>
    <title>Lista de Calificaciones</title>
</head>

<body>
    <h1 class="mb-4">Lista de Calificaciones</h1>

    <!-- Botón para abrir el modal de agregar calificación -->
    <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#agregarCalificacionModal">Agregar Calificación</a>

    <div class="table-responsive">
        <table id="tablaCalificaciones" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th> <!-- Columna para el correlativo -->
                    <th>Alumno</th>
                    <th>Curso</th>
                    <th>Nota Final</th>
                    <th>Colegio</th> <!-- Nueva columna para el colegio -->
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 1; ?> <!-- Inicializar el contador -->
                <?php foreach ($calificaciones as $calificacion): ?>
                    <tr>
                        <td><?= $contador++ ?></td> <!-- Mostrar el correlativo -->
                        <td><?= $calificacion['nombre'] . ' ' . $calificacion['apellido'] ?></td>
                        <td><?= $calificacion['nombre_curso'] ?></td>
                        <td><?= $calificacion['nota_final'] ?></td>
                        <td><?= $calificacion['nombre_colegio'] ?></td> <!-- Mostrar el colegio -->
                        <td class="text-center">
                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarCalificacionModal"
                                onclick="cargarDatosCalificacion(<?= $calificacion['id'] ?>, <?= $calificacion['alumno_id'] ?>, <?= $calificacion['curso_id'] ?>, <?= $calificacion['nota_final'] ?>)">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="confirmarEliminarCalificacion(<?= $calificacion['id'] ?>)">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- Modal para agregar calificación -->
    <div class="modal fade" id="agregarCalificacionModal" tabindex="-1" aria-labelledby="agregarCalificacionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarCalificacionLabel">Agregar Calificación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?controller=CalificacionController&action=agregarCalificacion" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="alumnoAgregar" class="form-label">Alumno</label>
                            <select class="form-select" id="alumnoAgregar" name="alumno_id" required>
                                <?php foreach ($alumnos as $alumno): ?>
                                    <option value="<?= $alumno['id'] ?>"><?= $alumno['nombre'] . ' ' . $alumno['apellido'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cursoAgregar" class="form-label">Curso</label>
                            <select class="form-select" id="cursoAgregar" name="curso_id" required>
                                <?php foreach ($cursos as $curso): ?>
                                    <option value="<?= $curso['id'] ?>"><?= $curso['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="notaAgregar" class="form-label">Nota Final</label>
                            <input type="number" class="form-control" id="notaAgregar" name="nota_final" step="0.01" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Calificación</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para editar calificación -->
    <div class="modal fade" id="editarCalificacionModal" tabindex="-1" aria-labelledby="editarCalificacionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarCalificacionLabel">Editar Calificación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editarCalificacionForm" action="?controller=CalificacionController&action=actualizarCalificacion" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="calificacionId">
                        <div class="mb-3">
                            <label for="alumnoEditar" class="form-label">Alumno</label>
                            <select class="form-select" id="alumnoEditar" name="alumno_id" required>
                                <?php foreach ($alumnos as $alumno): ?>
                                    <option value="<?= $alumno['id'] ?>"><?= $alumno['nombre'] . ' ' . $alumno['apellido'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cursoEditar" class="form-label">Curso</label>
                            <select class="form-select" id="cursoEditar" name="curso_id" required>
                                <?php foreach ($cursos as $curso): ?>
                                    <option value="<?= $curso['id'] ?>"><?= $curso['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="notaEditar" class="form-label">Nota Final</label>
                            <input type="number" class="form-control" id="notaEditar" name="nota_final" step="0.01" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    </div> <!-- Cierre del container -->
</body>

<!-- Inicializar DataTables en la tabla -->
<script>
    $(document).ready(function() {
        $('#tablaCalificaciones').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
        });
    });
</script>

<!-- Script para cargar los datos de la calificación en el modal -->
<script>
    function cargarDatosCalificacion(id, alumno_id, curso_id, nota_final) {
        document.getElementById('calificacionId').value = id;
        document.getElementById('alumnoEditar').value = alumno_id;
        document.getElementById('cursoEditar').value = curso_id;
        document.getElementById('notaEditar').value = nota_final;
    }
</script>

<script>
    function confirmarEliminarCalificacion(calificacionId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "?controller=CalificacionController&action=eliminarCalificacion&id=" + calificacionId;
            }
        });
    }
</script>

</html>