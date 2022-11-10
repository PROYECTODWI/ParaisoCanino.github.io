<?php

    define("KEY_TOKEN", "CDCT.mcm=99*");
    define("MONEDA", "S/");

    session_start();

    $num_car = 0;
    if(isset($_SESSION['carrito']['productos'])){
        $num_car = count($_SESSION['carrito']['productos']);
    }
?>