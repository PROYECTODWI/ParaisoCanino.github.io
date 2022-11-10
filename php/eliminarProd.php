<?php

    include 'conexion_db.php';

    $id = $_GET['id_prod'];
    
    $query = "DELETE FROM productos WHERE id_prod='$id'";

    $ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
        echo '
            <script>
                alert("Producto eliminado con éxito");
                window.location = "../config/insertarProd.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Error al elimnar producto");
                window.location = "../config/insertarProd.php";
            </script>
        ';
    }

?>