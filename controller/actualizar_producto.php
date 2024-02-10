<?php include("./model/db.php") ?>

<?php 

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $categoria = $_POST["categoria"];
    $proveedor = $_POST["proveedor"];

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

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
        
    // Consulta preparada para UPDATE
    $query = $con->prepare("UPDATE productos SET nombre_producto=?, descripcion_producto=?, precio_producto=?, cantidad_producto=?, url_producto=?, id_categoria=?, id_proveedor=? WHERE id_producto=?");

    // Vincular los parámetros
    $query->bind_param("ssdissii", $nombre, $descripcion, $precio, $cantidad, $imagen_nombre, $categoria, $proveedor, $id);

    // Supongamos que $idProducto contiene el ID del producto que deseas actualizar

    if ($query->execute()) {
        echo "Datos actualizados correctamente";
        header("refresh:2;url=./index.php");
    } else {
        echo "Error al actualizar datos: " . $con->error;
    }

?>

