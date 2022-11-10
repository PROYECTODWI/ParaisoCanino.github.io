<?php

    include 'conexion_db.php';

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $celular = $_POST['celular'];
    //Encriptar contraseña
    // $pass = hash('sha512', $pass);

    //Consulta para agregar usuarios a la base de datos
    $query = "INSERT INTO usuario(nombre_usu, apellidos_usu, correo_usu, pass_usu, telef_usu) 
                VALUES('$nombres', '$apellidos', '$email', '$pass', '$celular')";

    //Verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo_usu='$email'");

    if (mysqli_num_rows($verificar_correo)) {
        echo '
            <script>
                alert("Este correo ya está registrado, intente con uno diferente");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }


    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario registrado");
                window.location = "../login.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Error al registrar, inténtelo nuevamente");
                window.location = "../login.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>