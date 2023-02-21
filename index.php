<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HKS</title>
    <link rel="stylesheet" href="css/stylePHP.css">

</head>
<body>
    <?php require 'header/header.php'?>

    <?php if(!empty($user)): ?>
      <br> BIENVENIDO. <?= $user['email']; ?>
      <br>ESTAS LOGEADO
      <a href="logout.php">
        CERRAR SESIÓN
      </a>
    <?php else: ?>

    

<div class="contenedorPadre">
    <div class="contenedorHijo"> 
        <h1>BIENVENIDO A HKC</h1>
        <div class="login">
            <a href="login.php">INICIAR SESIÓN</a>
            <a href="signup.php">REGISTRARSE</a> 
            <?php endif; ?>           
        </div>
    </div>
</div>



</body>
</html>