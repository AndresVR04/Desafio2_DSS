<?php

    class consultas {
    
//PARA PRODUCTOS

        public function insertar($codigo, $nombre, $desc, $codCa, $precio, $exis){
            $db = new Conexion();
            $dbh = $db->getConexion();

            //$hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO productos (cod_producto, nombre, descripcion, categoria, precio, existencia) VALUES (:cod, :nombre, :descr, :codCa, :precio, :exis)";
            try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':cod', $codigo);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descr', $desc);
            $stmt->bindParam(':codCa', $codCa);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':exis', $exis);
            $stmt->execute();
            return '<script>alert("Registros ingresados...")</script>';
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        }

        public function valCod($codigo){
            $db = new Conexion();
            $dbh = $db->getConexion();
            $sql = "SELECT * FROM productos WHERE cod_producto = :codigo";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->execute();
            
            if($stmt->rowCount()){
                return true;
            }else{
                return false;
            }
        }

        public function mostrarP(){
            $rows = null;
            $db = new Conexion();
            $dbh = $db->getConexion();
            $sql = "SELECT * FROM productos";
            try{
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
            while ($result = $stmt->fetch()){
                $rows[]=$result;
            }
            return $rows;
        }

        public function mostrarD($cod){
            $rows = null;
            $db = new Conexion();
            $dbh = $db->getConexion();
            $sql = "SELECT * FROM productos WHERE cod_producto = :cod";
            try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
            while ($result = $stmt->fetch()){
                $rows[]=$result;
            }
            return $rows;
        }

        public function modificar($campo, $valor, $cod){
            $db = new Conexion();
            $dbh = $db->getConexion();
            $sql = "UPDATE productos SET $campo = :valor WHERE cod_producto = :cod";
            try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
            return 'Usuario modificado correctamente, vuelve a iniciar sesión...';
        }
        

        public function eliminar($cod){
            $db = new Conexion();
            $dbh = $db->getConexion();
            $sql = "DELETE FROM productos WHERE cod_producto = :cod";
            try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        return 'Usuario eliminado correctamente.';
        }



        //PARA CATEGORIAS

        public function insertarCat($nombre, $desc){
            $db = new Conexion();
            $dbh = $db->getConexion();

            //$hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO categoria (nombre, descripcion) VALUES (:nombre, :descr)";
            try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descr', $desc);
            $stmt->execute();
            return '<script>alert("Registros ingresados...")</script>';
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        }


        public function valCat($codigo){
            $db = new Conexion();
            $dbh = $db->getConexion();
            $sql = "SELECT * FROM categoria WHERE cod_categoria = :codigo";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->execute();
            
            if($stmt->rowCount()){
                return true;
            }else{
                return false;
            }
        }

        public function mostrarCategorias(){
            $rows = null;
            $db = new Conexion();
            $dbh = $db->getConexion();
            $sql = "SELECT * FROM categoria";
            try{
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
            while ($result = $stmt->fetch()){
                $rows[]=$result;
            }
            return $rows;
        }

        public function mostrarCat($cod){
            $rows = null;
            $db = new Conexion();
            $dbh = $db->getConexion();
            $sql = "SELECT * FROM categoria WHERE cod_categoria = :cod";
            try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
            while ($result = $stmt->fetch()){
                $rows[]=$result;
            }
            return $rows;
        }

        public function modificarCat($campo, $valor, $cod){
            $db = new Conexion();
            $dbh = $db->getConexion();
            $sql = "UPDATE categoria SET $campo = :valor WHERE cod_categoria = :cod";
            try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
            return 'Usuario modificado correctamente, vuelve a iniciar sesión...';
        }

        public function eliminarCat($cod){
            $db = new Conexion();
            $dbh = $db->getConexion();
            $sql = "DELETE FROM categoria WHERE cod_categoria = :cod";
            try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        return 'Usuario eliminado correctamente.';
        }
    }