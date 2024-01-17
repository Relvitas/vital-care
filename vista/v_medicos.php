<!-- Inclusion del header -->
<?php
  $page = 4;
  include 'header.php';
?>

<?php
  include_once "../modelo/conexion.php";
  $sentencia = $bd -> query("select * from medicos");
  $medico = $sentencia -> fetchAll(PDO::FETCH_OBJ);
  //print_r($medico);
?>

<!-- Vista Medicos -->
<div class="container mt-5">
  <div class="row row-cols-lg-2 justify-content-center">
    <div class=" col-lg-9">

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
          Lista de Medicos
          <div class="col-1 float-end">
            <a href="v_buscarMedicos.php" class="text-success"><i class="fa-solid fa-magnifying-glass"></i></a>
          </div>
        </div>
        <div class="p-4 overflow-auto">
          <table class="table aling-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">N° Identificación</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col"j colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($medico as $info){
              ?>

              <tr>
                <td scope="row"><?php echo $info -> idMedico?></td>
                <td><?php echo $info -> medIdentificacion?></td>
                <td><?php echo $info -> medNombres?></td>
                <td><?php echo $info -> medApellidos?></td>
                <td><?php echo $info -> medEspecialidad?></td>
                <td><?php echo $info -> medTelefono?></td>
                <td><?php echo $info -> medCorreo?></td>
                <td>
                  <a href="v_editarMedicos.php?codigo=<?php echo $info->idMedico; ?>"><i class="text-success fa-solid fa-pen-to-square"></i></a>
                </td>
                <td>
                  <a href="../controlador/c_eliminarMedicos.php?codigo=<?php echo $info->idMedico; ?>" onclick="return confirm('Estas seguro de eliminar?')"><i class="text-danger fa-solid fa-trash-can"></i></a>
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
    <div class="col-lg-3 col-auto">
      <div class="card">
        <div class="card-header">
          Registrar Medico
        </div>
        <form action="/controlador/c_registrarMedicos.php" class="p-4" method="POST">
          <div class="mb-3">
            <label class="form-label">N° Identificación:</label>
            <input type="text" class="form-control" name="identificacion" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nombres:</label>
            <input type="text" class="form-control" name="nombres" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Especialidad:</label>
            <input type="text" class="form-control" name="especialidad" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Telefono:</label>
            <input type="tel" class="form-control" name="telefono" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Correo:</label>
            <input type="email" class="form-control" name="correo" required>
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