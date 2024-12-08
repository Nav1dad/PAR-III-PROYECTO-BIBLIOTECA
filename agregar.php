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
        $autor = $_POST['id_autor'];
        $libro = $_POST['nombre_libro'];
        $editorial = $_POST['editorial'];
        $fechaPubli = $_POST['fecha_publi'];
        $vista = $_POST['vista_previa'];

        include("conexion.php");

        // Insertar registros
        $directorio= "./pdf/";
    if(isset($_FILES['vista_previa']) && $_FILES['vista_previa']['error'] == 0){
            $nombreArchivo= $_FILES['vista_previa']['name'];
            $rutaTemporal = $_FILES['vista_previa']['tmp_name'];
            $rutaDestino= $directorio.basename($nombreArchivo);

            if(move_uploaded_file($rutaTemporal, $rutaDestino)){
                $sql = "INSERT INTO libros(id_autor, nombre_libro,editorial,fecha_publi,vista_previa) 
        VALUES('$autor', '$libro','$editorial','$fechaPubli','$nombreArchivo')";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            // Datos ingresados correctamente
            echo "<script language='JavaScript'>
                    alert('Los datos fueron ingresados correctamente a la BD');
                    location.assign('index2.php');
                  </script>";
        } else {
            // Error al ingresar datos
            echo "<script language='JavaScript'>
                    alert('ERROR: Los datos no fueron ingresados a la BD');
                    location.assign('index2.php');
                  </script>";
        }
        mysqli_close($conexion);
    } 

    }
}
    
    //     $sql = "INSERT INTO libros(id_autor, nombre_libro,editorial,fecha_publi,vista_previa) 
    //     VALUES('$autor', '$libro','$editorial','$fechaPubli','$vista')";

    //     $resultado = mysqli_query($conexion, $sql);

    //     if ($resultado) {
    //         // Datos ingresados correctamente
    //         echo "<script language='JavaScript'>
    //                 alert('Los datos fueron ingresados correctamente a la BD');
    //                 location.assign('index.php');
    //               </script>";
    //     } else {
    //         // Error al ingresar datos
    //         echo "<script language='JavaScript'>
    //                 alert('ERROR: Los datos no fueron ingresados a la BD');
    //                 location.assign('index.php');
    //               </script>";
    //     }
    //     mysqli_close($conexion);
    // } else {
    ?>

    <h1>Agregar Nuevo Libro</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <label>Autor</label>
        <input type="text" name="id_autor"><br>
        <label>Nombre del libro</label>
        <input type="text" name="nombre_libro"><br>
        <label>Editorial</label>
        <input type="text" name="editorial"><br>
        <label>Fecha de publicacion</label>
        <input type="text" name="fecha_publi"><br>
        <label>Formato (PDF)</label>
        <input type="file" name="vista_previa" accept="application/pdf" required><br>
        <input type="submit" name="enviar" value="Agregar">
        <a href="index2.php">Regresar</a>
    </form>
    <!-- 
    // }
    ?> -->
</body>
</html>
