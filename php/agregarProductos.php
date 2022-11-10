<?php

    include 'conexion_db.php';

    $nombre = $_POST['nombreProd'];
    $precio = $_POST['precioProd'];
    $decrip = $_POST['descriProd'];
    $cantidad = $_POST['cantidadProd'];
    $categoria = $_POST['cateProd'];

    $query = "INSERT INTO productos(nombre_prod,precio_prod,descrip_prod,cantidad_prod,id_cate) 
                VALUES ('$nombre','$precio','$decrip','$cantidad','$categoria')";

    $resultado = mysqli_query($conexion, $query);

    if($resultado){
        echo '
            <script>
                alert("Producto agregado con éxito");
                window.location = "../config/insertarProd.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No se pudo registrar");
                window.location = "../config/insertarProd.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>