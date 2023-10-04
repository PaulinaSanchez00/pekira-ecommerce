<?php
session_start();
require 'Funciones.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOMPZZ</title>

    <link href=<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    
<header>
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <strong>BOMPZZ</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">MENÚ</a>
                        </li>
                        <li class="nav-item">
                            <a href="contacto.php" class="nav-link active">NOSOTROS</a>
                        </li>
                    </ul>
                    <a href="carrito.php" class="btn btn-primary">
                        MI ORDEN <span id="num_cart" class="badge bg-secondary"><?php print CantidadProd()?></span>
                    </a>
                </div>
            </div>
        </div>
        </header>
    <main>
        <center>
        <div class="menu body">
            <div class=""><br></br>
                <b><p>¿Quiénes somos?</p></b>
                Somos un pizzeria ofreciendo las mas exquisitas pizza hasta tu paladar
                <br>exquisites y calidad.</br>
                <b><p>Zona Dorada</p></b>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.244119616733!2d-106.44154198518063!3d23.23420207286471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1407af0147bbc0e7%3A0x403e1ae534974a3f!2sUniversidad%20Aut%C3%B3noma%20de%20Occidente!5e0!3m2!1ses!2smx!4v1653410170265!5m2!1ses!2smx" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
        </div>
        </center>
    </main>


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