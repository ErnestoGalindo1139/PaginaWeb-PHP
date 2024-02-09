<?php include("./controller/consultar_producto.php") ?>

<form class="formulario" method="POST">

    <div class="campos">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo isset($producto['nombre_producto']) ? $producto['nombre_producto'] : ''; ?>">
        </div>

        <div class="campo">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" value="<?php echo isset($producto['precio_producto']) ? $producto['precio_producto'] : ''; ?>">
        </div>

        <div class="campo">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5"><?php echo isset($producto['descripcion_producto']) ? $producto['descripcion_producto'] : ''; ?></textarea>
        </div>

        <div class="campo">
            <label for="cantidad">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" value="<?php echo isset($producto['cantidad_producto']) ? $producto['cantidad_producto'] : ''; ?>">
        </div>

        <div class="campo">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria" name="categoria">
                <option value="0">Seleccione una Categoria</option>
            </select>
        </div>

        <div class="campo">
            <label for="proveedor">Proveedor</label>
            <select name="proveedor" id="proveedor" name="proveedor">
                <option value="0">Seleccione un Proveedor</option>
            </select>
        </div>

        <div class="campo">
            <div class="imagenPreview" id="imagenContainer">
                <img id="imgPreview" src="#" height="200" class="none" alt="Imagen introducida" />
            </div>
            <label>Imagen:</label>
            <div class="input-image">
                <label for="imagen" class="input-file">
                    <input type="file" class="none" name="imagen" id="imagen" accept="image/*" />
                    Seleccione un archivo
                </label>
                <div class="input-name" id="imagenName">No se han seleccionado archivos</div>
            </div>
        </div>
    </div>

    <div class="campo" style="margin-top: 2rem">
        <label for="idProducto">Id del producto:</label>
        <input type="number" id="idProducto" name="idProducto" style="width: 10rem">
    </div>

    <div class="botones">
    <button class="btnLimpiar" name="btnLimpiar">Limpiar</button>
        <button class="btnAgregar" name="btnAgregar" value="ok">Agregar</button>
        <button class="btnModificar">Modificar</button>
        <button class="btnConsultar" name="btnConsultar">Consultar</button>
        <button class="btnEliminar">Eliminar</button>
        <a class="btnVerProductos" href="./productos.php" target="_blank">Ver Productos</a>
    </div>

</form>


