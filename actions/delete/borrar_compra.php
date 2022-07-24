<?php include_once('../../config/connection_db.php')?>
<?php include_once('../../models/shopping.php')?>
<?php

$classDataBase = new classConnection_mysql;
$db = $classDataBase->connection(); 

$classShopping = new classShopping($db);

$id = $_GET['id'];
$obj_compra = $classShopping->search_one($id);
print_r($obj_compra);

if (isset($_POST['borrarCompra']))    
{      
    if ($classShopping->delete($id)) 
    {   
        $error = "Compra realizada por <b><i>" . $nombre . "</i></b> eliminada exitosamente!!";
        header('Location: ../../producto.php?error='.urldecode($error));
    }else {
        $error = "no se pudo eliminar la compra";
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
        <h3>Eliminar Compra</h3>
            
       
        <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del cliente</label>
                    <input type="text" class="form-control" id="nombre" name = "nombre" placeholder="ingrese el nombre" value="<?php echo $obj_compra->nombre?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="producto" class="form-label">Producto comprado</label>
                    <input type="text" class="form-control" id="producto" name = "producto" placeholder="ingrese el nombre del producto" value="<?php echo $obj_compra->producto?>" readonly>
                </div>


                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de producto</label>
                    <input class="form-select" id="tipo" name = "tipo_producto" aria-label="Default select example" value="<?php echo $obj_compra->tipo_producto?>" readonly>
                       
                </div>

                <div class="mb-3">
                    <label for="codigo" class="form-label">Codigo de compra</label>
                    <input type="number" name = "codigo_compra" class="form-control" id="codigo" placeholder="ingrese el cod. de compra" value="<?php echo $obj_compra->codigo_compra?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor de la compra</label>
                    <input type="text" class="form-control" id="valor" name = "total" placeholder="ingrese el valor de la factura" value="<?php echo $obj_compra->total?>" readonly>
                </div>

                <div class="mb-3">
                    <button type="submit" name="borrarCompra" class="btn btn-danger"><i class="bi bi-person-bounding-box"></i>Borrar Compra</button>
                    <a  href="../../compras.php" class="btn btn-success"><i class="bi bi-person-bounding-box"></i>Cancelar</a>
                </div>
            
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