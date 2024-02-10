<?php include("./model/db.php") ?>

<?php 

    $idProveedor = $_POST["idProveedor"];
    $idOculto = $_POST["id"];

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
        
    // Consulta preparada para DELETE
    $query = $con->prepare("DELETE FROM proveedores WHERE id_proveedor=?");

    // Vincular el parámetro
    $query->bind_param("i", $idProveedor);
    $query->bind_param("i", $idOculto);

    if ($query->execute()) {
        echo "Proveedor eliminado correctamente";
        header("refresh:2;url=./proveedores.php");
    } else {
        echo "Error al eliminar proveedor: " . $con->error;
    }

?>

