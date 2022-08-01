<?php

require_once('../../Usuario/modelo/Usuario.php');
$ModeloUsuarios = new Usuario();
$ModeloUsuarios->validateSession();

$Modelo = new Usuario();


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
                                <th>ID_usuario</th>
                                <th>Identificacion</th>
                                <th>Tipo_Identificacion</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Celular</th>
                                <th>Direccion</th>
                                <th>Estado</th>

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
                                    <a href="delete.php?usua_codigo=<?php echo $Usuario['usua_codigo']?>" class="eliminar">Eliminar</a>
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

 
    
    <!-- Modulo Crear -->
    <input type="checkbox" id="checkbox-registrar">
    <div class="contenedor-cuestionario-registrar">
        <div class="cuestionario">
            <div class="header-cuestionario-registrar">
                Registrar Persona
            </div>
            <div class="body-cuestionario">
                <form method="POST" action="../controladores/add.php">

                    <label for="">Identificacion</label>
                    <input type="text" name="Identificacion" pattern="[0-9]+" required>
                    <label for="">Tipo_Identificacion</label>
                    <select name="color" id="color" name="Tipo_Identificacion" required>
                    <option disabled selected>Selecciona una opción</option>
                    <option value="r" >CC</option>
                    <option value="a">TI</option>
                    </select>
                    <label for="">Nombre</label>
                    <input type="text" name="Nombre" pattern="[a-zA-Z ]+" required>
                    <label for="">Apellido</label>
                    <input type="text" name="Apellido" pattern="[a-zA-Z ]+" required>
                    <label for="">Celular</label>
                    <input type="text" name="Celular" pattern="[0-9]+{1.11}" required>
                    <label for="">Direccion</label>
                    <input type="text" name="Direccion" pattern="[$.,%#/_- ]+[a-zA-Z0-9]+{1,}" required>
                    <label for="">Password</label>
                    <input type="text" name="Password" pattern="[$.,%#/_- ] [a-zA-Z0-9] {1,}" required>
                    <label for="">Estado</label>
                    <select name="color" id="color" name="Estado" required>
                    <option disabled selected>Selecciona una opción</option >
                    <option value="r" >Activo</option>
                    <option value="a">Inactivo</option>
                    </select>



                    <div class="footer-cuestionario">
                        <label for="checkbox-registrar" class="CRUD-dashboard-button">
                            Cancelar
                        </label>
                            <input type="submit" class="CRUD-dashboard-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>