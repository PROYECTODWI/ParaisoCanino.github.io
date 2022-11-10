<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Productos</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    
    <div class="insert-prod">
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
                </ul>
            </div>
    </div>
    
    <div class="container-insert">
        <!-- <div class="title-insert">
            <h1>Agregar Productos</h1>
        </div>
        <form action="../php/agregarProductos.php" method="post" class="form-insert">
            <input type="text" placeholder="Nombre del producto" name="nombreProd">
            <input type="text" placeholder="Precio" name="precioProd">
            <input type="text" placeholder="Descripción" name="descriProd">
            <input type="number" placeholder="Cantidad" name="cantidadProd">
            <input type="text" placeholder="Categoria" name="cateProd"><br></br>
            <button>Agregar</button>
        </form> -->
        
        <div class="title-insert">
            <h1>Lista de Usuarios</h1>
        </div>

        <div class="container">
			<table class="table table-dark table-hover">
				<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Apellidos</td>
				<td>Correo</td>
				<td>Telefono</td>
				<td></td>
               
               				
				</tr>
				<?php
                include '../php/conexion_db.php';
				$sql="SELECT * FROM usuario";
				$resultado=mysqli_query($conexion,$sql);
				while($mostrar=mysqli_fetch_array($resultado)){
				?>
				<tr>
				<td> <?php echo $mostrar['id']?></td>
				<td><?php echo $mostrar['nombre_usu']?></td>
				<td><?php echo $mostrar['apellidos_usu']?></td>
				<td><?php echo $mostrar['correo_usu']?></td>
				<td><?php echo $mostrar['telef_usu']?></td>
                <td>
					<form method="POST" action="../php/eliminarUsu.php">
                    
                          <button class="btn btn-danger">Eliminar</button>
						</form>	
                </td>
				
				</tr>
				<?php
				}
				?>
			</table>
			
        </div>

    </div>


    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>