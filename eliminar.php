<?php
    $id=$_GET['id'];
    include("conexion.php");

    // eliminar registro
    $sql="delete from libros where id='".$id."'";
    $resultado=mysqli_query($conexion,$sql);
    if ($resultado) {
        echo "<script>
                alert('Los datos se eliminaron correctamente');
                setTimeout(function() {
                    location.assign('index2.php');
                }, 500);  // 500 milisegundos de espera
              </script>";
    } else {
        echo "<script>
                alert('ERROR: Los datos no se eliminaron');
                setTimeout(function() {
                    location.assign('index2.php');
                }, 500);
              </script>";
    }
?>