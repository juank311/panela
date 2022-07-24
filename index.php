<?php include_once('config/connection_db.php')?>

<?php

$classDataBase = new classConnection_mysql;
$db = $classDataBase->connection(); 

//se actva el validador de la sesion
session_start();

//se verifica si la sesion esta activa por medio de empty, entonces:

if (!empty($_SESSION['activo'])) {
    header('Location:panel.php');
}
//condicionar presion del boton registrar 
if (isset($_POST['log_in'])) 
{
  $email = $_POST['email'];
  $pass =  md5($_POST['password']);
  
    //verificar si hay datos seteados en los input de entrada de login
    if (!empty($_POST['email']) && $_POST['email'] != "" && !empty($_POST['password']) && $_POST['password'] != "") 
    {
        //ejecucion de la consulta 
        $query_search_email = "SELECT * FROM usuarios WHERE usuario = :email";
        $stmt_search_email = $db->prepare($query_search_email);
        $stmt_search_email->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt_search_email->execute();
        $email_verification = $stmt_search_email->fetch(PDO::FETCH_OBJ);
        // print_r($email_verification);
        //print_r( $email_verification->password);
            if ($email_verification) 
            {
                if ($pass == $email_verification->contrasena)
                {
                    $_SESSION['activo']= true;
                    $_SESSION['data_employee']=$email_verification;
                    header('Location:home.php');
                } else{
                $error = "La Contraseña es incorrecta";
                }
            } else {
            $error = "El correo es invalido";
            }
    } else {
        $error = "Existen campos vacios"; }
    
}else {
        if (!isset($_POST['acceder'])) {
            $mensaje = "Por favor ingrese usuario y contraseña";
        }else {
            $error = "Existen campos vacios por aca ";
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
    <title>Inicio sesión</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                     <?php if (isset($mensaje)) : ?>
                    <!-- mensaje --> 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $mensaje;?></strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif ?>
                    <!-- error --> 
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $error; ?></strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <!-- end error -->
                    <form id="login-form" class="form" action="" method="POST">
                        <h3 class="text-center text-info">Acceso</h3>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Ingresa el email">
                            <div class="input-group-append">
                            
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="password" class="form-control" type="password" name="password" placeholder="Ingresa el password">
                            <div class="input-group-append">
                                
                            </div>
                            </div>
                            <div class="row">
                            
                            <!-- /.col -->
                            <div class="col-sm-12">
                            <button type="submit" name="log_in" class="btn btn-primary d-block w-100"><i class="fas fa-user"></i> Ingresar</button>
                        </div>
                            <!-- /.col -->
                            </div>
                            <a href="" style="text-decoration: none;" class="text-info">Registrar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
