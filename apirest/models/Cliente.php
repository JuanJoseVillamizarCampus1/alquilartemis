<?php

class Cliente extends Conectar{
    public function get_cliente(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm= $conectar->prepare("SELECT * FROM  clientes");
            $stm-> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return  $e ->getMessage();
        }
    }
    public function get_cliente_id($cliente_id){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm= $conectar->prepare("SELECT * FROM  clientes WHERE cliente_id= ?");
            $stm->bindValue(1,$cliente_id);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        }catch (Exception $e) {
            return  $e ->getMessage();
        }
    }
    public function insert_cliente($cliente_id,$nombre,$edad, $direccion, $texto_adicional){
        $conectar=parent::conexion();
        parent::set_name();
        $stm="INSERT INTO clientes(cliente_id,nombre,edad,direccion,texto_adicional) VALUES(?,?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$cliente_id);
        $stm->bindValue(2,$nombre);
        $stm->bindValue(3,$edad);
        $stm->bindValue(4,$direccion);
        $stm->bindValue(5,$texto_adicional);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
    public function update_cliente($cliente_id,$nombre,$edad, $direccion, $texto_adicional){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="UPDATE clientes set nombre=? , edad=? ,direccion=?, texto_adicional=?, WHERE cliente_id=?";
        $sql=$conectar->prepare($sql);
        
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$cliente_id);
        $stm->bindValue(2,$nombre);
        $stm->bindValue(3,$edad);
        $stm->bindValue(4,$direccion);
        $stm->bindValue(5,$texto_adicional);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function delete_cliente($cliente_id){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM clientes WHERE cliente_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>