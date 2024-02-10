<?php include("./model/db.php") ?>
<?php include("includes/header.php") ?>
<?php include("controller/crudCategorias.php") ?>

<h1 class="titulo">Categorias</h1>

<div class="btnVolverContenedor">
    <a class="btnVolver" href="./index.php">Ir al panel principal</a>
</div>

<form id="formularioCategorias" class="formularioCategorias" method="POST" enctype="multipart/form-data">


    <div class="camposCategorias">
        <div class="campo">
            <label for="nombreCategoria">Nombre de la categoria</label>
            <input type="text" id="nombreCategoria" name="nombreCategoria" value="<?php echo isset($categoria['nombre_categoria']) ? $categoria['nombre_categoria'] : ''; ?>" placeholder="Introduzca un nombre de la categoria">
        </div>

        <div class="campo consultarProducto" style="margin: 3rem 0 2rem 0;">
            <div style="width: 14rem; margin-right: 4rem;" >
                <label for="idCategoria">Consultar por ID</label>
                <input type="number" id="idCategoria" name="idCategoria" placeholder="Introduzca un ID">
            </div>
            <button class="btnConsultar" name="btnConsultarCategoria" style="" >Consultar</button>
        </div>

    </div>

    <div class="botones">
        <button type="button" class="btnLimpiar" name="btnLimpiar" onclick="limpiarFormulario()">Limpiar</button>
        <button type="submit" class="btnAgregar" name="btnAgregarCategoria" value="ok">Agregar</button>
        <button class="btnModificar" name="btnModificarCategoria">Modificar</button>
        <button class="btnEliminar" name="btnEliminarCategoria">Eliminar</button>
        
    </div>

    <input hidden id="id" name="id" type="text" value="<?php echo isset($categoria['id_categoria']) ? $categoria['id_categoria'] : ''; ?>" >

</form>

<table class="tabla" style="width: min(40rem, 100%)">
    <thead>
        <tr>
            <th>Id Categoria</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
            $query = "SELECT * FROM categorias";
            $result_products = mysqli_query($con, $query);

            while($row = mysqli_fetch_array($result_products)) { ?>
                <tr>
                    <td> <?php echo $row['id_categoria'] ?> </td>
                    <td> <?php echo $row['nombre_categoria'] ?> </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<script>
    
    function limpiarFormulario() {
        const nombreCategoria = document.getElementById('nombreCategoria');
        const idCategoria = document.getElementById('idCategoria');
        nombreCategoria.value = '';
        idCategoria.value = '';
    }

</script>
