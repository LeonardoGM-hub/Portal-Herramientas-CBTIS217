<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>


<?php include 'menu.php'; ?>

<h1>Calculadora</h1>

<form method="POST">
    <label>Primer numero:</label>
    <input type="number" step="any" name="n1" required>

    <label>Segundo numero:</label>
    <input type="number" step="any" name="n2" required>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = filter_input(INPUT_POST, "n1", FILTER_VALIDATE_FLOAT);
    $b = filter_input(INPUT_POST, "n2", FILTER_VALIDATE_FLOAT);

    
    if ($a === false || $a === null || $b === false || $b === null) {
        echo "<p style='color:red;'>Ingresa dos números válidos.</p>";
    } else {
        $suma = $a + $b;
        $resta = $a - $b;
        $multiplicacion = $a * $b;


        echo "<p>Suma: " . $suma . "</p>";
        echo "<p>Resta: " . $resta . "</p>";
        echo "<p>Multiplicación: " . $multiplicacion . "</p>";

        if ($b == 0) {
            echo "<p style='color:red;'>División: No es posible dividir entre cero.</p>";
        } else {
            $division = $a / $b;
            echo "<p>División: " . $division . "</p>";
        }
    }
}
?>

</body>
</html>