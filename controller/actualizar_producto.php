<?php include("./model/db.php") ?>

<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Obtener datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $categoria = $_POST["categoria"];
    $proveedor = $_POST["proveedor"];

    // Consulta preparada para obtener la ruta de imagen actual antes de la actualización
    $querySelectImagen = $con->prepare("SELECT url_producto FROM productos WHERE id_producto = ?");
    $querySelectImagen->bind_param("i", $id);
    $querySelectImagen->execute();
    $querySelectImagen->bind_result($imagenActual);
    $querySelectImagen->fetch();
    $querySelectImagen->close();

    // Inicializar la variable para el nombre de la imagen
    $imagen_nombre = $imagenActual; // Inicializar con el valor actual

    // Verificar si se ha subido un nuevo archivo de imagen
    if (!empty($_FILES["imagen"]["name"])) {
        // Nuevo archivo de imagen proporcionado
        $imagen_nombre = $_FILES["imagen"]["name"]; // Nombre
        $imagen_temporal = $_FILES["imagen"]["tmp_name"]; // Imagen
        $ruta_destino = "./img/" . $imagen_nombre;  // Ruta

        // Guardar la nueva imagen en la carpeta img
        move_uploaded_file($imagen_temporal, $ruta_destino);
    }

    // Consulta preparada para UPDATE
    $query = $con->prepare("UPDATE productos SET nombre_producto=?, descripcion_producto=?, precio_producto=?, cantidad_producto=?, url_producto=?, id_categoria=?, id_proveedor=? WHERE id_producto=?");

    // Vincular los parámetros
    $query->bind_param("ssdissii", $nombre, $descripcion, $precio, $cantidad, $imagen_nombre, $categoria, $proveedor, $id);

    // Ejecutar la actualización
    if ($query->execute()) {
        // Si se proporciona un nuevo archivo de imagen y había una imagen anterior, eliminar la imagen anterior
        if (!empty($_FILES["imagen"]["name"]) && !empty($imagenActual)) {
            $ruta_imagen_anterior = "./img/" . $imagenActual;
            if (file_exists($ruta_imagen_anterior)) {
                unlink($ruta_imagen_anterior);
            }
        }

        echo "Datos actualizados correctamente";
        header("refresh:2;url=./index.php");
    } else {
        echo "Error al actualizar datos: " . $con->error;
    }

    // Cerrar la conexión a la base de datos u otras tareas necesarias
    $query->close();
    $con->close();
?>
