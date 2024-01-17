<!-- Inclusion del header -->
<?php
$page = 2;
include 'header.php';
?>

<!-- Consulta -->
<?php
include_once "../modelo/conexion.php";
$sentencia = $bd->query("select * from roles");
$rol = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($rol);
?>

<!-- Vista Roles -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7 col-xl-4">

      <!-- Inicio Alertas -->

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

      <!-- Fin Alertas -->

      <div class="card">
        <div class="card-header">
          Lista de Roles
          <div class="col-1 float-end">
            <a href="v_buscarRoles.php" class="text-success"><i class="fa-solid fa-magnifying-glass"></i></a>
          </div>
        </div>
        <div class="p-4">
          <table class="table aling-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Rol</th>
                <th scope="col" j colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($rol as $info) {
              ?>

                <tr>
                  <td scope="row"><?php echo $info->id_rol; ?></td>
                  <td><?php echo $info->nombre_rol; ?></td>
                  <td>
                    <a href="v_editarRoles.php?codigo=<?php echo $info->id_rol; ?>"><i class="text-success fa-solid fa-pen-to-square"></i></a>
                  </td>
                  <td>
                    <a href="../controlador/c_eliminarRoles.php?codigo=<?php echo $info->id_rol; ?>" onclick="return confirm('Estas seguro de eliminar?')"><i class="text-danger fa-solid fa-trash-can"></i></a>
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

    <!-- Formulario -->
    <div class="col-md-4 col-xl-3">
      <div class="card">
        <div class="card-header">
          Registrar Rol
        </div>
        <form action="/controlador/c_registrarRoles.php" class="p-4" method="POST">
          <div class="mb-3">
            <label class="form-label">Rol</label>
            <input type="text" class="form-control" name="rol" required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-success" value="Guardar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>