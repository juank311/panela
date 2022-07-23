<?php include_once('config/connection_db.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .banner-image {
            background-image: url('img/banner.jpg');
            background-size: cover;
        }
    </style>
</head>

<body>
    
   <?php include 'includes/header.php' ?>

    <section>
        <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
            <div class="content text-center ">
                <h1 class="text-center text-dark">¡Bienvenido a DISTRIBUIDORAPANELA!</h1>
                <p class="text-dark">El mejor lugar donde podras adquirir <span style="color: #c5a038;">Panelas</span>
                    de calidad. <br> Nuestros productos son 100% naturales y de muy buena califdad</p>
            </div>
        </div>
    </section>
    <br>
    <section class="dark">
        <div class="container py-4">
            <h1 class="h1 text-center" id="pageHeaderTitle">Nuestros Servicios</h1>
            <div class="container">
                <div class="card-group">
                    <div class="card">
                        <img src="img/misión-visión-y-valores.jpg" class="card-img-top
        " width="350" height="250" walt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Mision</h5>
                            <p class="card-text">Fabricar la mejor panela de la región y así, garantizar un avance
                                exponencial en el bienestar de nuestros colaboradores y clientes consumidores, todo esto
                                regido por la búsqueda constante de la sostenibilidad ecológica y energética.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img src="img/MM_mision.jpg" class="card-img-top" width="350" height="250" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Vision</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                contentConquistar a las nuevas generaciones con la mejor Panela del mercado,
                                tecnificando y logrando la autosostenibilidad en nuestros procesos de fabricación y
                                distribución, retroalimentando a la región por su reconocimiento a la marca.
                            <p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img src="img/objetivos.jpg" class="card-img-top" width="350" height="250" alt="..." w>
                        <div class="card-body">
                            <h5 class="card-title">Objetivo</h5>
                            <p class="card-text">El principal objetivo de la empresa es brinar un buen servicio a la
                                region y afianzarse como un gran emprendimiento, aprovechando igual la fertilidad del
                                terreno para el cultivo de caña siendo este la base en cuanto a la materia prima para la
                                elaboracion de panelas.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
    </section>

    <section>
        <article class="mt-5">

            <div class="container">
                <h2 class="text-center">!Nuestra ubicacion!</h2>
                <div class="row mt-5">
                    <div class="col-md-8 d-flex align-self-center">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3466441977853!2d-75.56770338595253!3d6.34914372692889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442f31186ad687%3A0x7333ae1811b9d45e!2stienda%20online%20tatiana%20novoa!5e0!3m2!1ses!2sco!4v1655306184275!5m2!1ses!2sco"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-4">
                        <form class="vg-contact-form">
                            <div class="form-row">
                                <div class="col-12 mt-3 wow fadeInUp">
                                    <input class="form-control" type="text" name="Name" placeholder="Nombre">
                                </div>

                                <div class="row wow mt-3 fadeInUp">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Correo Electrónico">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Asunto">
                                    </div>

                                </div>
                                <div class="col-12 mt-3 wow fadeInUp">
                                    <textarea class="form-control" name="Message" rows="6"
                                        placeholder="Escriba aquí el mensaje.."></textarea>
                                </div>
                                <button type="submit" 
                                    class="btn  btn-dark mt-3 wow fadeInUp ml-1">Enviar</button>
                            </div>
                        </form>


                    </div>
                </div>
        </article>
    </section>
    <br>
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><img src="img/facebook.png"
                        width="30" height="30" alt=""></a>

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
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>