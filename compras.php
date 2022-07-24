<?php include_once('config/connection_db.php')?>
<?php include_once('models/shopping.php')?>
<?php

$classDataBase = new classConnection_mysql;
$db = $classDataBase->connection(); 

$classShopping = new classShopping($db);

$obj_customer = $classShopping->search();
//print_r($obj_customer);
  
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

    <?php include 'includes/header.php' ?>  

    <section>
        <div class="container">
            <section id="seccionModificar" class="bg-ligth p-2 border border-dark d-none">
            </section>
            <section id="seccionformulario" class="bg-ligth p-2 border border-dark d-none">
                <h2 class="text-center">Agregar un producto</h2>
               
                <form method="POST" action="">
        
                <form action="#">
                    <div class="mb-3">
                        <label for="producto" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control" id="producto" placeholder="Ingrese el nombre">
                    </div>

                    <div class="mb-3">
                        <label for="descripción" class="form-label">Descripción del producto</label>
                        <textarea class="form-control" id="descripcion"
                            placeholder="Ingrese la descripción del producto" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad(gr)</label>
                        <input type="number" class="form-control" id="cantidad"
                            placeholder="Ingrese la cantidad en gramos">
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo (bloque / granulada)</label>
                        <input type="text" class="form-control" id="tipo" placeholder="Ingrese el tipo">
                    </div>

                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor del producto</label>
                        <input type="number" class="form-control" id="valor" placeholder="Ingrese el valor">
                    </div>

                    <div class="mb-3">
                        <input type="button" class="btn btn-primary"  value="Guardar" name= "save">
                        <input type="button" class="btn btn-primary"  value="Cancelar" name= "null">
                    </div>
                </form>
            </section>

            <section id="datos">
                <h2 class="text-center">Aquí Podras Ver Todas las Compras Realizadas</h2>
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
                <a href="actions/insert/insertar_compra.php" class="btn btn-primary"><i class="bi bi-x-circle-fill"></i>Agregar Nueva Compra</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre Cliente</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Tipo Producto</th>
                            <th scope="col">Codigo de Compra</th>
                            <th scope="col">Valor Total</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                  <?php foreach ($obj_customer as $row) : ?>
                    <tr>

                      <td><?php echo $row->id; ?></td>
                      <td><?php echo $row->nombre; ?></td>
                      <td><?php echo $row->producto; ?></td>
                      <td><?php echo $row->tipo_producto; ?></td>
                      <td><?php echo $row->codigo_compra; ?></td>
                      <td><?php echo $row->total; ?></td>
                      
                      <td>
                        <a href="actions/edit/ver_factura.php?id=<?php echo $row->id;?>" class="btn btn-warning"><i class="bi bi-pencil-fill"></i>Ver Factura</a>
                        <a href="actions/delete/borrar_compra.php?id=<?php echo $row->id;?>" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i>Borrar</a>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                </tbody>

                    <tbody>
                    </tbody>
                </table>
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