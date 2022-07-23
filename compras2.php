<?php include_once('config/connection_db.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <title>Document</title>

</head>

<body onload="cargardatos ()">

    <?php include 'includes/header.php' ?>

    <br>
    <section>
    <div class="container">
        <h1 class="text-center">Aqui podras registrar todas las compradas realizadas!!</h1>
        <section id="seccionformulario" class="bg-ligth p-2 border border-dark d-none">
            <h2 class="text-center">GESTION DE COMPRAS</h2>
    
        </section>
        <section>
            <input type="button" class="btn btn-light" id="btnAgregar" value="Agregar compra">
        </section>
        <div>
            <div class="container">
                <br>
                <div class="row center">
                    <h5 class="text-center ">Ver todas nuestras compras realizadas</h5>
                </div>
                <div class="row center">
                    <button id="btnCargar" type="button" class="btn btn-info">Ver compras</button>

                </div>
                <br><br>
            </div>
        </div>

        <div class="container">
            <div class="section">
                <!-- Icon Section -->
                <div class="row">
                    <div class="col">
                        <div id="app" class="row pt-5">
                        </div>
                        <script src="js/compras.js"></script>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </section>

 <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><img
                            src="img/facebook.png" width="30" height="30" alt=""></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><img src="img/twitter.png"
                            width="30" height="30" alt=""></a>


                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                        <img src="img/Instagram.png" width="30" height="30" alt=""></i></a>
                </section>
            </div>


            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Copyright
                <h6>DISTRIBUIDORAPANELA</h6>
            </div> <!-- Copyright -->
                </footer>
</body>

</html>