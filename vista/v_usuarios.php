<!-- Inclusion del header -->
<?php
  $page = 1;
  include 'header.php';
?>

<?php
  include_once "../modelo/conexion.php";
  $sentencia = $bd->query("select * from usuarios");
  $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="contaienr mt-5">
  <div class="row row-cols-auto justify-content-center">

  <!-- Tabla de datos -->
    <div class="col-sm-11 col-md-7 col-xl-6">

      <!-- inicio alerta -->
      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Rellena todos los campos
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registrado!</strong> Se agregaron los datos correctamete
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Vuelve a intentar.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado') {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>OK!</strong> Los datos fueron actualizados
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <?php
      if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Ok!</strong> Datos eliminados
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>
      <!-- fin alerta -->

      <div class="card text-dark bg-light">
        <div class="card-header">
          Lista de Usuarios
          <div class="col-1 float-end">
            <a href="v_buscarUsuarios.php" class="text-success"><i class="fa-solid fa-magnifying-glass"></i></a>
          </div>
        </div>
        <div class="p-4 overflow-auto">
          <table class="table align-middle">
            <thead class="">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Apelativo</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Estado</th>
                <th scope="col">Rol</th>
                <th scope="col" colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($persona as $dato) {
              ?>
                <tr>
                  <td scope="row"><?php echo $dato->idUsuario; ?></td>
                  <td><?php echo $dato->usuLogin; ?></td>
                  <td><?php echo $dato->usuPassword; ?></td>
                  <td><?php echo $dato->usuEstado; ?></td>
                  <td><?php echo $dato->usuRol; ?></td>
                  <td>
                    <a href="v_editarUsuarios.php?codigo=<?php echo $dato->idUsuario; ?>"><i class="text-success fa-solid fa-pen-to-square"></i></a>
                  </td>
                  <td>
                    <a href="../controlador/c_eliminarUsuarios.php?codigo=<?php echo $dato->idUsuario; ?>" onclick="return confirm('Estas seguro de eliminar?')"><i class="text-danger fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Fin tabla de datos -->
    
    <!-- Formulario de Registro -->
    <div class="col-md-4 col-lg-4 col-xl-3">
      <div class="card text-dark bg-light">
        <div class="card-header">
          Registrar Usuario
        </div>
        <form action="../controlador/c_registrarUsuarios.php" class="p-4" method="POST">
          <div class="mb-3">
            <label for="" class="form-label">
              Apelativo:
            </label>
            <input type="text" class="form-control" name="apelativo" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">
              Password:
            </label>
            <input type="password" class="form-control" name="contraseña" required>
          </div>
          <div class="input-group">
            <div class="me-3">
              Estado:
            </div>
            <div class=" mb-3 form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">Activo</label>
              <input class="form-check-input" type="radio" name="estado" value="Activo" id="inlineRadio1" required>
            </div>
            <div class="mb-3 form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio2">Inactivo</label>
              <input class="form-check-input" type="radio" name="estado" value="Inactivo" id="inlineRadio2">
            </div>
          </div>
          <div class="mb-2">Rol usuario:</div>
          <select class="form-select mb-3" aria-label="Default select example" name="rol">
            <option selected disabled>Selecciona una opción...</option>
            <option value="Mendico">Medico</option>
            <option value="Administrador">Administrador</option>
            <option value="Coordinador de Citas">Coordinador de Citas</option>
            <option value="Visor">Visor</option>
          </select>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-success" value="Guardar">
          </div>
        </form>
      </div>
    </div>
    <!-- Fin de Formulario -->

  </div>
</div>
