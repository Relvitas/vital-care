<?php
$page = 1;
include 'header.php';
?>


<?php
    if(!isset($_GET['codigo'])){
        header('location: v_usuarios.php?mensaje=error');
        exit();
    }

    include_once '../modelo/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd -> prepare("select * from usuarios where idUsuario = ?;");
    $sentencia -> execute([$codigo]);
    $persona = $sentencia ->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
    
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-dark bg-light">
                <div class="card-header">
                    Editar Datos
                </div>
                <form action="../controlador/c_editarUsuarios.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Apelativo:
                        </label>
                        <input type="text" class="form-control" name="apelativo" autofocus required value="<?php echo $persona->usuLogin?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Password:
                        </label>
                        <input type="password" class="form-control" name="contraseña" required value="<?php echo $persona->usuPassword?>">
                    </div>
                    <div class="input-group">
                        <div class="me-3">Estado:</div>
                        <div class=" mb-3 form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">Activo</label>
                            <input class="form-check-input" type="radio" name="estado" value="Activo" id="inlineRadio1" required <?php if($persona -> usuEstado =='Activo'){echo "checked";} ?>>
                        </div>
                        <div class="mb-3 form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio2">Inactivo</label>
                            <input class="form-check-input" type="radio" name="estado" value="Inactivo" id="inlineRadio2" <?php if($persona -> usuEstado =='Inactivo'){echo "checked";} ?>>
                        </div>
                    </div>
                    <div class="mb-2">Rol usuario:</div>
                    <select class="form-select mb-3" aria-label="Default select example" name="rol">
                        <?php 
                        if ($persona -> usuRol == 'Medico'){
                            echo '<option selected value="Mendico">Medico</option>';
                            echo '<option value="Administrador">Administrador</option>';
                            echo '<option value="Coordinador de Citas">Coordinador de Citas</option>';
                            echo '<option value="Visor">Visor</option>';
                        } else if ($persona -> usuRol == 'Administrador'){
                            echo '<option value="Mendico">Medico</option>';
                            echo '<option selected value="Administrador">Administrador</option>';
                            echo '<option value="Coordinador de Citas">Coordinador de Citas</option>';
                            echo '<option value="Visor">Visor</option>';
                        } else if ($persona -> usuRol == 'Coordinador de Citas'){
                            echo '<option value="Mendico">Medico</option>';
                            echo '<option value="Administrador">Administrador</option>';
                            echo '<option selected value="Coordinador de Citas">Coordinador de Citas</option>';
                            echo '<option value="Visor">Visor</option>';
                        } else {
                            echo '<option value="Mendico">Medico</option>';
                            echo '<option value="Administrador">Administrador</option>';
                            echo '<option value="Coordinador de Citas">Coordinador de Citas</option>';
                            echo '<option selected value="Visor">Visor</option>';
                        }
                        ?>
                    </select>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona -> idUsuario;?>">
                        <input type="submit" class="btn btn-success" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>