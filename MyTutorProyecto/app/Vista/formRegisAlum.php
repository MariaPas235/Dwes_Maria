<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Estudiante</title>
</head>
<body>
    <h1>Formulario Registro Estudiante</h1>

    <form method="POST" action="index.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required>
        <br><br>

         <label for="edad">Edad:</label>
        <input type="number" min="1" max="99" id="edad" name="edad" required>
        <br><br>        

        <button type="submit" name="btnIniciarSesion">Enviar</button>
    </form>
</body>
</html>
