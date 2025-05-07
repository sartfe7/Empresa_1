<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require 'modelo/conexion.php';

    session_start();

    if (isset($_SESSION['username'])) {
        $nombre_usuario = $_SESSION['username'];
    }

    // Consulta para obtener los departamentos desde la base de datos
    $query_departamento = "SELECT id_departamento, nombre_departamento FROM Departamento";
    $resultado_departamento = mysqli_query($conexion, $query_departamento);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar empleado</title>
</head>
<body>
    <h1>Registrar Empleado</h1>
    <?php
        echo 'Usuario: ' . $nombre_usuario;
    ?>
    <!--Formulario de registro de empleado-->
    <h2>Empleado</h2>
    <form action="modelo/reg_empleado.php" method="post">
        <label for="id_empleado">Código:</label>
        <input type="text" name="id_empleado" id="id_empleado" required>
        <br><br>
        <label for="nombre_empleado">Nombre:</label>
        <input type="text" name="nombre_empleado" id="nombre_empleado" required>
        <br><br>
        <label for="apellidos_empleados">Apellidos:</label>
        <input type="text" name="apellidos_empleados" id="apellidos_empleados" required>
        <br><br>
        <label for="id_departamento">Departamento:</label>
        <select name="id_departamento" id="id_departamento" required>
            <?php
                // Generar dinámicamente las opciones de la lista desplegable
                if ($resultado_departamento && mysqli_num_rows($resultado_departamento) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado_departamento)) {
                        echo '<option value="' . $fila['id_departamento'] . '">' . $fila['nombre_departamento'] . '</option>';
                    }
                } else {
                    echo '<option value="">No hay departamentos disponibles</option>';
                }
            ?>
        </select>
        <br><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>