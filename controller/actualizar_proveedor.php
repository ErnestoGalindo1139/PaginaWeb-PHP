<?php include("./model/db.php") ?>

<?php 

    $id = $_POST["id"];
    $nombreProveedor = $_POST["nombreProveedor"];

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
        
    // Consulta preparada para UPDATE
    $query = $con->prepare("UPDATE proveedores SET nombre_proveedor=? WHERE id_proveedor=?");

    // Vincular los parámetros
    $query->bind_param("ss", $nombreProveedor, $id);

    if ($query->execute()) {
        echo "Datos actualizados correctamente";
        header("refresh:2;url=./proveedores.php");
    } else {
        echo "Error al actualizar datos: " . $con->error;
    }

?>

