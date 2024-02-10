<?php include("./model/db.php") ?>

<?php 

    $id = $_POST["id"];
    $nombreCategoria = $_POST["nombreCategoria"];

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
        
    // Consulta preparada para UPDATE
    $query = $con->prepare("UPDATE categorias SET nombre_categoria=? WHERE id_categoria=?");

    // Vincular los parámetros
    $query->bind_param("ss", $nombreCategoria, $id);

    if ($query->execute()) {
        echo "Datos actualizados correctamente";
        header("refresh:2;url=./categorias.php");
    } else {
        echo "Error al actualizar datos: " . $con->error;
    }

?>

