<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evaluador de calificacion</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    

    <form method="POST" action="evaluador.php">
        <label for="calificacion">Ingresa la calificacion (0 a 100):</label>
        <input type="number" id="calificacion" name="calificacion" step="any" required>
        <button type="submit">Evaluacion</button>
    </form>

    <br>

    <?php
    include 'menu.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['calificacion']) && $_POST['calificacion'] !== '') {
            $calificacion = $_POST['calificacion'];

            if (!is_numeric($calificacion)) {
                echo "<p>Error: Por favor ingresa un número válido.</p>";
            } else {
                $calificacion = floatval($calificacion);

                if ($calificacion < 0 || $calificacion > 100) {
                    echo "<p>Error: La calificación debe estar entre 0 y 100.</p>";
                } 
                elseif ($calificacion >= 90 && $calificacion <= 100) {
                    echo "<p>Resultado: <strong>Excelente</strong></p>";
                } elseif ($calificacion >= 80 && $calificacion <= 89) {
                    echo "<p>Resultado: <strong>Muy bien</strong></p>";
                } elseif ($calificacion >= 70 && $calificacion <= 79) {
                    echo "<p>Resultado: <strong>Satisfactorio</strong></p>";
                } elseif ($calificacion >= 0 && $calificacion <= 69) {
                    echo "<p>Resultado: <strong>No acreditado</strong></p>";
                }
            }
        }
    }
    ?>

</body>
</html>