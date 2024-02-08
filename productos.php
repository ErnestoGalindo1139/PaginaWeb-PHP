<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="color">

    <div class="contenedor">
        
        <?php
        
            $query = "SELECT * FROM productos";
            $result_products = mysqli_query($conn, $query);
    
            while($row = mysqli_fetch_array($result_products)) { ?>
                <div class="card">
                    <h2> <?php echo $row['nombre_producto'] ?> </h2>
                    <img width="150" src="<?php echo $row['url_producto'] ?>">
                    <p> <?php echo $row['descripcion_producto'] ?> </p>
                    <p> $ <?php echo $row['precio_producto'] ?> </p>
                </div>
            <?php } ?>
        
            
        
    </div>

</div>
    
    
</body>
</html>