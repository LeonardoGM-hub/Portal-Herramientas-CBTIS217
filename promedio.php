<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Promedio </title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php include 'menu.php'; ?>

<h1>Promedio </h1>

<form method="POST">
    <label>Primer calificacion (0-100):</label>
    <input type="number" step="any" min="0" max="100" name="c1" required>

    <label>Segunda calificacion (0-100):</label>
    <input type="number" step="any" min="0" max="100" name="c2" required>

    <label>Tercera calificacion (0-100):</label>
    <input type="number" step="any" min="0" max="100" name="c3" required>

    <button type="submit">Calcular Promedio</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
    $c1 = filter_input(INPUT_POST, "c1", FILTER_VALIDATE_FLOAT);
    $c2 = filter_input(INPUT_POST, "c2", FILTER_VALIDATE_FLOAT);
    $c3 = filter_input(INPUT_POST, "c3", FILTER_VALIDATE_FLOAT);


    if ($c1 === false || $c1 === null || $c2 === false || $c2 === null || $c3 === false || $c3 === null) {
        echo "<p style='color:red;'>Ingresa tres calificaciones válidas.</p>";
    } 

    elseif ($c1 < 0 || $c1 > 100 || $c2 < 0 || $c2 > 100 || $c3 < 0 || $c3 > 100) {
        echo "<p style='color:red;'>Las calificaciones deben estar entre 0 y 100.</p>";
    } 

    else {

        $promedio = ($c1 + $c2 + $c3) / 3;


        $promedio_formateado = round($promedio, 1);

        echo "<p><strong>El promedio obtenido es:</strong> " . $promedio_formateado . "</p>";


        if ($promedio >= 60) {
            echo "<p style='color:green; font-weight:bold;'>Estado: APROBADO</p>";
        } else {
            echo "<p style='color:red; font-weight:bold;'>Estado: REPROBADO </p>";
        }
    }
}
?>

</body>
</html>
