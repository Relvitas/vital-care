<?php
$page = 5;
include '../vista/header.php';
?>

<?php
include '../controlador/c_buscarCitas.php';
?>

<div class="contaienr mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-11 col-md-10">
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
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Observaciones</th>
                            <th scope="col">Medico</th>
                            <th scope="col">Consultorio</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_POST['buscar'])){
                            foreach ($cita as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->idCita?></td>
                                    <td><?php echo $dato->citFecha?></td>
                                    <td><?php echo $dato->citHora?></td>
                                    <td><?php echo $dato->paciIdentificacion?></td>
                                    <td><?php echo $dato->pacNombres?></td>
                                    <td><?php echo $dato->citEstado?></td>
                                    <td><?php echo $dato->citObservaciones?></td>
                                    <td><?php echo $dato->medNombres?></td>
                                    <td><?php echo $dato->conNombre?></td>
                                    <td>
                                        <a href="v_editarCitas.php?codigo=<?php echo $dato->idCita; ?>"><i class="text-success fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td>
                                        <a href="../controlador/c_eliminarCitas.php?codigo=<?php echo $dato->idCita; ?>" onclick="return confirm('Estas seguro de eliminar?')"><i class="text-danger fa-solid fa-trash-can"></i></a>
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