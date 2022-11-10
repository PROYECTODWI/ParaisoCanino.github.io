<?php

    require 'config/config.php';
    require 'config/conexion_db.php';

    if (isset($_POST['action'])) {
        
        $action = $_POST['action'];
        $id = isset($_POST['id_prod']) ? $_POST['id_prod'] : 0;

        if ($action == 'agregar'){
            $cantidad = isset($_POST['cantidad_prod']) ? $_POST['cantidad_prod'] : 0;
            $respuesta = agregar($id, $cantidad);
            if($respuesta > 0){
                $datos['ok'] = true;
            } else {
                $datos['ok'] = false;
            }
            $datos['sub'] = MONEDA . number_format($respuesta,2,'.',',');
        } else {
            $datos['ok'] = false;
        }
    }

    echo json_encode($datos);

    function agregar($id, $cantidad){
        $res = 0;
        if($id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
            if(isset($_SESSION['carrito']['productos'][$id])){
                $_SESSION['carrito']['productos'][$id] = $cantidad;

                $db = new Database();
                $con = $db->conectar();
                $sql = $con->prepare("SELECT precio_prod FROM productos WHERE id_prod=? LIMIT 1");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                $precio = $row['precio_prod'];
                $res = $cantidad * $precio;

                return $res;
            }
        } else {
            return $res;
        }
    }

?>