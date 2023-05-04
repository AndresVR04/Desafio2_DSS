<?php

class usuarios{
    public function insertarUsu($usu, $nombre, $pass, $tipo, $estado){
        $db = new Conexion();
        $dbh = $db->getConexion();
        $hashPass = hash('sha256', $pass);
        //$hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (usu, nombre, password, tipo, estado) VALUES (:usu, :nombre, :pass, :tipo, :estado)";
        try{
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':usu', $usu);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':pass', $hashPass);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':estado', $estado);
        $stmt->execute();
        return '<script>alert("Registros ingresados...")</script>';
        }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
    }

    public function valUsu($usu){
        $db = new Conexion();
        $dbh = $db->getConexion();
        $sql = "SELECT * FROM usuarios WHERE usu = :usu";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':usu', $usu);
        $stmt->execute();
        
        if($stmt->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function mostrarUsus($tipo){
        $rows = null;
        $db = new Conexion();
        $dbh = $db->getConexion();
        $sql = "SELECT * FROM usuarios WHERE tipo = :tipo";
        try{
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->execute();
        }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
        while ($result = $stmt->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function modificarUsu($campo, $valor, $cod){
        $db = new Conexion();
        $dbh = $db->getConexion();
        $sql = "UPDATE usuarios SET $campo = :valor WHERE id_usu = :cod";
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

    public function mostrarUser($cod){
        $rows = null;
        $db = new Conexion();
        $dbh = $db->getConexion();
        $sql = "SELECT * FROM usuarios WHERE id_usu = :cod";
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

    public function eliminarUsu($cod){
        $db = new Conexion();
        $dbh = $db->getConexion();
        $sql = "DELETE FROM usuarios WHERE id_usu = :cod";
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

?>