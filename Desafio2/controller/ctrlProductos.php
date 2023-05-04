<?php 
    require_once "../model/classConexion.php";
    require_once "../model/classConsultas.php";


    $cod_producto = isset($_POST['codigo'])?$_POST['codigo']:"";
    $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
    $desc = isset($_POST['descripcion'])?$_POST['descripcion']:"";
    $categoria = isset($_POST['categoria'])?$_POST['categoria']:"";
    $precio = isset($_POST['precio'])?$_POST['precio']:"";
    $exist = isset($_POST['existencias'])?$_POST['existencias']:"";
    $accion = isset($_POST['accion'])?$_POST['accion']:"";
    $acc = isset($_GET['acc'])?$_GET['acc']:"";
    $errores = [];


    if($accion == "regisPro"){
        if(strlen($cod_producto)>0 && strlen($nombre)>0 && strlen($desc)>0 && strlen($categoria)>0 && strlen($precio)>0 && strlen($exist)>0){
            $consultas = new consultas;
            if(!$consultas->valCod($cod_producto)){
            $mensaje = null;
            $mensaje = $consultas->insertar($cod_producto, $nombre, $desc, $categoria, $precio, $exist);
            //header('location:../../login/index.php');//Linea para cuando este listo todo
            // echo '<a href="../../registrar/registrar.php">Volvamos a introducir usuarios</a><br/>';
            // echo '<a href="../vista/vistaMostrar.php">Ver usuarios</a><br/>';
            ?> 
            <script>alert("Producto Ingresado correctamente.")
            window.location='../views/verProductos.php';</script>
            <?php
            }else{
                $msj = null;
                $msj = 'Codigo de producto ya existe...';
                header('location: ../views/formularioPro.php?cabe=Ingresar Producto&&msj='.$msj);
            }

        }else{
            $msj = null;
            $msj = 'Hay campos vacios...';
            header('location: ../views/formularioPro.php?cabe=Ingresar Producto&&msj='.$msj);
        }
    }

    if($accion == "modificarPro"){
        $consultas = new consultas();
        if(strlen($cod_producto)>0 && strlen($nombre)>0 && strlen($desc)>0 && strlen($categoria)>0 && strlen($precio)>0 && strlen($exist)>0){
            $mensaje = $consultas->modificar("nombre",$nombre, $cod_producto);
            $mensaje = $consultas->modificar("descripcion",$desc, $cod_producto);
            $mensaje = $consultas->modificar("categoria",$categoria, $cod_producto);
            $mensaje = $consultas->modificar("precio",$precio, $cod_producto);
            $mensaje = $consultas->modificar("existencia",$exist, $cod_producto);
            $msj = $mensaje; 
            ?> 
            <script>alert("Producto modificacio correctamente.")
            window.location='../views/index_admin.php';</script>
            <?php
        }else{
            $msj = null;
            $msj = 'Hay campos vacios...';
            header('location: ../views/formularioPro.php?cabe=Modificar Producto&&msj='.$msj.'&&cod='.$cod_producto);
        }
    }

    if($acc == "eliminarPro"){
        $mensaje = null;
        $cod = $_GET['cod'];
        $consultas = new consultas();
        $mensaje = $consultas->eliminar($cod);
        $msj = $mensaje;
        header('location: ../views/verProductos.php?msg=Producto%20Eliminado%20Correctamente!!!');   
    }

    function mostrarP(){
        
            $consultas = new consultas();
            $filas = $consultas->mostrarP();
    ?>
    <div class="container">
    <h1>Productos Registrados</h1>
   <a class="btn btn-primary" href="../views/formularioPro.php?cabe=Ingresar Producto">Ingresar producto</a>
    <table class="table">
      <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Existencias</th>
            <center><th colspan='2'>Opciones</th></center>
        </tr>
      </thead>
      <tbody>
        <?php
            foreach($filas as $fila){
                ?>
                <tr>
                    <td><?= $fila['cod_producto'] ?></td>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= $fila['descripcion'] ?></td>
                    <td><?= $fila['categoria'] ?></td>
                    <td><?= $fila['precio'] ?></td>
                    <td><?= $fila['existencia'] ?></td>
                    <td><a href='../controller/ctrlProductos.php?acc=eliminarPro&&cod=<?= $fila['cod_producto'] ?>' class="btn btn-danger">Eliminar</a></td>
                    <td><a href='../views/formularioPro.php?cabe=Modificar Producto&&cod=<?= $fila['cod_producto'] ?>' class="btn btn-warning">Modificar</a></td>
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
    
    function mostrarDato($cod){
        $consultas = new consultas;
        $filas = $consultas->mostrarD($cod);
        return $filas;
    }

?>