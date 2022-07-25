<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos2.css">
    <title>Document</title>
</head>
<body>
    <div class="login-header">
        <a href="index.html">
        <img src="imagenes/tienda2.png" alt="">
        </a>
    </div>
    <main>
    <div class="login-container">
        <div class="login-boxhead">
            <h1>Iniciar Sesión</h1>
        </div>
        <div class="login-box">
            <form method="POST" action="Usuario/controladores/login.php">
            <label for="">Numero de documento</label>
            <input type="text" name="Usuario">
            <label for="">Contraseña</label>
            <input type="password" name="Contrasena">
            <input type="submit" value="Enviar">
        </form>
        </div>
        <p>
            ¿Nuevo usuario? <a href="registrarse.html"> Crea una cuenta.</a>
        </p>
    </div>
    </main>
    <footer>
        <div class="footer-menu">
        <h2>INFORMACION DE CONTACTO</h2>
           <p>Telefono: 7438787</p>
           <a href="#">Direccion: Cra. 91 #128D-34, Bogotá, Cundinamarca</a>
           <a href="#">Tiendita Don Chucho © 2022</a>
        </div>
    </footer>
</body>
</html>