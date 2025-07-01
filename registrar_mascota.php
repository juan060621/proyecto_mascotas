<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $ciudad = $_POST["ciudad"];
    $descripcion = $_POST["descripcion"];
    $foto = $_FILES["foto"]["name"];
    $temp = $_FILES["foto"]["tmp_name"];
    move_uploaded_file($temp, "fotos/" . $foto);

    $id_usuario = 1; 

    $sql = "INSERT INTO mascotas (nombre, ciudad, descripcion, foto, id_usuario) 
            VALUES ('$nombre', '$ciudad', '$descripcion', '$foto', $id_usuario)";
    $conexion->query($sql);
    echo "Mascota registrada.";
}
?>

<form method="post" enctype="multipart/form-data">
    Nombre: <input type="text" name="nombre"><br>
    Ciudad: <input type="text" name="ciudad"><br>
    Descripción: <textarea name="descripcion"></textarea><br>
    Foto: <input type="file" name="foto"><br>
    <input type="submit" value="Registrar Mascota">
</form>
