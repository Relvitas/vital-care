<?php
$page = 4;
include '../vista/header.php';
?>

<?php
include '../controlador/c_buscarMedicos.php';
?>

<div class="contaienr mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-11 col-md-9">
            <div class="card">
                <div class="card-header">
                    <form class="d-flex" method="post">
                        <input class="form-control me-1" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
                        <button class="btn btn-success" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="p-4 overflow-auto">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Identificacion</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Especialidad</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_POST['buscar'])){
                            foreach ($medico as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->idMedico; ?></td>
                                    <td><?php echo $dato->medIdentificacion; ?></td>
                                    <td><?php echo $dato->medNombres; ?></td>
                                    <td><?php echo $dato->medApellidos; ?></td>
                                    <td><?php echo $dato->medEspecialidad; ?></td>
                                    <td><?php echo $dato->medTelefono; ?></td>
                                    <td><?php echo $dato->medCorreo; ?></td>
                                    <td>
                                        <a href="v_editarMedicos.php?codigo=<?php echo $dato->idMedico; ?>"><i class="text-success fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td>
                                        <a href="../controlador/c_eliminarMedicos.php?codigo=<?php echo $dato->idMedico; ?>" onclick="return confirm('Estas seguro de eliminar?')"><i class="text-danger fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>