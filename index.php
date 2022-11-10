<?php 
    require 'config/config.php';
    include 'php/conexion_db.php';

    // session_start();//Iniciar Sesión
	if (!$_SESSION){//Validar si se está ingresando con sesión correctamente
	echo '<script language = javascript> 
	alert("usuario no autenticado")
		  self.location = "login.php";  
		  </script>';		  }
	$varCodigo = $_SESSION['varCODIGO'];
	$consulta= "SELECT apellidos_usu,nombre_usu FROM usuario WHERE id='$varCodigo'"; 
	$resultado= mysqli_query($conexion,$consulta);
	$fila=mysqli_fetch_array($resultado);
		$varApellidos = $fila['apellidos_usu'];
		$varNom = $fila['nombre_usu'];		
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
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="header">
        <div class="header-container">
            <nav class="menu">
                <a href="index.php">
                <img src="img/logo.png" alt="logo" class="logo">
            </a>
            </nav>
            <div class="list-menu">
                <ul class="list-ul">
                    <li class="list-li"><a href="index.php" class="link-menu">Inicio</a></li>
                    <li class="list-li"><a href="productos.php" class="link-menu">Tienda</a></li>
                    <li class="list-li"><a href="servicios.html" class="link-menu">Servicios</a></li>
                    <li class="list-li"><a href="#" class="link-menu">Historia</a></li>
                    <li class="list-li"><a href="php/cerrar_sesion.php" class="link-menu">Salir</a>
                        <i class="bi bi-box-arrow-right"></i>
                    </li>
                    <li class="list-li">
                        <a href="checkout.php" class="link-menu">
                            <i class="bi bi-cart3"></i>
                            <span id="num_car" class="badge bg-secondary"><?php echo $num_car; ?></span>
                        </a>
                    </li>
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
                <p class="text-description">Comidas para Perros</p>
            </div>
            <!-- <p class="precio">S/ 00.00</p> -->
            <input class="btn btn-success" type="button" value="Ver más">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/dogchow.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Comidas para Gatos</p>
            </div>
            <!-- <p class="precio">S/ 00.00</p> -->
            <input class="btn btn-success" type="button" value="Ver más">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/ricocan.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Ropas y Camas</p>
            </div>
            <!-- <p class="precio">S/ 00.00</p> -->
            <input class="btn btn-success" type="button" value="Ver más">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/pedigree.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Accesorios y más</p>
            </div>
            <!-- <p class="precio">S/ 00.00</p> -->
            <input class="btn btn-success" type="button" value="Ver más">
        </div>
        <!-- <div class="target">
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
        </div> -->
    </div>
    <!-- Servicios -->
    <div class="container">
        <h1 class="title-2">SERVICIOS</h1>
        <div class="target">
            <div class="img-target">
                <img src="img/proplan.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Médico para perros</p>
            </div>
            <!-- <p class="precio">S/ 00.00</p> -->
            <input class="btn btn-success" type="button" value="Ver más">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/dogchow.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Médicos para Gatos</p>
            </div>
            <!-- <p class="precio">S/ 00.00</p> -->
            <input class="btn btn-success" type="button" value="Ver más">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/ricocan.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Baño y Corte de pelo</p>
            </div>
            <!-- <p class="precio">S/ 00.00</p> -->
            <input class="btn btn-success" type="button" value="Ver más">
        </div>
        <div class="target">
            <div class="img-target">
                <img src="img/pedigree.png" alt="" class="product">
            </div>
            <div class="description-target">
                <p class="text-description">Operaciones</p>
            </div>
            <!-- <p class="precio">S/ 00.00</p> -->
            <input class="btn btn-success" type="button" value="Ver más">
        </div>
    </div>

    <footer class="footer">
    <div class="container">
            <p>Página diseñada por @Grupo1 del curso Desarrollo Web Integrado 1</p>
        </div>
    </footer>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>