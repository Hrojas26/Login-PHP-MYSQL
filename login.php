<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  


  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /php-login");
    } else {
      $message = 'Datos erroneos, o no esta registrado';
    }
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stylePHP.css">
</head>
<body>
    <?php require 'header/header.php'?>

    <div class="contenedorPadre">
        <div class="contenedorHijo">

        <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

            
            <h1>INICIAR SESION</h1>


                
            <div class="login">
                <form action="login.php" method="post">
                    <input type="text" name="email"  placeholder="Email">
                    <input type="password" name="password" placeholder="Contraseña">
                    
                    <div class="boton">
                        <input class="bt1" type="submit" value="INGRESAR">
                    </div>
                </form>
            </div>
                
        </div>

    </div>
    <span class="ya"> ¿no estas registrado? </span>
    <a class="or" href="signup.php"> Registrate </a>
</body>
</html>