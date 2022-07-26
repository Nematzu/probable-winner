<?php

// require_once('../../Usuarios/modelo/Usuario.php');
require_once('../../Usuario/modelo/Usuario.php');

$ModeloUsuarios = new Usuario();
$ModeloUsuarios->validateSession();

$Modelo = new Usuario();

$usua_codigo = $_GET['usua_codigo'];
$InformacionUsuario = $Modelo->getByID($usua_codigo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos3.css">
    <title>Document</title>
</head>
<body>

    <header>
        <div>
        <a href="menuadmin.html" class="logo">
            <img src="imagenes/tienda1.png" alt="" srcset="">
            <b>Tiendita Don Chucho</b>
        </a>
        </div>
    </header>
    <div class="CRUD-MAIN">
        <div class="CRUD-sidebar">
            <div class="CRUD-sidebar-contenedor"><img src="imagenes/CU/usuarios.png" alt=""><a href="">Usuarios</a></div>
            <div class="CRUD-sidebar-contenedor"><img src="imagenes/CU/productos.png" alt=""><a href="">Productos</a></div>
            <div class="CRUD-sidebar-contenedor"><img src="imagenes/CU/clientes.png" alt=""><a href="">Clientes</a></div>
            <div class="CRUD-sidebar-contenedor"><img src="imagenes/CU/ventas.png" alt=""><a href="">Ventas</a></div>
        </div>
        <div class="CRUD-dashboard">
            <div class="CRUD-dashboard-main">
                <h1>Usuarios</h1>
                <div class="CRUD-dashboard-button-contenedor">
                <label for="checkbox-registrar" class="CRUD-dashboard-button">
                    Registrar
                </label>
                </div>
                    <div class="dashboard-table">
                        <table>
                            <tr>
                                <th>ID_Admin</th>
                                <th>Identificacion</th>
                                <th>Tipo_Identificacion</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Celular</th>
                                <th>Direccion</th>
                                <th>ID_usuario</th>
                                <th>Acciones</th> 
                            </tr>
                            <?php
                            $Usuarios = $Modelo->get();
                            if($Usuarios != null){
                            foreach ($Usuarios as $Usuario){

                            ?>
                            <tr>
                                <td><?php echo $Usuario['usua_codigo']?></td>
                                <td><?php echo $Usuario['usua_identificacion']?></td>
                                <td><?php echo $Usuario['usua_tipo_identificacion']?></td>
                                <td><?php echo $Usuario['usua_nombre']?></td>
                                <td><?php echo $Usuario['usua_apellido']?></td>
                                <td><?php echo $Usuario['usua_celular']?></td>
                                <td><?php echo $Usuario['usua_direccion']?></td>
                                <td><?php echo $Usuario['usua_estado']?></td>
                                <td>
                                    <div class="dashboard-table-button">
                                    <!-- <label for="checkbox-editar"  class="editar"></label> -->
                                    <a href="edit.php?usua_codigo=<?php echo $Usuario['usua_codigo']?>" class="editar">Editar</a>
                                    <a href="edit.php?usua_codigo=<?php echo $Usuario['usua_codigo']?>" class="eliminar">Eliminar</a>
                                    </div>
                                </td>
                            </tr>

                            <?php
                            
                                    }
                                }
                            ?>
                        </table>
                    </div>
            </div>
                <div class="footer-menu">
                    <h2>INFORMACION DE CONTACTO</h2>
                       <p>Telefono: 7438787</p>
                       <a href="#">Direccion: Cra. 91 #128D-34, Bogotá, Cundinamarca</a>
                       <a href="#">Tiendita Don Chucho © 2022</a>
                    </div>
    
        </div>
                
                
        
    </div>

    
    <!-- Modulo Editar -->
    <input type="checkbox" id="checkbox-editar">
    <div class="contenedor-cuestionario-editar2">
        <div class="cuestionario">
            <div class="header-cuestionario-editar">
                Editar Persona
            </div>
            <div class="body-cuestionario">
                <form method="POST" action="../controladores/edit.php">
                <?php
                    if($InformacionUsuario != null){
                        foreach ($InformacionUsuario as $Info){
                            

                    ?>
                    <input type="hidden" name="usua_codigo" value="<?php echo $usua_codigo; ?>" >
                    <label for="">Identificacion</label>
                    <input type="text" name="Identificacion" value="<?php echo $Info['usua_identificacion']?>" >
                    <label for="">Tipo_Identificacion</label>
                    <input type="text" name="Tipo_Identificacion" value="<?php echo $Info['usua_tipo_identificacion']?>" >
                    <label for="">Nombre</label>
                    <input type="text" name="Nombre" value="<?php echo $Info['usua_nombre']?>">
                    <label for="">Apellido</label>
                    <input type="text" name="Apellido" value="<?php echo $Info['usua_apellido']?>" >
                    <label for="">Celular</label>
                    <input type="text" name="Celular" value="<?php echo $Info['usua_celular']?>" >
                    <label for="">Direccion</label>
                    <input type="text" name="Direccion" value="<?php echo $Info['usua_direccion']?>" >
                    <label for="">Contraseña</label>
                    <input type="text" name="Password" value="<?php echo $Info['usua_password']?>" >
                    <label for="">Direccion</label>
                    <input type="text" name="Estado" value="<?php echo $Info['usua_estado']?>" >
                    <?php
                    
                        }
                    }   
                    ?>
                    <div class="footer-cuestionario">
                        <a href="CRUDUsuarios.php" class="CRUD-dashboard-button-editar">Cancelar</a>
                        <input type="submit" class="CRUD-dashboard-button-editar">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>