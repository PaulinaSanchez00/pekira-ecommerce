<!-- Correguido -->
<?php
session_start();
require 'funciones.php';
if (isset($_GET['ID']) && is_numeric($_GET['ID'])) {
  $id = $_GET['ID'];
  require 'vendor/autoload.php';
  $producto = new bompzz\producto;
  $resultado = $producto->Mostrar_id($id);


  if (!$resultado) {
    header('Location: index.php');
  }

  if (isset($_SESSION['carrito'])) { //si existe carrito
    // si existe producto en carrito
    if (array_key_exists($id, $_SESSION['carrito'])) {
      update($id);
      // si no existe producto en el carrito
    } else {
      Add($resultado, $id);
    }
  } else { // si no existe carrito
    Add($resultado, $id);
  }
}
  require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEKITA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        margin-right: 371px;
      }
      /*Es para la linea*/
      .nav-link.active:after {
        content: "";/*Es para que aparezca la linea*/
        display: block;/*Es para poner una linea*/
        border-bottom: 3px solid black; /*Es para que la linea sea negra*/
        margin-top: 2px; /*Es para que la linea este mas abajo*/
      } 
    </style>
  </head>
<body class="text-center text-black">
  <div class="center-content">
    <header class="custom-header">
      <div>
        <h3 class="float-md-start mb-0">Pekita</h3>
        <nav class="nav nav-masthead float-md-end">
          <a class="nav-link fw-bold py-1 px-3" aria-current="page" href="index.php">Inicio</a>
          <a class="nav-link fw-bold py-1 px-3" href="catalogo.php">Catalogo</a>
          <a class="nav-link fw-bold py-1 px-3 active" href="carrito.php">Carrito <span id="num_cart" class="badge bg-secondary"><?php print CantidadProd()?></span></a>
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
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Producto</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th></th>
          </tr>
        </thead>
        <br>
        <tbody>
          <?php
          if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            $c = 0;
            foreach ($_SESSION['carrito'] as $indice => $value) {
              $total = $value['PRECIO'] * $value['CANTIDAD'];
              $c++;
          ?>
          <tr>
            <form action="actualizar_carrito.php" method="post">
              <td><?php print $c ?></td>
              <td><?php print $value['TITULO'] ?></td>
              <td>
                <?php
                  $foto = 'upload/' . $value['FOTO'];
                  if (file_exists($foto)) {
                ?>
                <center><img src="<?php print $foto; ?>" width="35" height="35"></center>
                <?php } else { ?>
                <center><img src="assets/imagenes/not-found" width="35" height="35"></center>
                <?php } ?>
              </td>
              <td><?php print $value['PRECIO'] ?>MXN</td>
              <td>
                <input type="hidden" size="1" name="id" value="<?php print $value['ID'] ?>">
                <input type="text" size="1" name="cantidad" class="form-control u-size-100" value="<?php print $value['CANTIDAD'] ?>">
              </td>
              <td><?php print $total ?>MXN</td>
              <td><button type="submit" class="btn btn-warning btn-xs">Actualizar</samp></button>
                <a href="Eliminar_carrito.php?ID=<?php print $value['ID'] ?>" class="btn btn-outline-dark btn-xs">Eliminar</samp></a>
              </td>
            </form>
          </tr>
          <?php
            }
            } else {
          ?>
          <tr colspan="7">NO HAY PRODUCTOS SELECCIONADOS</tr>
          <?php }  ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5" class="text-right">Total</td>
            <td><?php print  Total();  ?>MXN</td>
            <td></td>
          </tr>
        </tfoot>
      </table>
      <hr>
      <?php
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
      ?>
      <div class="row">
        <div class="col-md-5 offset-md-7 d-grip gap-2">
          <a href="catalogo.php" class="btn btn-dark">Seguir Comprando</a>
          <a href="paypal.php" class="btn btn-dark">Realizar Pago</a>
        </div>
      </div>
      <?php
      }
      ?>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>