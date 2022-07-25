<?php
require_once('../../Usuario/modelo/Usuario.php');
require_once('../../Producto/modelo/Producto.php');
$ModeloProductos = new Usuario();
$ModeloProductos->validateSession();

$Modelo = new Producto();


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
                <h1>Productos</h1>
                <div class="CRUD-dashboard-button-contenedor">
                <label for="checkbox-registrar" class="CRUD-dashboard-button">
                    Registrar
                </label>
                </div>
                    <div class="dashboard-table">
                        <table>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>En Stock</th>
                                <th>Unidad de Medida</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                            <?php
                            $Productos = $Modelo->get();
                            if($Productos != null){
                            foreach ($Productos as $Producto){

                            ?>
                            <tr>
                                <td><?php echo $Producto['prod_codigo']?></td>
                                <td><?php echo $Producto['prod_nombre']?></td>
                                <td><?php echo $Producto['prod_precio_venta']?></td>
                                <td><?php echo $Producto['prod_cantidad_stock']?></td>
                                <td><?php echo $Producto['prod_unidad_medida']?></td>
                                <td><?php echo $Producto['prod_descripcion']?></td>


                                <td>
                                    <div class="dashboard-table-button">

                                    <!-- <label for="checkbox-editar"  class="editar"></label> -->
                                    <a href="edit.php?prod_codigo=<?php echo $Producto['prod_codigo']?>" class="editar">Editar</a>
                                    <a href="delete.php?prod_codigo=<?php echo $Producto['prod_codigo']?>" class="eliminar">Eliminar</a>
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
                Registrar Producto
            </div>
            <div class="body-cuestionario">
                <form method="POST" action="../controladores/add.php">

                    <label for="">Codigo</label>
                    <input type="text" name="ID">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre">
                    <label for="">Precio</label>
                    <input type="text" name="precio_venta">
                    <label for="">En Stock</label>
                    <input type="text" name="cantidad_stock">
                    <label for="">Unidad de Medida</label>
                    <input type="text" name="unidad_medida">
                    <label for="">Descripcion</label>
                    <input type="text" name="descripcion">




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