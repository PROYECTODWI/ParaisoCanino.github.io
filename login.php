<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <main class="main-login">

        <div class="container_all">
            <div class="box_trasera">
                <div class="box_trasera-login">
                    <h3>¿Tienes una cuenta?</h3>
                    <p>Inicia Sesión para acceder a nuestra web</p>
                    <button id="btn_iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="box_trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate y se parte de nosotros</p>
                    <button id="btn_registrarse">Registrarse</button>
                </div>
            </div>
            <div class="container_login-register">
                <form action="php/login_usuario.php" method="post" class="formulario_login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo Electrónico" name="email">
                    <input type="password" placeholder="Contraseña" name="pass">
                    <button>Entrar</button>
                </form>
                <form action="php/registrar_users.php" method="post" class="formulario_register">
                    <h2>Regístrate</h2>
                    <input type="text" placeholder="Nombres" name="nombres">
                    <input type="text" placeholder="Apellidos" name="apellidos">
                    <input type="email" placeholder="Correo Electrónico" name="email">
                    <input type="password" placeholder="Contraseña" name="pass">
                    <input type="text" placeholder="Celular" name="celular">
                    <button>Registrarse</button>
                </form>
            </div>
        </div>

    </main>

    <script src="dist/js/script.js"></script>
</body>
</html>