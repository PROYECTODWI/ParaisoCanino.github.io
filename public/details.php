<?php

    require '../config/config.php';
    require '../config/conexion_db.php';

    $db = new Database();
    $con = $db->conectar();

    $id = isset($_GET['id_prod']) ? $_GET['id_prod'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if ($id == '' || $token == '') {
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

        if ($token == $token_tmp){

            $sql = $con->prepare("SELECT count(id_prod) FROM productos WHERE id_prod=?");
            $sql->execute([$id]);
            if ($sql->fetchColumn() > 0) {
                
                $sql = $con->prepare("SELECT nombre_prod, descrip_prod, precio_prod FROM productos WHERE id_prod=? LIMIT 1");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                $nombre = $row['nombre_prod'];
                $descripcion = $row['descrip_prod'];
                $precio = $row['precio_prod'];

                $dir_images = '../img/'. $id . '/';

                $rutaImg = $dir_images . 'principal.png';

                If(!file_exists($rutaImg)){
                    $rutaImg = '../img/no-photo.png';
                }

                $imagenes = array();

                if(file_exists($dir_images)){
                $dir = dir($dir_images);

                while (($archivo = $dir->read()) != false){
                    if ($archivo != 'principal.png' && (strpos($archivo, 'png') || strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))){
                        $imagenes[] = $dir_images . $archivo;
                    }
                }
                $dir->close();
                }
            }
        }else {
            echo 'Error al procesar la petición';
            exit;
        }
    }

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
                    <li class="list-li"><a href="#" class="link-menu">Servicios</a></li>
                    <li class="list-li"><a href="#" class="link-menu">Historia</a></li>
                    <li class="list-li"><a href="../login.php" class="link-menu">Log-in</a>
                        <i class="bi bi-person"></i>
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
    </header>
    
<!-- Tienda Canina -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-1">


                    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo $rutaImg; ?>" class="d-block w-100" alt="">
                            </div>

                            <?php foreach ($imagenes as $img) { ?>
                                <div class="carousel-item">
                                    <img src="<?php echo $img; ?>" class="d-block w-100" alt="">
                                </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 order-md-2">
                    <h2><?php echo $nombre; ?></h2>
                    <h2><?php echo MONEDA . number_format($precio, 2, '.',','); ?></h2>
                    <p class="lead">
                        <?php echo $descripcion; ?>
                    </p>
                    <div class="d-grid gap-3 col-10 mx-auto">
                        <button class="btn btn-primary" type="button">Comprar ahora</button>
                        <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">Agregar al Carrito</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script>
        function addProducto(id, token){
            let url = 'carrito.php';
            let formData = new FormData();
            formData.append('id_prod', id);
            formData.append('token', token);

            fetch(url,{
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if(data.ok){
                    let elemento = document.getElementById("num_car")
                    elemento.innerHTML = data.numero
                }
            })

        }
    </script>

</body>
</html>