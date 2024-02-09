<?php include("./model/db.php") ?>

<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    function consultarProducto($con) {
        $producto = array(); 

        if (!empty($_POST["idProducto"])) {
            $valor_input = $_POST["idProducto"];

            $sql = "SELECT nombre_producto, descripcion_producto, precio_producto, cantidad_producto, url_producto, id_categoria, id_proveedor FROM productos WHERE id_producto = '$valor_input'";

            // Ejecutar la consulta
            $result = $con->query($sql);
            
            if ($result) {
                // Verificar si se encontraron resultados
                if ($result->num_rows > 0) {
                    $producto = $result->fetch_assoc();

                } else {
                    echo "El producto no existe en la base de datos.";
                }
            } else {
                echo "Error al ejecutar la consulta: " . $con->error;
            }

        } else {
            echo "Ingrese un ID.";
        }

        return $producto;
    }

    // Verificar qué botón se ha presionado
    if (isset($_POST['btnConsultar'])) {
        $producto = consultarProducto($con);
    } else {
        // Si no se presiona el botón de consulta, inicializar $producto
        $producto = array();
    }

?>

