<?php 

session_start();

include '../Utils/conexion.php';

       
            
            // Verifique si el usuario ya ha iniciado sesión, si es así, rediríjalo a la página de bienvenida
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                header("location: ../Vistas/mostrarCarrito.php");
                exit;
              }

              require_once '../Utils/config.php';
            
            
        // Definir variables e inicializar con valores vacíos
        $username = $password = "";
        $username_err = $password_err = "";

        // Procesando los datos del formulario cuando se envía el formulario
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Comprueba si el nombre de usuario está vacío
            if(empty(trim($_POST["username"]))){
                $username_err = "Por favor ingrese su usuario.";
            } else{
                $username = trim($_POST["username"]);
            }

            
            // Comprueba si la contraseña está vacía
            if(empty(trim($_POST["password"]))){
                $password_err = "Por favor ingrese su contraseña.";
            } else{
                $password = trim($_POST["password"]);
            }

            
            // Validar credenciales
            if(empty($username_err) && empty($password_err)){
                
               // Preparar una declaración de selección
               $sql = "SELECT id, username, password FROM users WHERE username = ?";

                if($stmt = mysqli_prepare($link, $sql)){
                   // Vincular variables a la declaración preparada como parámetros
                   mysqli_stmt_bind_param($stmt, "s", $param_username);

                   // Establecer parámetros
                   $param_username = $username;

                   // Intente ejecutar la declaración preparada
                   if(mysqli_stmt_execute($stmt)){
                       // Almacenar resultado
                       mysqli_stmt_store_result($stmt);

                       // Verifique si existe el nombre de usuario, si es así, verifique la contraseña
                       if(mysqli_stmt_num_rows($stmt) == 1){
                           
                           // Vincular variables de resultado
                           mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                           if(mysqli_stmt_fetch($stmt)){

                            if(password_verify($password, $hashed_password)){

                                
                                // La contraseña es correcta, así que inicie una nueva sesión
                                session_start();

                                // Almacenar datos en variables de sesión
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                // Redirigir a la usuario a la página
                                header("location: ../Vistas/mostrarCarrito.php");

                            } else{
                                
                                // Muestra un mensaje de error si la contraseña no es válida
                                $password_err = "La contraseña que has ingresado no es válida.";

                            }

                           }

                       } else {
                           // Muestra un mensaje de error si el nombre de usuario no existe
                           $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                       }

                   } else {
                      echo "Algo salió mal, por favor vuelve a intentarlo.";
                   }

                }

                mysqli_stmt_close($stmt);

            }

            // Close connection
                mysqli_close($link);


        }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/icono.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>OVERALL</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body style="background: url(../img/decarga2.png) no-repeat center center fixed;">
    

        <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <div class="col-12 user-img">
                        <img src="../img/imgEnca/photo5006105819296671891.png" class="rounded-circle" alt="">
                    </div>
                    <form class="col-12" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" accept-charset="utf-8">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" id="username-group">
                            <input class="form-control" type="text" name="username" placeholder="Nombre de usuario" value="<?php echo $username; ?>" >
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" id="password-group">
                            <input class="form-control" type="password" name="password" placeholder="Contraseña">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-secondary"><i class="fas fa-sign-in-alt"></i>  Ingresar</button>
                        </div>
                        <div class="col-12 forgot">
                        <a href="#">Olvide mi contraseña</a>
                    </div>
                    <p style="color: blue;">¿No tienes una cuenta? <a href="register.php">Regístrate</a>.</p>
                    </form>
                </div>
            </div>
        </div>

<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    

<!--<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script> -->
</body>

</html>
