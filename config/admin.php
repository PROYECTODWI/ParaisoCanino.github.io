<?php 
    require 'config.php';
    require '../php/conexion_db.php';

   /*
	if ($_SESSION){//Validar si se está ingresando con sesión correctamente
	    session_start();//Iniciar Sesión
    }	*/	
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paraiso Canino</title>
    <!-- Link Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Fredoka+One&family=Fuzzy+Bubbles:wght@400;700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header class="header">
        <div class="header-container">
            <nav class="menu">
                <a href="index.html">
                <img src="../img/logo.png" alt="logo" class="logo">
            </a>
            </nav>
            <div class="list-menu">
                <ul class="list-ul">
                    <li class="list-li"><a href="admin.php" class="link-menu">Inicio</a></li>
                    <li class="list-li"><a href="insertarProd.php" class="link-menu">Productos</a></li>
                    <li class="list-li"><a href="#" class="link-menu">Servicios</a></li>
                    <li class="list-li"><a href="#" class="link-menu">Historia</a></li>
                    <li class="list-li"><a href="usuarios.php" class="link-menu">Usuarios</a></li>
                    <li class="list-li"><a href="../php/cerrar_sesion.php" class="link-menu">Salir</a>
                        <i class="bi bi-person"></i>
                    </li>
                    <!-- <li class="list-li"><a href="#" class="link-menu"><i class="bi bi-cart3"></i></a></li> -->
                </ul>
            </div>
        </div>
        <div class="portada">
            <div class="content-portada">
                <h1 class="title">Paraiso Canino</h1>
                <p class="subtitle">
                    La mejor atención que su mascota necesita
                </p>
                <div class="button-portada">
                <a href="https://www.facebook.com/profile.php?id=100057459219714" class="btn btn-primary" target="_blank">Síguenos</a>
                    <a href="#shop" class="more scrolly btn btn-light">Vamos!</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Tienda Canina -->
    <div class="container" id="shop">
        <h1 class="title-2">SHOP CANINO</h1>
        <div class="target">
            <div class="img-target">
                <img src="img/proplan.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Proplan</p>
            </div>
            <p class="precio">S/ 00.00</p>
            <input class="btn btn-success" type="button" value="Comprar">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/dogchow.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Dog Chow</p>
            </div>
            <p class="precio">S/ 00.00</p>
            <input class="btn btn-success" type="button" value="Comprar">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/ricocan.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Ricocan</p>
            </div>
            <p class="precio">S/ 00.00</p>
            <input class="btn btn-success" type="button" value="Comprar">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/pedigree.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Pedigree</p>
            </div>
            <p class="precio">S/ 00.00</p>
            <input class="btn btn-success" type="button" value="Comprar">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/whiskas.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Whiskas</p>
            </div>
            <p class="precio">S/ 00.00</p>
            <input class="btn btn-success" type="button" value="Comprar">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/catchow.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Cat Chow</p>
            </div>
            <p class="precio">S/ 00.00</p>
            <input class="btn btn-success" type="button" value="Comprar">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/ricocat.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Rico Cat</p>
            </div>
            <p class="precio">S/ 00.00</p>
            <input class="btn btn-success" type="button" value="Comprar">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/Supercat.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Super Cat</p>
            </div>
            <p class="precio">S/ 00.00</p>
            <input class="btn btn-success" type="button" value="Comprar">
        </div>
    </div>
    <!-- Servicios -->
    <div class="container">
        <h1 class="title-2">SERVICIOS</h1>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>