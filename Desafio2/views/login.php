<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TextilExport-Login</title>
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
   <form method="post" action="../controller/login.php">
      <div class="form-group">
         <label for="usuario">Usuario</label>
         <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario">
      </div>
      <div class="form-group">
         <label for="contraseña">Contraseña</label>
         <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingresa tu contraseña">
      </div>
      <button type="submit" name="login" class="btn btn-primary">Iniciar sesión</button>
   </form>
   <h5>¿No tienes una cuenta?</h5>
   <a href="register.php"><button type="submit" name="register" class="btn btn-secondary">Registrarse</button></a>
</div>
</body>
</html>