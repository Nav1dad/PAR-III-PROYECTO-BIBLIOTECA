<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTECA</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('Estas seguro que quieres elimar los datos?');
        }
    </script>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

<?php
    include("conexion.php");
    // select * from libros
    $sql = "select * from libros";
    $resultado = mysqli_query($conexion,$sql)
?>
    <h1>LIBROS</h1>
    <a href="agregar.php">Nuevo Libro</a><br><br>
    <a href="autores.php">Bibliografias</a><br><br>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Autor</th>
                <th>Libro</th>
                <th>Editorial</th>
                <th>Fecha de publicacion</th>
                <th>Vista previa</th>
                <th>Descargar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td> <?php echo $filas ['id'] ?> </td>
                <td> <?php echo $filas ['id_autor'] ?> </td>
                <td> <?php echo $filas ['nombre_libro'] ?> </td>
                <td> <?php echo $filas ['editorial'] ?> </td>
                <td> <?php echo $filas ['fecha_publi'] ?> </td>
                <td> <?php echo $filas ['vista_previa'] ?></td>
                <td> <a href="./pdf/<?php echo $filas ['vista_previa'] ?>">Download</a></td>
                <td> 
<?php echo "<a href='editar.php?id=".$filas ['id']."'>EDITAR</a>
    "; ?>
                    -
<?php echo "<a href='eliminar.php?id=".$filas ['id']."'
    onclick='return confirmar()'>ELIMINAR</a>"; ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <?php
    mysqli_close($conexion);
    ?>
</body>
</html>