<?php
    require_once "../model/classConexion.php";
    require_once "../model/classConsultas.php";
    require_once "../controller/ctrlCategorias.php";
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Productos Registrados</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">TextixExport</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="../views/index_admin.php">Inicio</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="../views/verCategorias.php">Categorias</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="../views/verProductos.php">Productos</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Usuarios</a>
            </li>
         </ul>
      </div>
      <a href="views/login.php"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Iniciar sesión</button></a>
   </nav>
   <?php
      if(isset($msg)){
    ?>
         <div class="alert alert-success"><?= $msg ?></div>
    <?php    
      }
    ?>

<?php 
    mostrarC();
?>
</body>
</html>
