<?php 
    require_once "../model/classConexion.php";
    require_once "../model/classUsuarios.php";
    $cod = isset($_POST['cod'])?$_POST['cod']:"";
    $usu = isset($_POST['usu'])?$_POST['usu']:"";
    $contra = isset($_POST['contra'])?$_POST['contra']:"";
    $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
    $conf = isset($_POST['conf'])?$_POST['conf']:"";
    $accion = isset($_POST['accion'])?$_POST['accion']:"";
    $acc = isset($_GET['acc'])?$_GET['acc']:"";
    $tipo = isset($_POST['tipo'])?$_POST['tipo']:"";;
    $estado = "1";


    if($accion == "Registrar"){

        
        $mensaje = null;
        if($contra != $conf){
            echo '<script>alert("Las contraseñas no coinciden...");
            window.history.go(-1);</script>';
        }else{
            if(strlen($usu) >0 && strlen($nombre)>0 && strlen($contra)>0 && strlen($conf)>0){
                $consultas = new usuarios;
                if(!$consultas->valUsu($usu)){
                

                    $mensaje = $consultas->insertarUsu($usu, $nombre, $contra, $tipo, $estado);
                
                echo $mensaje;
                session_start();
                $_SESSION['usu'] = $usu;
                if($tipo=="empleado"){
                    header('location:../views/index_admin.php');
                }else{
                header('location:../views/index_cliente.php');
                }//Linea para cuando este listo todo
                // echo '<a href="../../registrar/registrar.php">Volvamos a introducir usuarios</a><br/>';
                // echo '<a href="../vista/vistaMostrar.php">Ver usuarios</a><br/>';
            }else{
                $msj = null;
                $msj = 'Nombre de usuario ya existe...';
                header('location: ../views/formularioUsu.php?cabe=Registrar Usuario&&msj='.$msj);
            }
            }else{
                echo '<script>alert("Hay campos vacíos...");
                window.history.go(-1);</script>';
            }

                
        }
    
    }

    if($accion == "modificarUsu"){
        if($contra != $conf){
            echo '<script>alert("Las contraseñas no coinciden...");
            window.history.go(-1);</script>';
        }else{
        $consultas = new usuarios();
        if(!$consultas->valUsu($usu)){
        if(strlen($usu)>0 && strlen($nombre)>0 && strlen($contra)>0 && strlen($conf)>0){
            $hashPass = hash('sha256', $contra);
            $mensaje = $consultas->modificarUsu("usu",$usu, $cod);
            $mensaje = $consultas->modificarUsu("nombre",$nombre, $cod);
            $mensaje = $consultas->modificarUsu("password",$hashPass, $cod);
            $msj = $mensaje; 
            ?> 
            <script>alert("Usuario modificacio correctamente.")
            window.location='../views/index_admin.php';</script>
            <?php
        }else{
            echo '<script>alert("Hay campos vacíos...");
            window.history.go(-1);</script>';
        }
    }else{
        $msj = null;
            $msj = 'Nombre de usuario ya existe...';
            header('location: ../views/formularioUsu.php?cabe=Modificar Usuario&&msj='.$msj.'&cod='.$cod);
    }
}
    }

    if($acc == "eliminarUsu"){
        $mensaje = null;
        $cod = $_GET['cod'];
        $consultas = new usuarios();
        $mensaje = $consultas->eliminarUsu($cod);
        $msj = $mensaje;
        header('location: ../views/index_admin.php?msg=Cliente%20Eliminado%20Correctamente!!!');   
    }


    function mostrarUsuarios($tipo){
        if($tipo == "empleado"){
            $extra = '<a class="btn btn-primary" href="../views/formularioUsu.php?cabe=Ingresar Empleado">Ingresar Empleado</a>';
        }
        $consultas = new usuarios();
        $filas = $consultas->mostrarUsus($tipo);
?>
<div class="container">
<h1>Usuarios Registrados</h1>
<?php
if(isset($extra)){
    echo $extra;
}
?>
<table class="table">
  <thead>
    <tr>
        <th>Codigo</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Contraseña</th>
        <th>Tipo</th>
        <th>Estado</th>
        <center><th colspan='2'>Opciones</th></center>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($filas as $fila){
            ?>
            <tr>
                <td><?= $fila['id_usu'] ?></td>
                <td><?= $fila['usu'] ?></td>
                <td><?= $fila['nombre'] ?></td>
                <td><?= $fila['password'] ?></td>
                <td><?= $fila['tipo'] ?></td>
                <td><?= $fila['estado'] ?></td>
                <td><a href='../controller/ctrlUsuario.php?acc=eliminarUsu&&cod=<?= $fila['id_usu'] ?>' class="btn btn-danger">Eliminar</a></td>
                <td><a href='../views/formularioUsu.php?cabe=Modificar Usuario&&cod=<?= $fila['id_usu'] ?>' class="btn btn-warning">Modificar</a></td>
            </tr>
        <?php
        }
    ?>
  </tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php 
}

function mostrarUser($cod){
    $consultas = new usuarios;
    $filas = $consultas->mostrarUser($cod);
    return $filas;
}
?>