<!-- Correguido -->
<?php
  session_start();
  if (!isset($_SESSION['usuario_info']) or empty($_SESSION['usuario_info'])) {
    header('Location: ../index.php');
  }
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
        background-image: url('../../images/recursos/fondo.png');/*Es para elegir el fondo*/  
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
      .table-bordered {
        border-color: black;
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
          <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-bold py-1 px-3" aria-current="page" href="../dashboard.php">Pedidos</a>
            <a class="nav-link fw-bold py-1 px-3 active" href="../Productos/index.php">Productos</a>
            <a class="nav-link fw-bold py-1 px-3" href="../cerrar_sesion.php">Salir</a>
          </nav>
        </div>
      </header>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../../images/fliyers/2.png" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
          </div>
        </div>
      </div>
      <div class="container" id="main">
        <div class="row">
          <div class="col-md-12">
            <div class="pull-right">
              <a href="form_registro.php" class=" btn btn-primary">+ Agregar</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <fieldset>
              <legend>Listado de Productos</legend>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>precio</th>
                    <th class="text-center">Foto</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    require '../../vendor/autoload.php';
                    $productos = new bompzz\producto;
                    $info_prod = $productos->Mostrar();

                    $cantidad = count($info_prod);
                    if ($cantidad > 0) {
                      $c = 0;
                      for ($x = 0; $x < $cantidad; $x++) {
                        $c++;
                        $item = $info_prod[$x];
                  ?>
                  <tr>
                    <td><?php print $c ?></td>
                    <td><?php print $item['TITULO'] ?></td>
                    <td><?php print $item['CATEGORIA'] ?></td>
                    <td>$<?php print $item['PRECIO'] ?></td>
                    <td class="text-center">
                      <?php
                        $foto = '../../upload/' . $item['FOTO'];
                        if (file_exists($foto)) {
                      ?>
                      <img src="<?php print $foto; ?>" width="50">
                      <?php } else { ?>
                      IMAGEN NO DISPONIBLE
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <a href="../acciones.php?ID=<?php print $item['ID'] ?>" class="btn btn-danger btn-sm">Eliminar</span></a>
                      <a href="form_actualizar.php?ID=<?php print $item['ID'] ?>" class="btn btn-success btn-sm">Actualizar</a>
                    </td>
                  </tr>
                  <?php
                    }
                    } else {
                  ?>
                  <tr>
                    <td colspan="6">NO HAY REGISTROS</td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </fieldset>
          </div>
        </div>
      </div>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
  </body>
</html>