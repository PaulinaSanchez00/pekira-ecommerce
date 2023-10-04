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
            /*Tamaño de los botones de paypal */
            .btn-lg-width {
                width: 700px; /* Ajusta el ancho según tus necesidades */
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
                    <div class="container" id="main">
                        <div class="main-form d-flex justify-content-center align-items-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <br><br><br><br>
                                    <div id="paypal-button-container" class="btn-lg-width"></div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /container -->
                </div>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>        
            <script src="https://www.paypal.com/sdk/js?client-id=AeH3-xOJ99oTHEpGpRaYZyLS9xPyvuKfFQluwn0FroR8vvdp-kxvqQCka3QtXjllpFmuDe33uZnpoNCS&currency=MXN"></script>
            <script>
                paypal.Buttons({
                    style:{
                        color: 'blue',
                        shape: 'pill',
                        label: 'pay'
                    },
                    createOrder: function(data, actions){
                        return actions.order.create({
                            purchase_units:[{
                                amount:{
                                    value: <?php print  Total();  ?>
                                }
                            }]
                        });
                    },
                    onCancel: function(data){
                        alert("Pago Cancelado")
                        console.log(data);
                    },
                    onApprove: function(data,actions){
                    let URL = 'completar_pedido.php'
                        actions.order.capture().then(function(detalles){
                            console.log(detalles);
                            window.location.href = 'pago.php'
                        });
                    }
                }).render('#paypal-button-container')
            </script>
        </div>
    </body>
</html>