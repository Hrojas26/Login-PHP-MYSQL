<?php 
require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
  
    if ($stmt->execute()) {
        $message = 'SU CUENTA FUE CREADA CORRECTAMENTE';
        
    } else{
        
        $message = 'CREACION FALLIDA';
    }
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylePHP.css">
    <title>Document</title>
</head>
<body>
    
<?php require 'header/header.php'?> 

<?php if (!empty($message)):?> 
    
    <p><?= $message ?></p>
    <?php endif; ?>


<div class="contenedorPadre">
    <div class="contenedorHijo">  
         <h1> REGISTRATE </h1>

         <div class="login">
                <form action="signup.php" method="post">
                    <input type="text" name="email"  placeholder="Email">
                    <input type="password" name="password" placeholder="ingresa tu contraseña">
                    <input type="password" name="confirmar_password" placeholder="Confirma tu contraseña">
                
                    <div class="boton">
                            <input class="bt1" type="submit" value="INGRESAR">
                    </div>
                </form>  
        </div>

    </div>
</div>


<span class="ya"> ¿ya estas registrado? </span>
<a class="or" href="login.php"> Inicia sesión </a>

</body>
</html>