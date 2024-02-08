<form class="formulario">
    <div class="campos">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre">
        </div>

        <div class="campo">
            <label for="precio">Precio</label>
            <input type="number" id="precio">
        </div>

        <div class="campo">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
        </div>

        <div class="campo">
            <label for="cantidad">Cantidad</label>
            <input type="number" id="cantidad">
        </div>

        <div class="campo">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria">
                <option value="0">Seleccione una Categoria</option>
            </select>
        </div>

        <div class="campo">
            <label for="proveedor">Proveedor</label>
            <select name="proveedor" id="proveedor">
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

    <div class="botones">
        <button class="btnAgregar">Agregar</button>
        <button class="btnModificar">Modificar</button>
        <button class="btnConsultar">Consultar</button>
        <button class="btnEliminar">Eliminar</button>
        <a class="btnVerProductos" href="./productos.php" target="_blank">Ver Productos</a>
    </div>

</form>