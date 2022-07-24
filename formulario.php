<?php include_once('config/connection_db.php')?>
<?php include_once('models/formulary.php')?>

<?php

$classDataBase = new classConnection_mysql;
$db = $classDataBase->connection(); 

$classFormulary = new classFormulary($db);

//insertar producto 

if (isset($_POST['enviar']))    
{   
    //declacion de variables
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];
    echo $nombre;
    
    if ($classFormulary->insert($nombre, $email, $telefono, $mensaje)) 
    {   
        $mensaje = "Mensaje enviado por <b><i>" . $nombre . "</i></b> creado con exitosamente!!";
        header('Location: formulario.php?mensaje=' .urldecode($mensaje));
    }else {
        $error = "no se pudo crear la compra";
    }
}

?>
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
                    <?php if (isset($_GET['mensaje'])) : ?>
                    <!-- mensaje --> 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $_GET['mensaje'];?></strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif ?>
                    <!-- error --> 
                    <?php if (isset($_GET['error'])) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $_GET['error']; ?></strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <!-- end error -->
                        <section id="seccionformulario" class="bg-ligth p-2 border border-dark">
                            <h2 class="text-center">GESTION DE CONTACTO</h2>
                            <form method="POST">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre">               
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email" id="descripcion" placeholder="Ingrese el email">               
                            </div>
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Telefono:</label>
                                <input type="text" class="form-control" name="telefono" id="cantidad" placeholder="Ingrese el telefono">               
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Mensaje:</label>
                                <textarea type="text" class="form-control" name="mensaje" id="tipo" placeholder="Ingrese el mensaje" rows="3"></textarea>            
                            </div>
                            
                                <button type="submit" name="enviar" class="btn btn-primary w-20"><i class="bi bi-person-bounding-box"></i> Enviar</button>
                                <a  href="home.php" class="btn btn-danger"><i class="bi bi-person-bounding-box"></i>Cancelar</a>
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