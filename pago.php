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
      /*Es para el completa los ... */
      legend {
        font-size: 50px; /* Ajusta el tamaño de la letra según tus preferencias */
        font-weight: bold; /* Hace que el texto sea negrito */
      }
      /*Es para el texto del formulario*/
      .container{
        text-align: left; /* Alinea el texto a la izquierda */
      }
    </style>

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
          <div class="container">
            <fieldset>
              <legend style="text-align: center;">Completa los datos</legend>
              <form action="completar_pedido.php" method="POST">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" class="form-control" name="apellidos" required>
                </div>
                <div class="form-group">
                  <label>Correo</label>
                  <input type="email" class="form-control" name="correo" required>
                </div>
                <div class="form-group">
                  <label>Teléfono</label>
                  <input type="text" maxlength="11" class="form-control" name="telefono" required autocomplete="off" onkeypress="return (event.charCode >=48 && event.charCode <= 57)" min="1">
                </div>
                <div class="form-group">
                  <label>Comentario</label>
                  <textarea name="comentario" class="form-control" rows="4"></textarea>
                </div>
                <button class="btn btn-primary btn-block">Enviar</button>
              </form>
            </fieldset>
          </div>
        </main>
      </div>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>