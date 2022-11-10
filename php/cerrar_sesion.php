<?php

    session_start();

    if ($_SESSION['varNOMBRES']){	
        session_destroy();
        echo '
            <script language = javascript>
                alert("su sesion ha terminado correctamente")
                self.location = "../public/home.html";
            </script>';
    } else{
        echo '
            <script language = javascript>
                alert("No ha iniciado ninguna sesión, por favor regístrese")
                self.location = "../login.php";
            </script>';
    }

?>