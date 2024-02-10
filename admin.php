<?php include("./model/db.php") ?>

<?php include("includes/header.php") ?>
    <h1 class="titulo">Admin de tienda en linea</h1>

    <?php include("includes/formulario.php") ?>

    <table class="tabla">
        <thead>
            <tr>
                <th>Id Producto</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Imagen</th>
                <th>Categoría</th>
                <th>Proveedor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
                $query = "  SELECT 
                                id_producto,
                                descripcion_producto,
                                nombre_producto,
                                precio_producto,
                                cantidad_producto,
                                url_producto,
                                categorias.nombre_categoria AS nombre_categoria,
                                proveedores.nombre_proveedor AS nombre_proveedor
                            FROM productos
                            INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria
                            INNER JOIN proveedores ON productos.id_proveedor = proveedores.id_proveedor
                        ";
                $result_products = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($result_products)) { ?>
                    <tr>
                        <td> <?php echo $row['id_producto'] ?> </td>
                        <td> <?php echo $row['nombre_producto'] ?> </td>
                        <td> <?php echo $row['descripcion_producto'] ?> </td>
                        <td> <?php echo $row['precio_producto'] ?> </td>
                        <td> <?php echo $row['cantidad_producto'] ?> </td>
                        <td> <img id="imgProducto" width="150" src="./img/<?php echo $row['url_producto'] ?>"> </td>
                        <td> <?php echo $row['nombre_categoria'] ?> </td>
                        <td> <?php echo $row['nombre_proveedor'] ?> </td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>

