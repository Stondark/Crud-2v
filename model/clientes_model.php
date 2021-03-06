<?php
    require_once("../config/db.php");
    class Clientes extends Conexion{
        public function get_clientes(){
            parent::conectar();
            $sql = "SELECT * FROM clientes";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
            //echo json_encode($resultado);
            //var_dump($resultado); // Mostramos el array de la consulta en pantalla
        }

        public function delete_cliente($cliente_id){
            parent::conectar();
            $sql = "DELETE FROM clientes WHERE id = ?";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindValue(1, $cliente_id);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_cliente($cliente_nombre, $cliente_cedula, $cliente_direccion, $cliente_correo, $cliente_numero){
            parent::conectar();
            $sql = "INSERT INTO clientes (id, nombre, cedula, direccion, correo, numero) VALUES (NULL, ?, ?, ?, ?, ?);";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindValue(1, $cliente_nombre);
            $consulta->bindValue(2, $cliente_cedula);
            $consulta->bindValue(3, $cliente_direccion);
            $consulta->bindValue(4, $cliente_correo);
            $consulta->bindValue(5, $cliente_numero);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_cliente($cliente_id, $cliente_nombre, $cliente_cedula, $cliente_direccion, $cliente_correo, $cliente_numero){
            parent::conectar();
            $sql = "UPDATE clientes SET nombre = ?, cedula = ?, direccion = ?, correo = ?, numero = ?
                    WHERE id = ?";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindValue(1, $cliente_nombre);
            $consulta->bindValue(2, $cliente_cedula);
            $consulta->bindValue(3, $cliente_direccion);
            $consulta->bindValue(4, $cliente_correo);
            $consulta->bindValue(5, $cliente_numero);
            $consulta->bindValue(6, $cliente_id);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        public function count_cliente(){
            parent::conectar();
            $sql = "SELECT * FROM clientes";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            return $consulta->rowCount();
            //return $resultado;

        }

    }

?>