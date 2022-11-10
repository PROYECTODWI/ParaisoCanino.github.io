<?php 

    require 'config/conexion_db.php';
    require 'config/config.php';

    $db = new Database();
    $con = $db->conectar();

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    $lista_carrito = array();

    if ($productos != null) {
        foreach ($productos as $clave => $cantidad){
            $sql = $con->prepare("SELECT id_prod, nombre_prod, precio_prod, $cantidad as cantidad_prod FROM productos WHERE id_prod=?");
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }

    

    // session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/ParaisoCanino/css/styles.css">
</head>
<body>
    <header class="header-prod">
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
                    <li class="list-li"><a href="#" class="link-menu">Servicios</a></li>
                    <li class="list-li"><a href="#" class="link-menu">Historia</a></li>
                    <li class="list-li"><a href="php/cerrar_sesion.php" class="link-menu">Salir</a>
                        <i class="bi bi-box-arrow-right"></i>
                    </li>
                    <li class="list-li">
                        <a href="carrito.php" class="link-menu">
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
        
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($lista_carrito == null){
                            echo '<tr><td colspan="5" class="text-center"><b>Lista vacía</b></td></tr>';
                        }else {

                            $total = 0;
                            foreach($lista_carrito as $producto){
                                $_id = $producto['id_prod'];
                                $nombre = $producto['nombre_prod'];
                                $precio = $producto['precio_prod'];
                                $cantidad = $producto['cantidad_prod'];
                                $subtotal = $cantidad * $precio;
                                $total = $subtotal;
                    ?>

                        <tr>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo MONEDA . number_format($precio,2,'.',','); ?></td>
                            <td>
                                <input type="number" min="1" max="10" stop="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id ?>)">    
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                                    <?php echo MONEDA . number_format($subtotal,2,'.',','); ?>
                                </div>
                            </td>
                            <td>
                                <a id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a>
                            </td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                <p class="h3" id="total">
                                    <?php
                                         echo MONEDA . number_format($total, 2,'.',',');
                                    ?>
                                </p>
                            </td>
                        </tr>

                </tbody>
                <?php } ?>
            </table>
        </div>
        
        <div class="row">
            <div class="col-md-5 offset-md-7 d-grid gap-2">
                <button class="btn btn-primary btn-lg">Realizar pago</button>
            </div>
        </div>

    </div>
</main>

    <!-- Modal -->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="eliminaModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>


    <script>

        // let eliminaModal = document.getElementById('eliminaModal')


        function actualizaCantidad(cantidad, id){
            let url = 'actualizar_carrito.php';
            let formData = new FormData();
            formData.append('action', 'agregar');
            formData.append('id_prod', id);
            formData.append('cantidad_prod', cantidad);

            fetch(url,{
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if(data.ok){
                    let divsubtotal = document.getElementById("subtotal_" + id);
                    divsubtotal.innerHTML = data.sub;

                    let total = 0.00;
                    let list = document.getElementsByName(['subtotal[]'])

                    for (let i = 0; i < list.length; i++){
                        total += parseFloat(list[i].innerHTML.replace(/[S/,]/g, ''))
                    }

                    total = new Intl.NumberFormat('en-IN' , {
                        minimumFractionDigits: 2
                    }).format(total)
                    document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
                }
            })

        }
    </script>
    
</body>
</html>