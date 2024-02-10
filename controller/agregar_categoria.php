<?php
    include("./model/db.php");

$nombreCategoria = $_POST["nombreCategoria"];


if (!empty($_POST["btnAgregarCategoria"])) {
    if (!empty($nombreCategoria)) {

        // Utilizar consultas preparadas para mejorar la seguridad
        $query = $con->prepare("INSERT INTO categorias (nombre_categoria) VALUES (?)");

        // Vincular los parámetros
        $query->bind_param("s", $nombreCategoria);

        if ($query->execute()) {
            echo "Datos insertados correctamente";
            header("refresh:2;url=./categorias.php");
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
