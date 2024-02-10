<?php include("./model/db.php") ?>

<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    function consultarProveedor($con) {
        $proveedor = array(); 

        if (!empty($_POST["idProveedor"])) {
            $valor_input = $_POST["idProveedor"];

            $sql = "SELECT id_proveedor, nombre_proveedor FROM proveedores WHERE id_proveedor = '$valor_input'";
            // Ejecutar la consulta
            $result = $con->query($sql);
            
            if ($result) {
                // Verificar si se encontraron resultados
                if ($result->num_rows > 0) {
                    $proveedor = $result->fetch_assoc();

                } else {
                    echo "El producto no existe en la base de datos.";
                }
            } else {
                echo "Error al ejecutar la consulta: " . $con->error;
            }

        } else {
            echo "Ingrese un ID.";
        }

        return $proveedor;
    }

    // Verificar qué botón se ha presionado
    if (isset($_POST['btnConsultarProveedor'])) {
        $proveedor = consultarProveedor($con);
    } else {
        $proveedor = array();
    }

?>

