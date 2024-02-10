<?php include("./model/db.php") ?>

<?php 

    $idCategoria = $_POST["idCategoria"];
    $idOculto = $_POST["id"];

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
        
    // Consulta preparada para DELETE
    $query = $con->prepare("DELETE FROM categorias WHERE id_categoria=?");

    // Vincular el parámetro
    $query->bind_param("i", $idCategoria);
    $query->bind_param("i", $idOculto);

    if ($query->execute()) {
        echo "Producto eliminado correctamente";
        header("refresh:2;url=./categorias.php");
    } else {
        echo "Error al eliminar categoria: " . $con->error;
    }

?>

