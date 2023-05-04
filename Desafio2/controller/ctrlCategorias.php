<?php 
    require_once "../model/classConexion.php";
    require_once "../model/classConsultas.php";


    $cod_categoria = isset($_POST['codigo'])?$_POST['codigo']:"";
    $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
    $desc = isset($_POST['descripcion'])?$_POST['descripcion']:"";
    $accion = isset($_POST['accion'])?$_POST['accion']:"";
    $acc = isset($_GET['acc'])?$_GET['acc']:"";
    $errores = [];

    if($accion == "registrarCat"){
        if(strlen($nombre)>0 && strlen($desc)>0){
            $consultas = new consultas;
            if(!$consultas->valCat($cod_producto)){
            $mensaje = null;
            $mensaje = $consultas->insertarCat($nombre, $desc);
            ?> 
            <script>alert("Categoria Ingresado correctamente.")
            window.location='../views/verCategorias.php';</script>
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

    if($accion == "modificarCat"){
        $consultas = new consultas();
        if(strlen($nombre)>0 && strlen($desc)>0){
            $mensaje = $consultas->modificarCat("nombre",$nombre, $cod_categoria);
            $mensaje = $consultas->modificarCat("Descripcion",$desc, $cod_categoria);
            $msj = $mensaje; 
            ?> 
            <script>alert("Categoria modificacio correctamente.")
            window.location='../views/index_admin.php';</script>
            <?php
        }else{
            $msj = null;
            $msj = 'Hay campos vacios...';
            header('location: ../views/formularioPro.php?cabe=Modificar Producto&&msj='.$msj.'&&cod='.$cod_producto);
        }
    }

    if($acc == "eliminarCat"){
        $mensaje = null;
        $cod = $_GET['cod'];
        $consultas = new consultas();
        $mensaje = $consultas->eliminarCat($cod);
        $msj = $mensaje;
        header('location: ../views/verCategorias.php?msg=Categoria%20Eliminada%20Correctamente!!!');   
    }


    function mostrarC(){
        
        $consultas = new consultas();
        $filas = $consultas->mostrarC();
    ?>
        <div class="container">
        <h1>Productos Registrados</h1>
        <a class="btn btn-primary" href="../views/formularioCat.php?cabe=Ingresar Categoria">Ingresar Categoria</a>
        <table class="table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <center><th colspan='2'>Opciones</th></center>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($filas as $fila){
                    ?>
                    <tr>
                        <td><?= $fila['cod_categoria'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['Descripcion'] ?></td>
                        <td><a href='../controller/ctrlCategorias.php?acc=eliminarCat&&cod=<?= $fila['cod_categoria'] ?>' class="btn btn-danger">Eliminar</a></td>
                        <td><a href='../views/formularioCat.php?cabe=Modificar Categoria&&cod=<?= $fila['cod_categoria'] ?>' class="btn btn-warning">Modificar</a></td>
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


    function mostrarCate($cod){
        $consultas = new consultas;
        $filas = $consultas->mostrarCat($cod);
        return $filas;
    }
?>