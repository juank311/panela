<?php include_once('../../config/connection_db.php')?>
<?php include_once('../../models/shopping.php')?>
<?php

$classDataBase = new classConnection_mysql;
$db = $classDataBase->connection(); 

$classShopping = new classShopping($db);

//insertar producto 

if (isset($_POST['crearCompra']))    
{   
    //declacion de variables
    $nombre = $_POST['nombre'];
    $producto = $_POST['producto'];
    $tipo_producto = $_POST['tipo_producto'];
    $codigo_compra = $_POST['codigo_compra'];
    $total = $_POST['total'];
    $PRODUCTOS_id = 1;

    if ($classShopping->insert($nombre, $producto, $tipo_producto, $codigo_compra, $total, $PRODUCTOS_id)) 
    {   
        $mensaje = "Compra realizada por <b><i>" . $nombre . "</i></b> creada exitosamente!!";
        header('Location: ../../compras.php?mensaje=' .urldecode($mensaje));
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title> Proyecto </title>
</head>

<body>

<!-- header lvl -->
<?php include '../../includes/header_lvl.php'?>
    <section>
               
    </div>
    <div class="row">
        <div class="col-sm-6 offset-3">
        <br />
        <h3>Insertar Nueva Compra</h3>
            
       
        <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del cliente</label>
                    <input type="text" class="form-control" id="nombre" name = "nombre" placeholder="ingrese el nombre">
                </div>

                <div class="mb-3">
                    <label for="producto" class="form-label">Producto comprado</label>
                    <input type="text" class="form-control" id="producto" name = "producto" placeholder="ingrese el nombre del producto">
                </div>


                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de producto</label>
                    <select class="form-select" id="tipo" name = "tipo_producto" aria-label="Default select example">
                        <option selected>--Escoga el tipo de producto--</option>
                        <option value="1">Suministro</option>
                        <option value="2">Herramienta</option>
                        <option value="3">Material</option>
                        <option value="4">Insumos</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="codigo" class="form-label">Codigo de compra</label>
                    <input type="number" name = "codigo_compra" class="form-control" id="codigo" placeholder="ingrese el cod. de compra">
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor de la compra</label>
                    <input type="text" class="form-control" id="valor" name = "total" placeholder="ingrese el valor de la factura">
                </div>

                <div class="mb-3">
                    <button type="submit" name="crearCompra" class="btn btn-primary w-20"><i class="bi bi-person-bounding-box"></i>Registrar Compra</button>
                    <a  href="../../compras.php" class="btn btn-danger"><i class="bi bi-person-bounding-box"></i>Cancelar</a>
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