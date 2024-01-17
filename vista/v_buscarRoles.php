<?php
$page = 2;
include '../vista/header.php';
?>

<?php
include '../controlador/c_buscarRoles.php';
?>

<div class="contaienr mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <form class="d-flex" method="post">
                        <input class="form-control me-1" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
                        <button class="btn btn-success" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Rol</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_POST['buscar'])){
                            foreach ($rol as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id_rol; ?></td>
                                    <td><?php echo $dato->nombre_rol; ?></td>
                                    <td>
                                        <a href="v_editarRoles.php?codigo=<?php echo $dato->id_rol; ?>"><i class="text-success fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td>
                                        <a href="../controlador/c_eliminarRoles.php?codigo=<?php echo $dato->id_rol; ?>" onclick="return confirm('Estas seguro de eliminar?')"><i class="text-danger fa-solid fa-trash-can"></i></a>
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