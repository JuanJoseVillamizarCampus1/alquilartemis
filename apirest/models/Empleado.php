<?php

class Empleado extends Conectar{
    public function get_empleado(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm= $conectar->prepare("SELECT * FROM  empleados");
            $stm-> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return  $e ->getMessage();
        }
    }
    public function get_empleado_id($empleado_id){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm= $conectar->prepare("SELECT * FROM  empleados WHERE empleado_id= ?");
            $stm->bindValue(1,$empleado_id);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        }catch (Exception $e) {
            return  $e ->getMessage();
        }
    }
    public function insert_empleado($empleado_id,$nombre,$cargo, $otros_detalles){
        $conectar=parent::conexion();
        parent::set_name();
        $stm="INSERT INTO empleados(empleado_id,nombre,cargo,otros_detalles) VALUES(?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$empleado_id);
        $stm->bindValue(2,$nombre);
        $stm->bindValue(3,$cargo);
        $stm->bindValue(4,$otros_detalles);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
    public function update_empleado($empleado_id,$nombre,$cargo, $otros_detalles){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="UPDATE empleados set nombre=? , cargo=? ,otros_detalles=?, WHERE empleado_id=?";
        $sql=$conectar->prepare($sql);
        
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$empleado_id);
        $stm->bindValue(2,$nombre);
        $stm->bindValue(3,$cargo);
        $stm->bindValue(4,$otros_detalles);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function delete_empleado($empleado_id){
        $conectar=parent::conexion();
        parent::set_name();
        $sql="DELETE FROM empleados WHERE empleado_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
}

?>