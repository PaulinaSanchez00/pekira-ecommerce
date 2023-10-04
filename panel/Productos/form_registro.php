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
      /* Modifica que este centrada la descripcion y el tamaño de la letra de Peppa */
      .lead {
        margin: 0 40px; /* Agrega margen a los lados */
        font-size: 28px; /* Ajusta el tamaño de fuente según tus necesidades */
      }
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
              <legend>Datos del Producto</legend>
              <form method="POST" action="../acciones.php" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Titulo</label>
                      <input type="text" class="form-control" name="titulo" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Descripcion</label>
                      <textarea class="form-control" name="descripcion" cols="3" required></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Categorias</label>
                      <select class="form-control" name="categoria_id" required>
                        <option value="">--SELECCIONE--</option>
                        <?php
                          require '../../vendor/autoload.php';
                          $categorias = new bompzz\Categoria;
                          $info_cat = $categorias->Mostrar();
                          $cantidad = count($info_cat);
                          for ($x = 0; $x < $cantidad; $x++) {
                            $item = $info_cat[$x];
                        ?>
                        <option value="<?php print $item['ID'] ?>"><?php print $item['CATEGORIA'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" class="form-control" name="foto" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Precio</label>
                      <input type="text" class="form-control" name="precio" placeholder="0.00" required>
                    </div>
                  </div>
                </div>
                <input type="submit" name="accion" class="btn btn-primary" value="Registrar"></button>
                <a href="index.php" class=" btn btn-default">Cancelar</a>
              </form>
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
    </div>
  </body>
</html>