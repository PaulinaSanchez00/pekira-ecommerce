<!-- Correguido -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pekita</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            /*Modifica el cuerpo*/
            body {
                background-image: url('../images/recursos/fondo2.png');/*Es para elegir el fondo*/  
            }
            /*Es para el menu*/
            .center-content {
                display: flex;/*Es para que este hasta arriba*/
                flex-direction: column;/*Es para que este en linea*/
                height: 92vh;/*Es para que el pie este hasta abajo*/
                margin: 20px;/*le da el margen*/   
            }
            /*Es para que el menu sea negro*/
            .nav-link {
                color: black !important;
            }
            /*Es para la linea*/
            .nav-link.active:after {
                content: "";/*Es para que aparezca la linea*/
                display: block;/*Es para poner una linea*/
                border-bottom: 3px solid black; /*Es para que la linea sea negra*/
                margin-top: 2px; /*Es para que la linea este mas abajo*/
            }
            /*Es para que el menu esta en medio */
            .custom-header {
                margin-left: 350px;
                margin-right: 371px;
            }
            .login-container {
                max-width: 400px; /* Ancho máximo del contenedor */
                margin: 0 auto; /* Centrar horizontalmente el contenedor */
                background-color: white; /* Fondo blanco para el formulario */
                padding: 20px; /* Espaciado interior */
                border: 1px solid #ddd; /* Borde del contenedor */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra del contenedor */
                border-radius: 5px; /* Borde redondeado */
            }
            /* Estilos para el formulario de inicio de sesión */
            .login-form {
                text-align: center; /* Texto centrado en el formulario */
            }
        </style>
    </head>
    <body class="text-center text-black">
        <div class="center-content">
            <header class="custom-header">
                <div>
                    <h3 class="float-md-start mb-0">Pekita</h3>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link fw-bold py-1 px-3" aria-current="page" href="../index.php">Pagina</a>
                        <a class="nav-link fw-bold py-1 px-3" href="../catalogo.php">Catalogo</a>
                        <a class="nav-link fw-bold py-1 px-3 active" href="index.php">Login</a>
                    </nav>
                </div>
            </header>
            <div class="container" id="main">
                <div class="login-container">
                    <form action="login.php" method="post" class="login-form">
                        <h3 class="mb-3">ACCESO AL SISTEMA</h3>
                        <div class="form-group">
                            <label for="nombre_usuario">Usuario</label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="clave">Password</label>
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                    </form>
                </div>
            </div> <!-- /container -->
            <footer class="mt-auto text-black-50">
                <p>Av. Insurgentes #290E Col. Flamingos <a href="https://www.facebook.com/profile.php?id=61550710805333&mibextid=ZbWKwL" class="text-black">Pekita</a>.</p>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
