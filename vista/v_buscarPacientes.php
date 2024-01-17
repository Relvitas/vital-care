<?php
$page = 6;
include '../vista/header.php';
?>

<?php
include '../controlador/c_buscarPacientes.php';
?>

<div class="contaienr mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-10">
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
                                <th scope="col">Fecha Nacimiento</th>
                                <th scope="col">Genero</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_POST['buscar'])){
                            foreach ($paciente as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->idPaciente; ?></td>
                                    <td><?php echo $dato->paciIdentificacion; ?></td>
                                    <td><?php echo $dato->pacNombres; ?></td>
                                    <td><?php echo $dato->pacApellidos; ?></td>
                                    <td><?php echo $dato->pacFechaNacimiento; ?></td>
                                    <td><?php echo $dato->pacSexo; ?></td>
                                    <td>
                                        <a href="v_editarPacientes.php?codigo=<?php echo $dato->idPaciente; ?>"><i class="text-success fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td>
                                        <a href="../controlador/c_eliminarPacientes.php?codigo=<?php echo $dato->idPaciente; ?>" onclick="return confirm('Estas seguro de eliminar?')"><i class="text-danger fa-solid fa-trash-can"></i></a>
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