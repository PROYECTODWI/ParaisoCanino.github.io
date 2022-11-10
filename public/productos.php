<?php 

    require '../config/conexion_db.php';
    require '../config/config.php';

    $db = new Database();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT id_prod, nombre_prod, precio_prod FROM productos");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header class="header-prod">
        <div class="header-container">
            <nav class="menu">
                <a href="index.php">
                <img src="../img/logo.png" alt="logo" class="logo">
            </a>
            </nav>
            <div class="list-menu">
                <ul class="list-ul">
                    <li class="list-li"><a href="home.html" class="link-menu">Inicio</a></li>
                    <li class="list-li"><a href="productos.php" class="link-menu">Tienda</a></li>
                    <li class="list-li"><a href="servicios.html" class="link-menu">Servicios</a></li>
                    <li class="list-li"><a href="historia.html" class="link-menu">Historia</a></li>
                    <li class="list-li"><a href="/login.php" class="link-menu">Log-in</a>
                        <i class="bi bi-person"></i>
                    </li>
                    <li class="list-li"><a href="#" class="link-menu"><i class="bi bi-cart3"></i></a></li>
                </ul>
            </div>
        </div>
    </header>
    
<!-- Tienda Canina -->
    <div class="container" id="shop">
        <h1 class="title-2">SHOP CANINO</h1>
        <?php foreach ($resultado as $row) { ?>
            
            <div class="target">
                <div class="img-target">
                    <?php 
                        $id = $row['id_prod'];
                        $imagen = "../img/" . $id . "/principal.png";

                        if (!file_exists($imagen)) {
                             $imagen = "../img/no-photo.png";
                        }
                    ?>
                    <img src="<?php echo $imagen; ?>" alt="" class="product">
                </div>
                <div class="description-target">
                    <p class="text-description"><?php echo $row['nombre_prod']; ?></p>
                </div>
                <p class="precio">$ <?php echo number_format($row['precio_prod'], 2, '.', ','); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="details.php?id_prod=<?php echo $row['id_prod']; ?>&token=<?php echo hash_hmac('sha1', $row['id_prod'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                    </div>
                        <a href="" class="btn btn-success">Agregar</a>
                </div>
            </div>
        <?php } ?>
    </div>

</body>
</html>