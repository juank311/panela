<?php include_once('../../config/connection_db.php')?>
<?php include_once('../../models/products.php')?>
<?php

$classDataBase = new classConnection_mysql;
$db = $classDataBase->connection(); 

$classProductos = new classProducts($db);

//insertar producto 

if (isset($_POST['crearArticulo']))    
{   
    //declacion de variables
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $USUARIOS_ID = 2;

    if ($classProductos->insert($nombre, $descripcion, $cantidad, $tipo, $valor, $USUARIOS_ID)) 
    {   
        $mensaje = "Producto <b><i>" . $nombre . "</i></b> agregado exitosamente!!";
        header('Location: ../../producto.php?mensaje=' .urldecode($mensaje));
    }else {
        $error = "no se pudo crear el producto";
    }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title> Proyecto </title>
</head>

<body>

<header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e79edd;">
            <div class="container-fluid">
                <img src="../../img/logo-png.png" width="60" height="60" alt="">
                <a class="navbar-brand" href="#">DistriPanela</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../../home.php">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../producto.php">Producto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../clientes.php">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../compras.php">Compras</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../formulario.php">Formulario</a>
                        </li>

                        
                    </ul>
                </div>
            </div>
        </nav>
    </header> 

    <section>
               
    </div>
    <div class="row">
        <div class="col-sm-6 offset-3">
        <br />
        <h3>Agregar un Producto</h3>
            
       
        <form method="POST" action="">
        
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre">               
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese el nombre">               
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese el nombre">               
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo:</label>
                <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Ingrese el nombre">               
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" class="form-control" name="valor" id="valor" placeholder="Ingrese el nombre">               
            </div>

            <br />
            <button type="submit" name="crearArticulo" class="btn btn-primary w-20"><i class="bi bi-person-bounding-box"></i> Crear Nuevo Artículo</button>
            <a  href="../../producto.php" class="btn btn-danger"><i class="bi bi-person-bounding-box"></i>Cancelar</a>
        </form>
        </div>
    </div>
            </section>
        </div>

        <script src="js/proyecto.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.m
in.js" integrity="sha384-
MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </section>

    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><img src="../../img/facebook.png"
                        width="30" height="30" alt=""></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><img src="../../img/twitter.png"
                        width="30" height="30" alt=""></a>


                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                    <img src="../../img/Instagram.png" width="30" height="30" alt=""></i></a>
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