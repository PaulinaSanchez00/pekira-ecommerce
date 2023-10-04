<?php
session_start();
require 'Funciones.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pekita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        /*Modifica el cuerpo*/
        body {
            background-image: url('images/recursos/fondo2.png');/*Es para elegir el fondo*/  
        }
        /*Es para el menu*/
        .center-content {
            display: flex;/*Es para que este hasta arriba*/
            flex-direction: column;/*Es para que este en linea*/
            height: 92vh;/*Es para que el pie este hasta abajo*/
            margin: 20px;/*le da el margen*/
            
        }
        /*Es para que el body este en medio*/
        .custom-main {
            margin-top: 100px;
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
        /*Es para que reaccione el boton*/
        .btn-custom:hover {
            background-color: white;
            color: black;
        }
        /*Es para que le letra de pekita sea mas grande*/
        .custom-main h1 {
            font-size: 70px;
        }
        /*Es para que el boton sea como es */
        .btn-custom {
            background-color: black;
            color: white;
        }
        /*Es para que el parrafo la letra sea mas grande */
        .custom-main .lead {
            font-size: 35px; 
    margin: 0 350px; /* Agregar margen a los lados (izquierda y derecha) */

        }
        /*Es para que el menu esta en medio */
        .custom-header {
            margin-left: 350px;
            margin-right: 371px;
        }
    </style>
</head>
<body class="text-center text-black">
    <div class="center-content">
        <header class="custom-header">
            <div>
                <h3 class="float-md-start mb-0">Pekita</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-1 px-3 active" aria-current="page" href="index.php">Inicio</a>
                    <a class="nav-link fw-bold py-1 px-3" href="catalogo.php">Catalogo</a>
                    <a class="nav-link fw-bold py-1 px-3" href="carrito.php">Carrito <span id="num_cart" class="badge bg-secondary"><?php print CantidadProd()?></span></a>
                </nav>
            </div>
        </header>
        <main class="mx-auto custom-main">
            <h1 class="mb-4">PEKITA</h1> <!-- Modificado el valor de margin-bottom -->
            <p class="lead">¡Bienvenidos a la tienda donde cada celebración cobra vida! 🎉🌟 Encuentra todo lo que necesitas para convertir momentos en recuerdos inolvidables. ¡Dale vida a tu fiesta con nuestra increíble variedad de artículos y accesorios para fiestas! 🎈🎁</p>
            <p class="lead"><br>
                <a href="catalogo.php" class="btn btn-lg btn-custom fw-bold">CATALOGO</a>
            </p>
        </main>
        <footer class="mt-auto text-black-50">
            <p>Av. Insurgentes #290E Col. Flamingos <a href="https://www.facebook.com/profile.php?id=61550710805333&mibextid=ZbWKwL" class="text-black">Pekita</a>.</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
