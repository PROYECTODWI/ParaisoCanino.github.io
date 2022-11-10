<?php

    include 'conexion_db.php';

    if (!isset($_SESSION)) {
        session_start();
   }
   //Recibir los datos ingresados en el formulario
       $varUsuario= $_POST['email'];
       $varContrasena= $_POST['pass'];
   //Consultar si los datos son están guardados en la base de datos
       $consulta= "SELECT * FROM usuario WHERE correo_usu='$varUsuario' AND pass_usu='$varContrasena'"; 
       $resultado= mysqli_query($conexion,$consulta);
       $fila=mysqli_fetch_array($resultado);

    //Logearse como Administrador
        if($_POST['email']="admin" && $_POST['pass']="admin"){
            header("Location: ../config/admin.php");
        }

       if (!$fila[0]) {
           //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
           echo '<script language = javascript>
                   alert("Usuario o Password errados, por favor verifique.")
                   self.location = "../login.php"
                   </script>';
       }else{
        //opcion2: Usuario logueado correctamente
        //Definimos las variables de sesión y redirigimos a la página de usuario
        $_SESSION['varCODIGO'] = $fila['id'];
        $_SESSION['varNOMBRES'] = $fila['nombre_usu'];
        header("Location: ../index.php");
        }
?>