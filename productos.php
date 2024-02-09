<?php include("./model/db.php") ?>

<?php include("includes/header.php") ?>
<div class="color">

    <div class="contenedor">
        
        <?php
        
            $sql = $con->query("SELECT * FROM productos");
            while($datos = $sql->fetch_object()) { ?>
                <div class="card">
                    <h2> <?= $datos ->nombre_producto ?> </h2>
                    <img width="150" src="<?= $datos ->url_producto ?>">
                    <p> <?= $datos ->descripcion_producto ?> </p>
                    <p> $ <?= $datos ->precio_producto ?> </p>
                </div>
            <?php } ?>
        
            
        
    </div>

</div>
    
    
</body>
</html>