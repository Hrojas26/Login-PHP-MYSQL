
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require 'header/header.php'?>

    <div class="contenedorPadre">
        <div class="contenedorHijo">

            
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