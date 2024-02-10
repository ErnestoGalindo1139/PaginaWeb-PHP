<?php 

    // Verificar qué botón se ha presionado
    if (isset($_POST['btnConsultar'])) {
        include("./controller/consultar_producto.php");
    }
    elseif (isset($_POST['btnAgregar'])) {
        include("./controller/registrar_producto.php");
    }
    elseif (isset($_POST['btnModificar'])) {
        include("./controller/actualizar_producto.php");
    }
    elseif (isset($_POST['btnEliminar'])) {
        include("./controller/eliminar_producto.php");
    } else {
        // Si no se presiona el botón de consulta, inicializar $producto
        // $producto = array();
    }

?>