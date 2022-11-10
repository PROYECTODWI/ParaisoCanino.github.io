<?php

    include 'conexion_db.php';

    $id = $_GET['id'];
    
    $query = "DELETE FROM usuario WHERE id='$id'";

    $ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario eliminado con éxito");
                window.location = "../config/admin.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Error al elimnar usuario");
                window.location = "../config/usuarios.php";
            </script>
        ';
    }

?>