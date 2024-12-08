<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <?php
    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $fechana = $_POST['fecha_na'];
        $libro = $_POST['libro'];


        include("conexion.php");

        // Insertar registros
        $sql = "INSERT INTO autor(nombre, fecha_na,libro) 
        VALUES('$nombre', '$fechana','$libro')";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            // Datos ingresados correctamente
            echo "<script language='JavaScript'>
                    alert('Los datos fueron ingresados correctamente a la BD');
                    location.assign('autores.php');
                  </script>";
        } else {
            // Error al ingresar datos
            echo "<script language='JavaScript'>
                    alert('ERROR: Los datos no fueron ingresados a la BD');
                    location.assign('autores.php');
                  </script>";
        }
        mysqli_close($conexion);
    } else {
    ?>

    <h1>Agregar Nuevo Autor</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre del autor</label>
        <input type="text" name="nombre"><br>
        <label>Fecha de nacimiento</label>
        <input type="text" name="fecha_na"><br>
        <label>Estudios realisados</label>
        <input type="text" name="libro"><br>
        <input type="submit" name="enviar" value="Agregar">
        <a href="autores.php">Regresar</a>
    </form>
    <?php
    }
    ?>
</body>
</html>
