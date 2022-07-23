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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>

</head>

<body>

    <?php include 'includes/header.php' ?>

    <br>

    <section id="hero">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Formulario de contacto - DISTRIBUIDORA PANELA</h1>
                    <div class="container p-3 mt-3">
                        <section id="seccionformulario" class="bg-ligth p-2 border border-dark">
                            <h2 class="text-center">GESTION DE CONTACTO</h2>
                            <form action="#">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input id="nombre" class="form-control" type="text">

                                <label for="correo" class="form-label">Correo electronico</label>
                                <input id="correo" class="form-control" type="mail">

                                <label for="telefono" class="form-label">Telefono</label>
                                <input id="telefono" class="form-control" type="number">

                                <div class="mb-3">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                    <textarea class="form-control" id="mensaje" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <input type="button" class="btn btn-primary" id="btnGuardar" value="Enviar">
                                </div>
                            </form>
                        </section>
                    </div>
    </section>
    <script src="js/formulario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.m
in.js" integrity="sha384-
MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><img src="img/facebook.png" width="30" height="30" alt=""></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><img src="img/twitter.png" width="30" height="30" alt=""></a>


                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                    <img src="img/Instagram.png" width="30" height="30" alt=""></i></a>
            </section>
        </div>

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright
            <h6>DISTRIBUIDORAPANELA</h6>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>