<?php include("./model/db.php") ?>

<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    function consultarCategoria($con) {
        $categoria = array(); 

        if (!empty($_POST["idCategoria"])) {
            $valor_input = $_POST["idCategoria"];

            $sql = "SELECT id_categoria, nombre_categoria FROM categorias WHERE id_categoria = '$valor_input'";
            // Ejecutar la consulta
            $result = $con->query($sql);
            
            if ($result) {
                // Verificar si se encontraron resultados
                if ($result->num_rows > 0) {
                    $categoria = $result->fetch_assoc();

                } else {
                    echo "El producto no existe en la base de datos.";
                }
            } else {
                echo "Error al ejecutar la consulta: " . $con->error;
            }

        } else {
            echo "Ingrese un ID.";
        }

        return $categoria;
    }

    // Verificar qué botón se ha presionado
    if (isset($_POST['btnConsultarCategoria'])) {
        $categoria = consultarCategoria($con);
    } else {
        $categoria = array();
    }

?>

