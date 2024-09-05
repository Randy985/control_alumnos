<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Alumnos</title>
</head>

<body>
    <?php require './app/views/layout/header.php'; ?>

    <h1 class="mb-4">Alumnos</h1>
    <!-- Botón para abrir el modal de agregar alumno -->
    <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#agregarAlumnoModal">Agregar Alumno</a>

    <!-- Hacemos la tabla responsiva -->
    <div class="table-responsive">
    <table id="tablaAlumnos" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Grado</th>
                <th>Sexo</th>
                <th>Colegio</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1; ?>
            <?php foreach ($alumnos as $alumno): ?>
                <tr>
                    <td><?= $contador++ ?></td>
                    <td><?= $alumno['nombre'] ?></td>
                    <td><?= $alumno['apellido'] ?></td>
                    <td><?= $alumno['grado'] ?></td>
                    <td><?= $alumno['sexo'] === 'M' ? 'Masculino' : 'Femenino' ?></td>
                    <td><?= $alumno['nombre_colegio'] ?></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarAlumnoModal" onclick="cargarDatosAlumno(<?= $alumno['id'] ?>, '<?= $alumno['nombre'] ?>', '<?= $alumno['apellido'] ?>', '<?= $alumno['grado'] ?>', '<?= $alumno['sexo'] ?>', <?= $alumno['colegio_id'] ?>)">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="confirmarEliminar(<?= $alumno['id'] ?>)">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


    <!-- Modal para agregar alumno -->
    <div class="modal fade" id="agregarAlumnoModal" tabindex="-1" aria-labelledby="agregarAlumnoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarAlumnoLabel">Agregar Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?controller=AlumnoController&action=agregarAlumno" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombreAgregar" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreAgregar" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidoAgregar" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellidoAgregar" name="apellido" required>
                        </div>
                        <!-- Select de grados -->
                        <div class="mb-3">
                            <label for="gradoAgregar" class="form-label">Grado</label>
                            <select class="form-select" id="gradoAgregar" name="grado" required>
                                <?php foreach ($grados as $grado): ?>
                                    <option value="<?= $grado['nombre'] ?>"><?= $grado['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="sexoAgregar" class="form-label">Sexo</label>
                            <select class="form-select" id="sexoAgregar" name="sexo" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="colegioAgregar" class="form-label">Colegio</label>
                            <select class="form-select" id="colegioAgregar" name="colegio_id" required>
                                <?php foreach ($colegios as $colegio): ?>
                                    <option value="<?= $colegio['id'] ?>"><?= $colegio['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Alumno</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal para editar alumno -->
    <div class="modal fade" id="editarAlumnoModal" tabindex="-1" aria-labelledby="editarAlumnoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarAlumnoLabel">Editar Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editarAlumnoForm" action="?controller=AlumnoController&action=actualizarAlumno" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="alumnoId">
                        <div class="mb-3">
                            <label for="nombreEditar" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreEditar" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidoEditar" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellidoEditar" name="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="gradoEditar" class="form-label">Grado</label>
                            <input type="text" class="form-control" id="gradoEditar" name="grado" required>
                        </div>
                        <div class="mb-3">
                            <label for="sexoEditar" class="form-label">Sexo</label>
                            <select class="form-select" id="sexoEditar" name="sexo" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="colegio_idEditar" class="form-label">Colegio</label>
                            <select class="form-select" id="colegio_idEditar" name="colegio_id" required>
                                <?php foreach ($colegios as $colegio): ?>
                                    <option value="<?= $colegio['id'] ?>"><?= $colegio['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
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

<!-- Script datatable -->

<script>
    $(document).ready(function() {
        $('.table').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
        });
    });
</script>

<!-- Script para cargar los datos del alumno en el modal -->
<script>
    function cargarDatosAlumno(id, nombre, apellido, grado, sexo, colegio_id) {
        document.getElementById('alumnoId').value = id;
        document.getElementById('nombreEditar').value = nombre;
        document.getElementById('apellidoEditar').value = apellido;
        document.getElementById('gradoEditar').value = grado;
        document.getElementById('sexoEditar').value = sexo;
        document.getElementById('colegio_idEditar').value = colegio_id;
    }
</script>

<script>
    function confirmarEliminar(alumnoId) {
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
                // Redirigir a la acción de eliminar si el usuario confirma
                window.location.href = "?controller=AlumnoController&action=eliminarAlumno&id=" + alumnoId;
            }
        });
    }
</script>

</html>