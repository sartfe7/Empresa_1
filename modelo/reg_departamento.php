<?php
    /*error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $id_dep = $_POST['id_departamento'];
        $nombre_dep = $_POST['nombre_departamento'];
        $presupuesto_dep = $_POST['presupuesto_departamento'];

        $query = "INSERT INTO Departamento(id_departamento,nombre_departamento,presupuesto_departamento) VALUES  ('$id_dep', '$nombre_dep', '$presupuesto_dep')";

        $insercion = mysqli_query($conexion, $query) or trigger_error("Error en la inserción de los datos: ".mysqli_error($conexion));

        if($insercion)
        {
            echo '<script type "text/javascript">
                    alert("Departamento registrado!");
                    window.location.href = "../registrar_departamento.php"
                </script>';
        }
        else
        {
            header('location: ../index.php');
        }
    }

?>
