<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <?php
        if (isset($_POST['enviar'])) {
            $id = $_POST['id_autor'];
            $nombre = $_POST['nombre'];
            $fechana = $_POST['fecha_na'];
            $libro = $_POST['libro'];

            // Consulta actualizada correctamente
            $sql = "UPDATE autor SET nombre = '".$nombre."',
                    fecha_na = '".$fechana."',
                    libro = '".$libro."'
                    WHERE id_autor = '".$id."'";
            $resultado = mysqli_query($conexion, $sql);

            if ($resultado) {
                echo "<script>
                        alert('Los datos se actualizaron correctamente');
                        setTimeout(function() {
                            location.assign('autores.php');
                        }, 500);
                      </script>";
            } else {
                echo "<script>
                        alert('ERROR: Los datos no se actualizaron');
                        setTimeout(function() {
                            location.assign('autores.php');
                        }, 500);
                      </script>";
            }

            mysqli_close($conexion);

        } else {
            $id = $_GET['id_autor'];
            $sql = "SELECT * FROM autor WHERE id_autor = '".$id."'";
            $resultado = mysqli_query($conexion, $sql);

            $fila = mysqli_fetch_assoc($resultado);
            $nombre = $fila["nombre"];
            $fechana = $fila["fecha_na"];
            $libro = $fila["libro"];

            mysqli_close($conexion);
    ?>
    <h1>Editar Autor</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre del autor</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
        <label>Fecha de nacimiento</label>
        <input type="text" name="fecha_na" value="<?php echo $fechana; ?>"><br>
        <label>Estudios realisados</label>
        <input type="text" name="libro" value="<?php echo $libro; ?>"><br>

        <input type="hidden" name="id_autor" value="<?php echo $id; ?>">
        <input type="submit" name="enviar" value="Actualizar">
        <a href="autores.php">Regresar</a>
    </form>
    <?php
        }
    ?>
</body>
</html>
