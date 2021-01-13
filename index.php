<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: vista_presentaciones.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT usuario_id, username, password FROM usuarios WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: vista_presentaciones.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña introducida no es válida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No existe este nombre de usuario";
                }
            } else{
                echo "Oops! Algo salió mal, por favor intenta de nuevo.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Convoy Of Hope</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">

        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">

    </head>

    <body>

      <div class="container-login">
        <div class="wrap-login">
            <img src="image/convoy-of-hope-logo.png" class="img-rounded" alt="Cinque Terre">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                 <div class="wrap-input100 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <span class="login-form-title"></span>
                <br>
                <br>
                    <input class="input100" id="usuario" type="text" name="username" placeholder="Usuario" value="<?php echo $username; ?>">
                    <span class="focus-efecto"></span>
                    <span class="help-block"><?php echo $username_err; ?>
                      </span>
                      </div>
                 <div class="wrap-input100 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input class="input100" id="password" type="password" name="password" placeholder="Contraseña">
                    <span class="focus-efecto"></span>
                    <span class="help-block"><?php echo $password_err; ?></span>
            </div>

                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn" value="Login">Iniciar sesión</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


     <script src="jquery/jquery-3.3.1.min.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="popper/popper.min.js"></script>

     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
     <script src="codigo.js"></script>
    </body>
</html>
