<?php
  session_start();
  /* Validar si el usuario esta establescido */
  if(!isset($_SESSION['rol'])){

    header('location: login.php');

  } elseif(isset($_SESSION['rol'])){
    /* Crear secciones y almacenarlas en variables */
    $rol = $_SESSION['rol'];
    $id = $_SESSION['id'];

  } else {

    echo "Error en el sistema";

  }

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- CDN Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <title>Vital Care</title>
  
  <!-- JS Bootstrap -->
  <script src="js/bootstrap.bundle.min.js"></script>

</head>

<body>
  <!-- Barra de navegacion -->
  <header class="p-3 bg-dark text-white">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img class="me-2" src="img/logo.webp" class="d-inline-block align-text-top" alt="" width="30">Vital Care
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?php if($page == '0'){ echo 'active';}?>" aria-current="page" href="index.php">
              <i class="fa-solid fa-house-chimney"></i>
                Inicio
              </a>
            </li>

            <!-- Permiso de usuarios -->
            <?php if($id == 1){?>

              <li class="nav-item"> 
                <!-- Link active -->
                <a class="nav-link <?php if($page == '1'){ echo 'active';}?>" aria-current="page" href="v_usuarios.php">
                  <i class="fa-solid fa-users"></i>
                  Usuarios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($page == '2'){ echo 'active';}?>" aria-current="page" href="v_roles.php">
                <i class="fa-solid fa-user-gear"></i>
                  Roles
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($page == '3'){ echo 'active';}?>" aria-current="page" href="v_consultorios.php">
                <i class="fa-solid fa-house-chimney-medical"></i>    
                Consultorios
              </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($page == '4'){ echo 'active';}?>" aria-current="page" href="v_medicos.php">
                <i class="fa-solid fa-hand-holding-medical"></i>
                  Medicos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($page == '5'){ echo 'active';}?>" aria-current="page" href="v_citas.php">
                <i class="fa-solid fa-calendar-plus"></i>
                Citas
              </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($page == '6'){ echo 'active';}?>" aria-current="page" href="v_pacientes.php">
                <i class="fa-solid fa-bed"></i>    
                Pacientes
              </a>
              </li>

            <?php
            }
            ?>
            
            <!-- Permiso de usuarios -->
            <?php if($id == 2){?>

            <li class="nav-item"> 
              <!-- Link active -->
            <li class="nav-item">
              <a class="nav-link <?php if($page == '5'){ echo 'active';}?>" aria-current="page" href="v_citas.php">
              <i class="fa-solid fa-calendar-plus"></i>
              Citas
            </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($page == '6'){ echo 'active';}?>" aria-current="page" href="v_pacientes.php">
              <i class="fa-solid fa-bed"></i>    
              Pacientes
            </a>
            </li>

            <?php
            }
            ?>

            <!-- Permiso de usuarios -->
            <?php if($id == 3){?>

            <li class="nav-item"> 
              <!-- Link active -->
            <li class="nav-item">
              <a class="nav-link <?php if($page == '5'){ echo 'active';}?>" aria-current="page" href="v_citas.php">
              <i class="fa-solid fa-calendar-plus"></i>
              Citas
            </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($page == '6'){ echo 'active';}?>" aria-current="page" href="v_pacientes.php">
              <i class="fa-solid fa-bed"></i>    
              Pacientes
            </a>
            </li>
            <?php
            }
            ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user me-1"></i><?php echo $_SESSION['rol'] ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../controlador/c_cerrarSecion.php">Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>