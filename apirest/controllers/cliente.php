<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
header('Content-Type: application/json');
require_once("../config/Conectar.php");

require_once("../models/Cliente.php");

$cliente = new Cliente();

$body= json_decode(file_get_contents("php://input"),true);
    switch ($_GET["op"]) {

        case "GetAll":
            $datos=$cliente->get_cliente();
            echo json_encode($datos);
            break;

        case "GetId":
            $datos = $cliente->get_cliente_id($body["cliente_id"]);
            echo json_encode($datos);

        case "insert":
                $datos=$cliente->insert_cliente($body["cliente_id"], $body["nombre"], $body["edad"], $body["direccion"], $body["texto_adicional"]);
                echo json_encode("insertado correctamente");
            break;
            case "update":

                $datos=$cliente->update_cliente($body["cliente_id"], $body["nombre"], $body["edad"], $body["direccion"], $body["texto_adicional"]);
                echo json_encode("Cliente actualizado correctamente");
          
            break;
        
            case "delete":
        
                $datos=$cliente->delete_cliente($body["cliente_id"]);
                echo json_encode("Cliente eliminado correctamente");
          
              break;

        default:
            # code...
            break;
    }
?>