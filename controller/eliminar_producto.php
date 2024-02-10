<?php include("./model/db.php") ?>

<?php 

    $idProducto = $_POST["idProducto"];
    $idOculto = $_POST["id"];

    // Obtener el nombre de la imagen del producto que se va a eliminar
    $querySelectImagen = $con->prepare("SELECT url_producto FROM productos WHERE id_producto = ?");
    $querySelectImagen->bind_param("i", $idProducto);
    $querySelectImagen->bind_param("i", $idOculto);
    $querySelectImagen->execute();
    $querySelectImagen->bind_result($imagenNombre);
    $querySelectImagen->fetch();
    $querySelectImagen->close();

    // Verificar si se encontró una imagen asociada al producto
    if ($imagenNombre) {
        // Ruta completa de la imagen
        $rutaImagen = "./img/" . $imagenNombre;

        // Eliminar el archivo de la carpeta
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        } else {
            echo "Error: La imagen no existe en la carpeta.";
        }
    }
    

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
        
    // Consulta preparada para DELETE
    $query = $con->prepare("DELETE FROM productos WHERE id_producto=?");

    // Vincular el parámetro
    $query->bind_param("i", $idProducto);
    $query->bind_param("i", $idOculto);

    if ($query->execute()) {
        echo "Producto eliminado correctamente";
        header("refresh:2;url=./index.php");
    } else {
        echo "Error al eliminar producto: " . $con->error;
    }

?>

