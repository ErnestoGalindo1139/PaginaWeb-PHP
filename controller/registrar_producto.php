<?php 

    if(!empty($_POST["btnAgregar"])) {
        if (!empty($_POST["nombre"]) and !empty($_POST["precio"]) and !empty($_POST["descripcion"]) and !empty($_POST["cantidad"]) and !empty($_POST["categoria"]) and !empty($_POST["proveedor"]) and !empty($_POST["imagen"])) {
            
        }else {
            echo "Ningun campo debe estar vacio";
        }
    }

?>