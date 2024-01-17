<?php
  session_start();
  if (isset($_SESSION['rol'])){
    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <title>Iniciar Secion</title>
</head>

<body>
  <section class="vh-100" style="background: linear-gradient(to right, #141e30, #243b55);">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card bg-light" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="img/log.webp" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="../controlador/c_iniciarSecion.php" method="post">

                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'incorrecto') {
                    ?>
                      <div class="alert alert-danger" role="alert">
                        <strong>Error!</strong> Datos incorrectos
                      </div>
                    <?php
                    }
                    ?>

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <img src="img/logo.webp" class="d-inline-block align-text-top" alt="" width="50">
                      <span class="h1 fw-bold mb-0 ms-2">Vital Care</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sistema de Ingreso</h5>

                    <div class="form-outline mb-4">
                      <input type="text" id="form2Example17" class="form-control form-control-lg" name="usuario" />
                      <label class="form-label" for="form2Example17">Usuario</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" class="form-control form-control-lg" name="contrasenha" />
                      <label class="form-label" for="form2Example27">Contraseña</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <input class="btn btn-dark btn-lg btn-block" type="submit" value="Ingresar" name="login" />
                      <input class="btn btn-dark btn-lg btn-block" type="reset">
                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>