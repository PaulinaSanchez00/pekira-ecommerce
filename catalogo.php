<!-- Correguido -->
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
      /*Es para la linea*/
      .nav-link.active:after {
        content: "";/*Es para que aparezca la linea*/
        display: block;/*Es para poner una linea*/
        border-bottom: 3px solid black; /*Es para que la linea sea negra*/
        margin-top: 2px; /*Es para que la linea este mas abajo*/
      } 
      /*Es para que el menu este en medio*/
      .custom-header {
        margin-left: 350px;
        margin-right: 350px;
      }
      /* Modifica que este centrada la descripcion y el tamaño de la letra de Peppa */
      .lead {
        margin: 0 40px; /* Agrega margen a los lados */
        font-size: 28px; /* Ajusta el tamaño de fuente según tus necesidades */
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
            <a class="nav-link fw-bold py-1 px-3 active" href="#">Catalogo</a>
            <a class="nav-link fw-bold py-1 px-3" href="carrito.php">Carrito <span id="num_cart" class="badge bg-secondary"><?php print CantidadProd()?></span></a>
          </nav>
        </div>
      </header>
      <main>
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item">
              <img src="images/fliyers/1.png" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
            </div>
            <div class="carousel-item active">
              <img src="images/fliyers/2.png" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
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
        <br>
        <div class="container">
          <h1 class="mb-4">C A T A L O G O</h1> <!-- Modificado el valor de margin-bottom -->
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
            <?php
              require 'vendor/autoload.php';
              $productos = new bompzz\producto;
              $info_prod = $productos->Mostrar();
              $cantidad = count($info_prod);
              if ($cantidad > 0) {
                for ($x = 0; $x < $cantidad; $x++) {
                  $item = $info_prod[$x];
            ?>
            <div class="col">
              <div class="card shadow-sm">
                <?php
                  $imagen = 'upload/' . $item['FOTO'];
                  if (!file_exists($imagen)) {
                    $imagen = "assets/imagenes/not-found";
                  } 
                ?>        
                <img src="<?php echo $imagen; ?>" class="d-block w-100">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $item['TITULO']; ?></h5>
                  <p class="card-text"><?php echo number_format($item['PRECIO'], 2, '.', ','); ?><p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="carrito.php?ID=<?php print $item['ID'] ?>" class="btn btn-primary btn-block"><samp class="glyphicon glyphicon-shopping-cart"> </samp> Agregar</a>
                    </div>
                  <div>
                    <a href="details.php?ID=<?php print $item['ID'] ?>" class="btn btn-warning">Detalles</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php } ?>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-lg-4">
            <img src="images/recursos/sombre.png" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
            <h2 class="fw-normal">Disfraces</h2>
            <p style="font-size: 20px; line-height: 2;">Transforma tu apariencia con nuestros divertidos y originales disfraces temáticos.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img src="images/recursos/plato.png" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
            <h2 class="fw-normal">Cubiertos</h2>
            <p style="font-size: 20px; line-height: 2;">Eleva la diversión en la mesa con cubiertos de tus personajes favoritos.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img src="images/recursos/mascar.png" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
            <h2 class="fw-normal">Mascaras</h2>
            <p style="font-size: 20px; line-height: 2;">"Despierta tu imaginación con nuestras máscaras, el complemento perfecto para aventuras."</p>
          </div><!-- /.col-lg-4 -->
        </div>
        
    </div>
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
        <br><br>
        <div class="row featurette">
          <h1 class="mb-4">Artículos festivos para celebraciones inolvidables.</h1> <!-- Modificado el valor de margin-bottom -->
          <div class="col-md-7 text-center my-auto">
            <h2 class="featurette-heading fw-normal lh-1">Variedad en Cajas <span class="text-body-secondary"> Dulceras </span></h2>
            <br><p class="lead">Endulza cualquier ocasión con nuestras Cajas para Dulces de Personajes Animados! Estas encantadoras cajas temáticas, protagonizadas por tus personajes favoritos, no solo mantienen tus golosinas frescas, sino que también añaden un toque mágico y divertido a tu celebración. Perfectas para fiestas infantiles, eventos temáticos o simplemente para alegrar el día, estas cajas son un regalo perfecto que hará sonreír a todos. Deja que la magia de los personajes animados acompañe cada bocado de dulzura.</p>
          </div>
          <div class="col-md-5">
            <img src="images/solos/caja.png" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text></svg>
          </div>
        </div>
        <br><br>
        <div class="row featurette">
          <div class="col-md-7 order-md-2 text-center my-auto">
            <h2 class="featurette-heading fw-normal lh-1">Variedad de Vasos <span class="text-body-secondary"> con Personajes </span></h2>
            <br><p class="lead">¡Celebra con alegría y color con nuestros Vasos de Fiesta con Personajes Animados! Estos vasos temáticos, decorados con tus personajes favoritos, elevan cualquier ocasión a una experiencia mágica y divertida. Ideales para fiestas infantiles y eventos temáticos, estos vasos hacen que cada sorbo sea una celebración inolvidable. Agrega un toque de diversión animada a tu próxima fiesta con estos vasos encantadores que harán sonreír a grandes y pequeños por igual.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img src="images/solos/vasos.png" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text></svg>
          </div>
        </div>
        <br><br>
        <div class="row featurette">
          <div class="col-md-7 text-center my-auto">
            <h2 class="featurette-heading fw-normal lh-1">Variedad de Platos <span class="text-body-secondary"> de 23x23 cm</span></h2>
            <br><p class="lead">¡Dale un toque de diversión y magia a tu fiesta con nuestros Platos con Personajes Animados! Estos platos temáticos, adornados con tus personajes favoritos, hacen que cada comida sea una experiencia encantadora. Perfectos para fiestas infantiles y eventos temáticos, estos platos añaden un toque especial a la mesa y hacen que la comida sea aún más deliciosa. Celebra con estilo y alegría gracias a estos platos que harán sonreír a todos los invitados.</p>
          </div>
          <div class="col-md-5">
            <img src="images/solos/pla.png" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text></svg>
          </div>
        </div>
        <br>
      </main>
      <footer class="mt-auto text-black-50">
        <p>Av. Insurgentes #290E Col. Flamingos <a href="https://www.facebook.com/profile.php?id=61550710805333&mibextid=ZbWKwL" class="text-black">Pekita</a>.</p>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
