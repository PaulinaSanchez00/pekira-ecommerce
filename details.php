<!-- Correguido -->
<?php
session_start();
require 'vendor/autoload.php';
require 'Funciones.php';
if (isset($_GET['ID']) && is_numeric($_GET['ID'])) {
  $id = $_GET['ID'];
  $productos = new bompzz\producto;
  $result_prod = $productos->Mostrar_id($id);

  if (!$result_prod)
    header('Location: index.php');
} else {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEKITA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">

    <style>
        body {
          background-image: url('images/recursos/fondo.png');
        }
        /*Menu */
        .center-content {
            display: flex;/*Es para que funcione */
            flex-direction: column;/*Es para que sea una linea */
            margin: 20px;
        }
        /*Para que el menu sea negro */
        .nav-link {
            color: black !important;
        }
        /*Mantiene el menu en el centro */
        .custom-header {
            margin-left: 350px;
            margin-right: 350px;
        }
        /* Agrega margen a la descripción */
        .content-container {
            margin: 0 20px; /* Márgenes de 20px a los lados */
        }
        /* Estilo para nombre y precio */
        h2.no-center {
            text-align: left; /* Alinea el texto a la izquierda */
            font-size: 40px; /* Ajusta el tamaño de fuente según tus necesidades */
        }
        /* Estilo para la letra */
        p.letra {
            font-size: 30px;
            text-align: left; /* Alinea el texto a la izquierda */
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
                    <a class="nav-link fw-bold py-1 px-3 active" href="catalogo.php">Catalogo</a>
                    <a class="nav-link fw-bold py-1 px-3" href="carrito.php">Carrito <span id="num_cart" class="badge bg-secondary"><?php print CantidadProd()?></span></a>
                </nav>
            </div>
        </header>
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item">
        <img src="images/fliyers/8.png" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
      </div>
      <div class="carousel-item active">
        <img src="images/fliyers/7.png" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
      </div>
      <div class="carousel-item">
        <img src="images/fliyers/3.png" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        <?php

                            $imagen = 'upload/' . $result_prod['FOTO'];
                            if (!file_exists($imagen)) {
                            $imagen = "assets/imagenes/not-found";
                            } 
                            ?>
                            <div class="carousel-item active">
                                <img src="<?php echo $imagen; ?>" class="d-block w-100">
                            </div>
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
                <div class="content-container">
                            <br><br><br>
                            <h2 class="no-center"><?php echo $result_prod['TITULO'];?></h2>
                            <h2 class="no-center">Precio: $<?php echo number_format($result_prod['PRECIO'], 2, '.', ','); ?></h2>
                            <p class="letra">
                                <?php echo $result_prod['DESCRIPCION']; ?>
                            </p>  
                            <div class="d-grid gap-3 col-10 mx-auto">
                              <div class="btn-group">
                                  <a href="carrito.php?ID=<?php print $result_prod['ID'] ?>" class="btn btn-success btn-block mb-2"><span class="glyphicon glyphicon-shopping-cart"> </span> Agregar</a>
                              </div>
                            </div>
                        </div>
                </div>
            </div> 
        </div> 

        <br>
<br>
        <div class="row">
      <div class="col-lg-4">
        <img src="images/recursos/sombre.png" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
        <h2 class="fw-normal">Disfraces</h2>
        <p style="font-size: 20px; line-height: 2;">Transforma tu apariencia con nuestros divertidos y originales disfraces temáticos.</p>
        <p><a class="btn btn-primary" href="catalogo.php">Ver Catalogo</a></p>
    </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="images/recursos/plato.png" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
        <h2 class="fw-normal">Cubiertos</h2>
        <p style="font-size: 20px; line-height: 2;">Eleva la diversión en la mesa con cubiertos de tus personajes favoritos.</p>
        <p><a class="btn btn-primary" href="catalogo.php">Ver Catalogo</a></p>
    </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="images/recursos/mascar.png" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
        <h2 class="fw-normal">Mascaras</h2>
        <p style="font-size: 20px; line-height: 2;">"Despierta tu imaginación con nuestras máscaras, el complemento perfecto para aventuras."</p>
        <p><a class="btn btn-primary" href="catalogo.php">Ver Catalogo</a></p>
    </div><!-- /.col-lg-4 -->
    </div>
    <br>
    </main>

    <footer class="mt-auto text-black-50">
            <p>Av. Insurgentes #290E Col. Flamingos <a href="https://www.facebook.com/profile.php?id=61550710805333&mibextid=ZbWKwL" class="text-black">Pekita</a>.</p>
        </footer>

    <!-- Option 1: Bootstrap Bunble with Popper -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script>
        function addProducto(id, token){
            let url = 'clases/carrito.php'
            let formData = new FormData()
            formData.append('id', id)
            formData.append('token', token)

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if(data.ok){
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
        }
    </script>
</body>
</html>