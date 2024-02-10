<?php
    include("./model/db.php");

$nombreProveedor = $_POST["nombreProveedor"];


if (!empty($_POST["btnAgregarProveedor"])) {
    if (!empty($nombreProveedor)) {

        // Utilizar consultas preparadas para mejorar la seguridad
        $query = $con->prepare("INSERT INTO proveedores (nombre_proveedor) VALUES (?)");

        // Vincular los parámetros
        $query->bind_param("s", $nombreProveedor);

        if ($query->execute()) {
            echo "Datos insertados correctamente";
            header("refresh:2;url=./proveedores.php");
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
