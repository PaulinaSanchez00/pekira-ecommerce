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
          background-image: url('images/recursos/fondo.png');/*Es para elegir el fondo*/  
        }
      /*Es para el menu*/
      .center-content {
        display: flex;/*Es para que este hasta arriba*/
        flex-direction: column;/*Es para que este en linea*/
        margin: 20px; /*Es para que no salga la barra de abajo*/
        }
        /*Es para que el menu sea negro*/
        .nav-link {
            color: black !important;
        }
        /*Es para que el menu este en medio*/
        .custom-header {
            margin-left: 350px;
            margin-right: 371px;
        }
        .jumbotron{
            font-size: 50px; /* Ajusta el tamaño de fuente según tus necesidades */
        }
    </style>
</head>
<body class="text-center text-black">
    <div class="center-content">
        <header class="custom-header">
            <div>
                <h3 class="float-md-start mb-0">Pekita</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-1 px-3" aria-current="page" href="index.php">Inicio</a>
                    <a class="nav-link fw-bold py-1 px-3" href="catalogo.php">Catalogo</a>
                    <a class="nav-link fw-bold py-1 px-3" href="carrito.php">Carrito <span id="num_cart" class="badge bg-secondary"><?php print CantidadProd()?></span></a>
                </nav>
            </div>
        </header>
<main>
  <div class="container" id="main">
    <div class="row">
      <div class="jumbotron">
        <p>Gracias por su compra</p>
        <p>
          <a href="catalogo.php" class="btn btn-success">Regresar</a>
        </p>
      </div>
    </div>
  </div>
</main>

<br>

    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
      <div class="carousel-item">
        <img src="images/fliyers/fli.png" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
      </div>
      <div class="carousel-item active">
        <img src="images/fliyers/fliye.png" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
      </div>
      <div class="carousel-item">
        <img src="images/fliyers/fliy.png" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
      </div>
    </div>
</div>


  </div> <!-- /container -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>