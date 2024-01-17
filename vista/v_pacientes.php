<!-- Inclusion del header -->
<?php
  $page = 6;
  include 'header.php';
?>

<?php
  include_once "../modelo/conexion.php";
  $sentencia = $bd -> query("select * from pacientes");
  $paciente = $sentencia -> fetchAll(PDO::FETCH_OBJ);
  //print_r($paciente);
?>

<!-- Vista Pacientes -->
<div class="container-fluid mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">

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
          Lista de Pacientes
          <div class="col-1 float-end">
            <a href="v_buscarPacientes.php" class="text-success"><i class="fa-solid fa-magnifying-glass"></i></a>
          </div>
        </div>
        <div class="p-4 overflow-auto">
          <table class="table aling-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Identificación</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Genero</th>
                <th scope="col"j colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($paciente as $info){
              ?>

              <tr>
                <td scope="row"><?php echo $info -> idPaciente;?></td>
                <td><?php echo $info -> paciIdentificacion;?></td>
                <td><?php echo $info -> pacNombres;?></td>
                <td><?php echo $info -> pacApellidos;?></td>
                <td><?php echo $info -> pacFechaNacimiento;?></td>
                <td><?php echo $info -> pacSexo;?></td>
                <td>
                    <a href="v_editarPacientes.php?codigo=<?php echo $info->idPaciente; ?>"><i class="text-success fa-solid fa-pen-to-square"></i></a>
                  </td>
                  <td>
                    <a href="../controlador/c_eliminarPacientes.php?codigo=<?php echo $info->idPaciente; ?>" onclick="return confirm('Estas seguro de eliminar?')"><i class="text-danger fa-solid fa-trash-can"></i></a>
                  </td>
                </tr>
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
    <div class="col-md-4 col-auto">
      <div class="card">
        <div class="card-header">
          Registrar Paciente
        </div>
        <form action="/controlador/c_registrarPacientes.php" class="p-4" method="POST">
          <div class="mb-3">
            <label class="form-label">N° Idetificación:</label>
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
            <label class="form-label">Fecha Nacimiento:</label>
            <input type="date" class="form-control" name="fecNacimiento" required>
          </div>
          <div class="input-group">
            <div class="me-3">
              Genero:
            </div>
            <div class=" mb-3 form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio1">Masculino</label>
              <input class="form-check-input" type="radio" name="genero" value="Masculino" id="inlineRadio1" required>
            </div>
            <div class="mb-3 form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio2">Femenino</label>
              <input class="form-check-input" type="radio" name="genero" value="Femenino" id="inlineRadio2">
            </div>
            <div class="mb-3 form-check form-check-inline">
              <label class="form-check-label" for="inlineRadio2">Indefinido</label>
              <input class="form-check-input" type="radio" name="genero" value="Indefinido" id="inlineRadio2">
            </div>
          </div>
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-success" value="Guardar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>