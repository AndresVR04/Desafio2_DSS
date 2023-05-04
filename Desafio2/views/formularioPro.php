<?php 
  $cabecera = $_GET['cabe']; 
  if(isset($_GET['msj'])){
    $msj = $_GET['msj'];
  }
  if($cabecera == 'Modificar Producto'){
    require_once "../model/classConexion.php";
    require_once "../model/classConsultas.php";
    require_once "../controller/ctrlProductos.php";
    $cod = $_GET['cod'];
    $datos = mostrarDato($cod);
    foreach($datos as $dato){
      $cod = $dato['cod_producto'];
      $nom = $dato['nombre'];
      $des = $dato['descripcion'];
      $cat = $dato['categoria'];
      $pre = $dato['precio'];
      $exi = $dato['existencia'];
    }
     $info = '<form action="../controller/ctrlProductos.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
       <label for="codigo">Código del producto:</label>
       <input type="text" class="form-control" id="codigo" name="codigo" placeholder="PROD#####" pattern="PROD\d{5}" required value='.$cod.' readonly>
     </div>
     <div class="form-group">
       <label for="nombre">Nombre del producto:</label>
       <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required value='.$nom.'>
     </div>
     <div class="form-group">
       <label for="descripcion">Descripción:</label>
       <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción del producto" >'.$des.'</textarea>
     </div>
     <!-- <div class="form-group">
       <label for="imagen">Imagen del producto:</label>
       <input type="file" class="form-control-file" id="imagen" name="imagen" accept=".jpg, .png" required>
     </div> -->
     <div class="form-group">
       <label for="categoria">Categoría:</label>
       <select class="form-control" id="categoria" name="categoria">
         <option value="">Seleccione una categoría</option>
         <option value="Electrónica">Electrónica</option>
         <option value="Ropa">Ropa</option>
         <option value="Hogar">Hogar</option>
       </select>
     </div>
     <div class="form-group">
       <label for="precio">Precio:</label>
       <div class="input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">$</span>
         </div>
         <input type="number" class="form-control" id="precio" name="precio" placeholder="0.00" step="0.01" min="0" required value='.$pre.'>
       </div>
     </div>
     <div class="form-group">
       <label for="existencias">Existencias:</label>
       <input type="number" class="form-control" id="existencias" name="existencias" placeholder="0" min="0" required value='.$exi.'>
     </div>
     <input type="hidden" name="accion" value="modificarPro">
     <button type="submit" class="btn btn-primary">Guardar</button>
   </form>';

  }else{
    $info = '<form action="../controller/ctrlProductos.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
       <label for="codigo">Código del producto:</label>
       <input type="text" class="form-control" id="codigo" name="codigo" placeholder="PROD#####" pattern="PROD\d{5}" required >
     </div>
     <div class="form-group">
       <label for="nombre">Nombre del producto:</label>
       <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required>
     </div>
     <div class="form-group">
       <label for="descripcion">Descripción:</label>
       <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción del producto" required></textarea>
     </div>
     <!-- <div class="form-group">
       <label for="imagen">Imagen del producto:</label>
       <input type="file" class="form-control-file" id="imagen" name="imagen" accept=".jpg, .png" required>
     </div> -->
     <div class="form-group">
       <label for="categoria">Categoría:</label>
       <select class="form-control" id="categoria" name="categoria">
         <option value="">Seleccione una categoría</option>
         <option value="Electrónica">Electrónica</option>
         <option value="Ropa">Ropa</option>
         <option value="Hogar">Hogar</option>
       </select>
     </div>
     <div class="form-group">
       <label for="precio">Precio:</label>
       <div class="input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">$</span>
         </div>
         <input type="number" class="form-control" id="precio" name="precio" placeholder="0.00" step="0.01" min="0" required >
       </div>
     </div>
     <div class="form-group">
       <label for="existencias">Existencias:</label>
       <input type="number" class="form-control" id="existencias" name="existencias" placeholder="0" min="0" required >
     </div>
     <input type="hidden" name="accion" value="regisPro">
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
               <a class="nav-link" href="#">Categorias</a>
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