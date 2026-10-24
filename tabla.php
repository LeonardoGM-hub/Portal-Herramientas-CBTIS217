<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generar tablas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    

    <form method="POST" action="tabla.php">
        <label for="numero">Ingresa un numero:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Generar</button>
    </form>

    <br>

    <?php
    include 'menu.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['numero']) && $_POST['numero'] !== '') {
            $numero = intval($_POST['numero']);

            echo "<p>Tabla de multiplicar del $numero:</p>";
            echo "<table border='1'>";
            echo "<tr><th>Operación</th><th>Resultado</th></tr>";

            for ($i = 1; $i <= 10; $i++) {
                $resultado = $numero * $i;
                echo "<tr>";
                echo "<td>$numero x $i</td>";
                echo "<td>$resultado</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
    }
    ?>

</body>
</html>