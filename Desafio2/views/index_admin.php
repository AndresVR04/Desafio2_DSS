<?php 
     require_once "../model/classConexion.php";
     require_once "../model/classConsultas.php";
     require_once "../controller/ctrlProductos.php";
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextilExport</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
               <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="verCategorias.php">Categorias</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="../views/verProductos.php">Productos</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="../views/verClientes.php">Clientes</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="../views/verEmpleados.php">Empleados</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="">Ventas</a>
            </li>
         </ul>
      </div>
      <a href="login.php"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerrar Sesión</button></a>
   </nav>
   <div class="container my-4">
    <h1 class="text-center">Bienvenido a TextilExport</h1>
    <p class="lead text-center">Aquí podrás encontrar una gran variedad de productos a precios increíbles</p>
    <div class="row">
      <?php 
         mostrarVentas();
      ?>
        </div>
      </div>
</body>

</html>