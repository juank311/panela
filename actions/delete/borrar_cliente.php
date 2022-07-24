<?php include_once('../../config/connection_db.php')?>
<?php include_once('../../models/customers.php')?>
<?php

$classDataBase = new classConnection_mysql;
$db = $classDataBase->connection(); 

$classCustomers = new classCustomers($db);

$id = $_GET['id'];
$obj_cliente = $classCustomers->search_one($id);
//print_r($obj_cliente);

if (isset($_POST['borrarCliente']))    
{   
    
    if ($classCustomers->delete($id)) 
    {   
        $error = "Cliente <b><i>" . $nombre . "</i></b> eliminado exitosamente!!";
        header('Location: ../../clientes.php?error='.urldecode($error));
    }else {
        $error = "no se pudo eliminar el cliente";
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
        <h3>Eliminar Cliente</h3>
            
        <!-- error --> 
        <?php if (isset($error)) : ?>
            <h6 class="bg-danger text-white"><?php echo $error; ?></h6>
        <?php endif ?>
        <!-- end error -->
        <form method="POST" action="">
        
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="" value="<?php echo $obj_cliente->nombre?>" readonly>               
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" class="form-control" name="telefono" id="" value="<?php echo $obj_cliente->telefono?>"readonly>               
            </div>
            <div class="mb-3">
                <label for="documento" class="form-label">Documento de Identidad:</label>
                <input type="text" class="form-control" name="documento" id="" value="<?php echo $obj_cliente->documento?>"readonly>               
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electronico:</label>
                <input type="text" class="form-control" name="correo" id="" value="<?php echo $obj_cliente->correo?>"readonly>               
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" class="form-control" name="direccion" id="" value="<?php echo $obj_cliente->direccion?>"readonly>               
            </div>


            
            <br />
            <button type="submit" name="borrarCliente" class="btn btn-danger"><i class="bi bi-person-bounding-box"></i> Borrar Cliente</button>
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