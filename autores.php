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
    $sql = "select * from autor";
    $resultado = mysqli_query($conexion,$sql)
?>
    <h1>AUTORES</h1>
    <a href="index2.php">Regresar</a><br><br>
    <a href="agregarautores.php">Nuevo Autor</a><br><br>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre del autor</th>
                <th>Fecha de nacimiento</th>
                <th>Estudios realisados</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td> <?php echo $filas ['id_autor'] ?> </td>
                <td> <?php echo $filas ['nombre'] ?> </td>
                <td> <?php echo $filas ['fecha_na'] ?> </td>
                <td> <?php echo $filas ['libro'] ?> </td>
                <td> 
<?php echo "<a href='editarautores.php?id_autor=".$filas ['id_autor']."'>Editar</a>
    "; ?>
                    <p></p>
<?php echo "<a href='eliminarautores.php?id_autor=".$filas ['id_autor']."'
    onclick='return confirmar()'>Eliminar</a>"; ?>
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