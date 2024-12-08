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
        if(isset($_POST['enviar'])){
            // aqui entra cuando se presiona el boton de enviar
            $id=$_POST['id'];
            $autor = $_POST['id_autor'];
            $libro = $_POST['nombre_libro'];
            $editorial = $_POST['editorial'];
            $fechaPubli = $_POST['fecha_publi'];
            
            //  vacio ""

            // if ($vista===""){
            //     update libro set autor, libro, editorial, fechapubli where id =1
            // }else {
            //     select vista from libro where id =1
            //     ejecute la consulta
            //     $fila =mysql_fecth_Asocc(ejecutar)
            //     unlink(.pdf/$fila['vista']);

            //     update libro set autor, libro, editorial, fechapubli, vista where id =1

            // }



            // update libros set
            $sql="update libros set id_autor='".$autor."',
                nombre_libro='".$libro."',
                editorial='".$editorial."',
                fecha_publi='".$fechaPubli."' 
                where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);

            
            if ($resultado) {
                echo "<script>
                        alert('Los datos se actualizaron correctamente');
                        setTimeout(function() {
                            location.assign('index2.php');
                        }, 500);  // 500 milisegundos de espera
                      </script>";
            } else {
                echo "<script>
                        alert('ERROR: Los datos no se actualizaron');
                        setTimeout(function() {
                            location.assign('index2.php');
                        }, 500);
                      </script>";
            }
            
        mysqli_close($conexion);

        }else{
            // aqui entra si no se ha presionado el boton enviar
            $id=$_GET['id'];
            $sql="select * from libros where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);

            $fila=mysqli_fetch_assoc($resultado);
            $autor=$fila["id_autor"];
            $libro=$fila["nombre_libro"];
            $editorial=$fila["editorial"];
            $fechaPubli=$fila["fecha_publi"];
            

            mysqli_close($conexion);

    ?>
    <h1>Editar libro</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Autor</label>
        <input type="text" name="id_autor"
        value="<?php echo $autor; ?>"><br>
        <label>Nombre del libro</label>
        <input type="text" name="nombre_libro"
        value="<?php echo $libro; ?>"><br>
        <label>Editorial</label>
        <input type="text" name="editorial"
        value="<?php echo $editorial; ?>"><br>
        <label>Fecha de publicacion</label>
        <input type="text" name="fecha_publi"
        value="<?php echo $fechaPubli; ?>"><br>
   

        <input type="hidden" name="id"
        value="<?php echo $id; ?>">

        <input type="submit" name="enviar" value="Actualizar">
        <a href="index2.php">Regresar</a>
    </form>
    <?php
        }
    ?>
</body>
</html>