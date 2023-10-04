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
      /*Es para que el bode sea negro */
      .table-bordered {
        border-color: black;
      }
      /*Es para el texto del formulario*/
      .container{
          text-align: left; /* Alinea el texto a la izquierda */
          font-weight: bold; /* Hace que el texto sea negrito */
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
            <a class="nav-link fw-bold py-1 px-3" href="../Productos/index.php">Productos</a>
            <a class="nav-link fw-bold py-1 px-3" href="../cerrar_sesion.php">Salir</a>
          </nav>
        </div>
      </header>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../../images/fliyers/2.png" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
        </div>
      </div>
      <div class="container" id="main">
        <div class="row">
          <div class="col-md-12">
            <fieldset>
              <?php
                require '../../vendor/autoload.php';
                $id = $_GET['ID'];
                $pedido = new bompzz\Pedido;
                $resultado = $pedido->Mostrar_id($id);
                $resultadoDetalles = $pedido->Mostrar_detalle($id);
              ?>
              <legend>Informacion de la Compra</legend>
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" value="<?php print $resultado['CLIENTE'] ?>" readonly>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="<?php print $resultado['CORREO'] ?>" readonly>
              </div>
              <div class="form-group">
                <label>Fecha</label>
                <input type="text" class="form-control" value="<?php print $resultado['FECHA'] ?>" readonly>
              </div>
              <hr>Productos Comprados</hr>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Articulo</th>
                    <th>Foto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $cantidad = count($resultadoDetalles);
                    if ($cantidad > 0) {
                      $c = 0;
                      for ($x = 0; $x < $cantidad; $x++) {
                        $c++;
                        $item = $resultadoDetalles[$x];
                        $total = $item['PRECIO'] * $item['CANTIDAD'];
                  ?>
                  <tr>
                    <td><?php print $c ?></td>
                    <td><?php print $item['TITULO'] ?></td>
                    <td>
                      <?php
                          $foto = '../../upload/' . $item['FOTO'];
                          if (file_exists($foto)) {
                      ?>
                      <img src="<?php print $foto; ?>" width="35">
                          <?php } else { ?>
                            IMAGEN NO DISPONIBLE
                          <?php } ?>
                    </td>
                    <td>$<?php print $item['PRECIO'] ?>MXN</td>
                    <td><?php print $item['CANTIDAD'] ?></td>
                    <td>$<?php print $total ?>MXN</td>
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
              <div class="col-md-3">
                <div class="form-group">
                  <label>Total Compra</label>
                  <input type="text" class="form-control" value="$<?php print $resultado['TOTAL'] ?> MXN" readonly>
                </div>
              </div>
            </fieldset>
            <div class="pull-left">
              <a href="../dashboard.php" class="btn btn-success hidden-print">Cancelar</a>
              <a href="javascript: ;" id="btnImprimir" class="btn btn-danger hidden-print">Imprimir</a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script>
      $('#btnImprimir').on('click', function() {
        window.print();
        return false;
      })
    </script>
  </body>
</html>