<?php include("./model/db.php") ?>
<?php include("includes/header.php") ?>
<?php include("controller/crudProveedores.php") ?>

<h1 class="titulo">Proveedores</h1>

<div class="btnVolverContenedor">
    <a class="btnVolver" href="./index.php">Ir al panel principal</a>
</div>

<form id="formularioProveedores" class="formularioProveedores" method="POST" enctype="multipart/form-data">


    <div class="camposProveedores">
        <div class="campo">
            <label for="nombreProveedor">Nombre del proveedor</label>
            <input type="text" id="nombreProveedor" name="nombreProveedor" value="<?php echo isset($proveedor['nombre_proveedor']) ? $proveedor['nombre_proveedor'] : ''; ?>" placeholder="Introduzca un nombre de proveedor">
        </div>

        <div class="campo consultarProducto" style="margin: 3rem 0 2rem 0;">
            <div style="width: 14rem; margin-right: 4rem;" >
                <label for="idProveedor">Consultar por ID</label>
                <input type="number" id="idProveedor" name="idProveedor" placeholder="Introduzca un ID">
            </div>
            <button class="btnConsultar" name="btnConsultarProveedor" style="" >Consultar</button>
        </div>

    </div>

    <div class="botones">
        <button type="button" class="btnLimpiar" name="btnLimpiar" onclick="limpiarFormulario()">Limpiar</button>
        <button type="submit" class="btnAgregar" name="btnAgregarProveedor" value="ok">Agregar</button>
        <button class="btnModificar" name="btnModificarProveedor">Modificar</button>
        <button class="btnEliminar" name="btnEliminarProveedor">Eliminar</button>
        
    </div>

    <input hidden id="id" name="id" type="text" value="<?php echo isset($proveedor['id_proveedor']) ? $proveedor['id_proveedor'] : ''; ?>" >
</form>

<table class="tabla" style="width: min(40rem, 100%)">
    <thead>
        <tr>
            <th>Id Proveedor</th>
            <th>Proveedor</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
            $query = "SELECT * FROM proveedores";
            $result_products = mysqli_query($con, $query);

            while($row = mysqli_fetch_array($result_products)) { ?>
                <tr>
                    <td> <?php echo $row['id_proveedor'] ?> </td>
                    <td> <?php echo $row['nombre_proveedor'] ?> </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<script>
    
    function limpiarFormulario() {
        const nombreProveedor = document.getElementById('nombreProveedor');
        const idProveedor = document.getElementById('idProveedor');
        nombreProveedor.value = '';
        idProveedor.value = '';
    }

</script>
