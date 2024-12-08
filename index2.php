<?php
    include ('conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de libros</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estás seguro de que quieres eliminar los datos?');
        }
    </script>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <table>
            <tr>
                <th colspan="9"><h1>Lista de libros</h1></th>
            </tr>
            <tr>
                <td>
                    <label>Libro:</label>
                    <input type="text" name="nombre_libro">
                </td>
                <td>
                    <label>Editorial:</label>
                    <input type="text" name="editorial">
                </td>
                <td>
                    <input type="submit" name="enviar" value="BUSCAR">
                </td>
                <td>
                    <a href="index2.php">Mostrar todos los libros</a>
                </td>
                <td>
                    <a href="agregar.php">Nuevo Libro</a>
                </td>
                <td>
                    <a href="autores.php">Bibliografías</a>
                </td>
                <td>
                    <a href="portada.php">Inicio</a>
                </td>
            </tr>
        </table>
    </form>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Autor</th>
                <th>Nombre del libro</th>
                <th>Editorial</th>
                <th>Fecha de publicación</th>
                <th>Formato</th>
                <th>Libro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($_POST['enviar'])){
                    // Procesa la búsqueda
                    $nombre = $_POST['nombre_libro'];
                    $editorial = $_POST['editorial'];
                    $sql = "";

                    if(empty($nombre) && empty($editorial)){
                        echo "<script>
                            alert('Ingrese el nombre del libro o la editorial que desea buscar');
                            setTimeout(function() {
                                location.assign('index2.php');
                            }, 0);
                        </script>";
                    } else {
                        if(empty($nombre)){
                            $sql = "SELECT * FROM libros WHERE editorial = '$editorial'";
                        } elseif(empty($editorial)){
                            $sql = "SELECT * FROM libros WHERE nombre_libro LIKE '%$nombre%'";
                        } else {
                            $sql = "SELECT * FROM libros WHERE editorial = '$editorial' AND nombre_libro LIKE '%$nombre%'";
                        }
                    }
                    
                    // Ejecuta la consulta solo si $sql tiene contenido
                    if ($sql != "") {
                        $resultado = mysqli_query($conexion, $sql);

                        if ($resultado && mysqli_num_rows($resultado) > 0) {
                            while($filas = mysqli_fetch_assoc($resultado)){
                                ?>
                                <tr>
                                    <td> <?php echo $filas['id']; ?> </td>
                                    <td> <?php echo $filas['id_autor']; ?> </td>
                                    <td> <?php echo $filas['nombre_libro']; ?> </td>
                                    <td> <?php echo $filas['editorial']; ?> </td>
                                    <td> <?php echo $filas['fecha_publi']; ?> </td>
                                    <td> <?php echo $filas['vista_previa']; ?></td>
                                    <td> <a href="./pdf/<?php echo $filas['vista_previa']; ?>">Download</a></td>
                                    <td>
                                        <?php echo "<a href='editar.php?id=".$filas['id']."'>Editar</a>"; ?>
                                        <p></p>
                                        <?php echo "<a href='eliminar.php?id=".$filas['id']."' onclick='return confirmar()'>Eliminar</a>"; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='9'>No se encontraron resultados.</td></tr>";
                        }
                    }
                } else {
                    // Muestra todos los libros si no hay búsqueda activa
                    $sql = "SELECT * FROM libros";
                    $resultado = mysqli_query($conexion, $sql);

                    if ($resultado) {
                        while($filas = mysqli_fetch_assoc($resultado)){
                            ?>
                            <tr>
                                <td> <?php echo $filas['id']; ?> </td>
                                <td> <?php echo $filas['id_autor']; ?> </td>
                                <td> <?php echo $filas['nombre_libro']; ?> </td>
                                <td> <?php echo $filas['editorial']; ?> </td>
                                <td> <?php echo $filas['fecha_publi']; ?> </td>
                                <td> <?php echo $filas['vista_previa']; ?></td>
                                <td> <a href="./pdf/<?php echo $filas['vista_previa']; ?>">Ver Libro</a></td>
                                <td>
                                    <?php echo "<a href='editar.php?id=".$filas['id']."'>Editar</a>"; ?>
                                    <p></p>
                                    <?php echo "<a href='eliminar.php?id=".$filas['id']."' onclick='return confirmar()'>Eliminar</a>"; ?>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='9'>Error al obtener los datos.</td></tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>
