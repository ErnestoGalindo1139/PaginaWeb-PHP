<?php

    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
    $cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : "";
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : "";
    $proveedor = isset($_POST["proveedor"]) ? $_POST["proveedor"] : "";

    global $imagen_nombre;

    // Verifica si se ha subido un archivo
    if (!empty($_FILES["imagen"]["name"])) {
        $imagen_nombre = $_FILES["imagen"]["name"]; // Nombre
        $imagen_temporal = $_FILES["imagen"]["tmp_name"]; // Imagen
        $ruta_destino = "./img/" . $imagen_nombre;  // Ruta

        // Guardar la imagen en la carpeta img
        move_uploaded_file($imagen_temporal, $ruta_destino);
    } else {
        $imagen_nombre = "";  
    }

    if (!empty($_POST["btnAgregar"])) {
        if (!empty($nombre) and !empty($precio) and !empty($descripcion) and !empty($cantidad) and !empty($categoria) and !empty($proveedor)) {

            // Utilizar consultas preparadas para mejorar la seguridad
            $query = $con->prepare("INSERT INTO productos (nombre_producto, descripcion_producto, precio_producto, cantidad_producto, url_producto, id_categoria, id_proveedor) VALUES (?, ?, ?, ?, ?, ?, ?)");

            // Vincular los parámetros
            $query->bind_param("ssdissi", $nombre, $descripcion, $precio, $cantidad, $imagen_nombre, $categoria, $proveedor);

            if ($query->execute()) {
                echo "Datos insertados correctamente";
                header("refresh:2;url=./index.php");
            } else {
                echo "Error al insertar datos: " . $con->error;
            }

            // Cerrar la consulta
            $query->close();
        } else {
            echo "Ningun campo debe estar vacio";
        }
    }
?>
