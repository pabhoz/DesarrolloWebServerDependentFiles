<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Ejemplo de formulario</title>
        <link rel="stylesheet" href="css/stylesheet.css"/>
        <script src="js/src.js"></script>
    </head>
    <body>

        <form action="procesar.php" method="post" enctype="multipart/form-data">
            <label for="file">Filename:</label>
            <input type="file" name="file0" ><br>
            <input type="file" name="file1"><br>
            <input type="file" name="file2"><br>
            <input type="submit" name="submit" value="Submit">
        </form>

    </body>
</html>