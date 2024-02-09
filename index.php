<?php include("./model/db.php") ?>

<?php include("includes/header.php") ?>
    <h1 class="titulo">Admin de tienda en linea</h1>

    <?php include("includes/formulario.php") ?>

    <table class="tabla">
        <thead>
            <tr>
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
            
                $query = "SELECT * FROM productos";
                $result_products = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($result_products)) { ?>
                    <tr>
                        <td> <?php echo $row['nombre_producto'] ?> </td>
                        <td> <?php echo $row['descripcion_producto'] ?> </td>
                        <td> <?php echo $row['precio_producto'] ?> </td>
                        <td> <?php echo $row['cantidad_producto'] ?> </td>
                        <td> <img id="imgProducto" width="150" src="./img/<?php echo $row['url_producto'] ?>"> </td>
                        <td> <?php echo $row['id_categoria'] ?> </td>
                        <td> <?php echo $row['id_proveedor'] ?> </td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>

