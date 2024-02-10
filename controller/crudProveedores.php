<?php 

    // Verificar qué botón se ha presionado
    if (isset($_POST['btnConsultarProveedor'])) {
        include("./controller/consultar_proveedor.php");
    }else if (isset($_POST['btnAgregarProveedor'])) {
        include("./controller/agregar_Proveedor.php");
    }else if (isset($_POST['btnModificarProveedor'])) {
        include("./controller/actualizar_proveedor.php");
    }else if (isset($_POST['btnEliminarProveedor'])) {
        include("./controller/eliminar_proveedor.php");
    }

?>