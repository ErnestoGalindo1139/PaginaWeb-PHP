<?php 

    // Verificar qué botón se ha presionado
    if (isset($_POST['btnConsultarCategoria'])) {
        include("./controller/consultar_categoria.php");
    }else if (isset($_POST['btnAgregarCategoria'])) {
        include("./controller/agregar_categoria.php");
    }else if (isset($_POST['btnModificarCategoria'])) {
        include("./controller/actualizar_categoria.php");
    }else if (isset($_POST['btnEliminarCategoria'])) {
        include("./controller/eliminar_categoria.php");
    }

?>