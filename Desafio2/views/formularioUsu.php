<?php
    require_once "../model/classConexion.php";
    require_once "../model/classConsultas.php";
    require_once "../controller/ctrlUsuario.php";
$cabecera = $_GET['cabe'];
if($cabecera = "Ingresar Empleado"){
   $tipo = "empleado";
}else{
   $tipo = "cliente";
}


if(isset($_GET['msj'])){
   $msj = $_GET['msj'];
 }
if($cabecera == 'Modificar Usuario'){

   $cod = $_GET['cod'];
   $datos = mostrarUser($cod);
   foreach($datos as $dato){
     $cod = $dato['id_usu'];
     $usu = $dato['usu'];
     $nom = $dato['nombre'];
     $pas = $dato['password'];
     $tp = $dato['tipo'];
     $es = $dato['estado'];
     echo $tipo;
   }
   $info ='<form action="../controller/ctrlUsuario.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
  <input type="hidden" value='.$cod.' name="cod">
  <input type="hidden" value='.$tipo.' name="tipo">
  
      <label for="usu">Usuario:</label>
      <input type="text" class="form-control" id="usu" name="usu" placeholder="JuanBe" required value='.$usu.'>
    </div>  
  <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan Benitez" required value='.$nom.'>
    </div>
    <div class="form-group">
      <label for="contra">Contraseña:</label>
      <input type="password" class="form-control" id="contra" name="contra" placeholder="*********" required>
    </div>
    <div class="form-group">

    <div class="form-group">
      <label for="conf">Confirma la contraseña:</label>
      <input type="password" class="form-control" id="conf" name="conf" placeholder="*********" required>
    </div>
    <input type="hidden" name="accion" value="modificarUsu">
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>';
 }else{
   $info = '<form action="../controller/ctrlUsuario.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
  <input type="hidden" value='.$tipo.' name="tipo">
      <label for="usu">Usuario:</label>
      <input type="text" class="form-control" id="usu" name="usu" placeholder="JuanBe" required>
    </div>  
  <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan Benitez" required>
    </div>
    <div class="form-group">
      <label for="contra">Contraseña:</label>
      <input type="password" class="form-control" id="contra" name="contra" placeholder="*********" required>
    </div>
    <div class="form-group">

    <div class="form-group">
      <label for="conf">Confirma la contraseña:</label>
      <input type="password" class="form-control" id="conf" name="conf" placeholder="*********" required>
    </div>
    <input type="hidden" name="accion" value="Registrar">
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>';
   
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextilExport-<?=$cabecera?></title>
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
               <a class="nav-link" href="#">Acerca de</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Contacto</a>
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
  <h1><?=$cabecera?></h1>
  <?php    
      echo $info;
    ?>
</div>

</body>
</html>