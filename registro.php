<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $clave = password_hash($_POST["clave"], PASSWORD_DEFAULT);
    $rol = $_POST["rol"];

    $sql = "INSERT INTO usuarios (nombre, email, clave, rol) VALUES ('$nombre', '$email', '$clave', '$rol')";
    $conexion->query($sql);
    echo "Usuario registrado.";
}
?>

<form method="post">
    Nombre: <input type="text" name="nombre"><br>
    Email: <input type="email" name="email"><br>
    Clave: <input type="password" name="clave"><br>
    Rol:
    <select name="rol">
        <option value="adoptante">Adoptante</option>
        <option value="publicador">Publicador</option>
    </select><br>
    <input type="submit" value="Registrar">
</form>
