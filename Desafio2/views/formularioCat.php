<?php 
  $cabecera = $_GET['cabe']; 
  if(isset($_GET['msj'])){
    $msj = $_GET['msj'];
  }
  if($cabecera == 'Modificar Categoria'){
    require_once "../model/classConexion.php";
    require_once "../model/classConsultas.php";
    require_once "../controller/ctrlCategorias.php";
    $cod = $_GET['cod'];
    $datos = mostrarCate($cod);
    foreach($datos as $dato){
      $cod = $dato['cod_categoria'];
      $nom = $dato['nombre'];
      $des = $dato['Descripcion'];
    }
     $info = '<form action="../controller/ctrlCategorias.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
       <label for="nombre">Codigo de la categoria:</label>
       <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Electrodomesticos" required value='.$cod.' readonly>
     </div>
     <div class="form-group">
       <label for="nombre">Nombre de la categoria:</label>
       <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Electrodomesticos" required value='.$nom.'>
     </div>
     <div class="form-group">
       <label for="descripcion">Descripción:</label>
       <textarea class="form-control" id="descripcion" name="descripcion" rows="2" placeholder="Descripción del producto" >'.$des.'</textarea>
     <input type="hidden" name="accion" value="modificarCat">
     <button type="submit" class="btn btn-primary">Guardar</button>
   </form>';

  }else{
    $info = '<form action="../controller/ctrlCategorias.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nombre">Nombre de la categoria:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Electrodomesticos" required>
    </div>
    <div class="form-group">
      <label for="descripcion">Descripción:</label>
      <textarea class="form-control" id="descripcion" name="descripcion" rows="2" placeholder="Descripción del producto" required></textarea>
    <input type="hidden" name="accion" value="registrarCat">
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>';
  }
  isset($accion)?$cabecera:"";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextilExport-<?= $cabecera ?></title>
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
               <a class="nav-link" href="../index.php">Inicio</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="verCategorias.php">Categorias</a>
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
   <div class="container">
    <?php
      if(isset($msj)){
    ?>
      <div class="alert alert-danger"><?= $msj ?></div>
    <?php    
      }
    ?>
   <h1><?= $cabecera ?></h1>
   <?php    
      echo $info;
    ?>
  
</div>

</body>
</html>