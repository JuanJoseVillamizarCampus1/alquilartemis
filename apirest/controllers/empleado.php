<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
header('Content-Type: application/json');
require_once("../config/Conectar.php");

require_once("../models/Empleado.php");

$empleado = new Empleado();

$body= json_decode(file_get_contents("php://input"),true);
    switch ($_GET["op"]) {

        case "GetAll":
            $datos=$empleado->get_empleado();
            echo json_encode($datos);
            break;

        case "GetId":
            $datos = $empleado->get_empleado_id($body["empleado_id"]);
            echo json_encode($datos);

        case "insert":
                $datos=$empleado->insert_empleado($body["empleado_id"], $body["nombre"], $body["cargo"], $body["otros_detalles"]);
                echo json_encode("insertado correctamente");
            break;
            case "update":

                $datos=$empleado->update_empleado($body["empleado_id"], $body["nombre"], $body["cargo"], $body["otros_detalles"]);
                echo json_encode("Empleado actualizado correctamente");
          
            break;
        
            case "delete":
        
                $datos=$empleado->delete_empleado($body["empleado_id"]);
                echo json_encode("Empleado eliminado correctamente");
          
              break;

        default:
            # code...
            break;
    }
?>