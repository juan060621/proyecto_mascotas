<?php
include "conexion.php";

$filtro = isset($_GET["ciudad"]) ? $_GET["ciudad"] : "";
$busqueda = isset($_GET["buscar"]) ? $_GET["buscar"] : "";

$sql = "SELECT * FROM mascotas WHERE 1";
if ($filtro != "") $sql .= " AND ciudad LIKE '%$filtro%'";
if ($busqueda != "") $sql .= " AND (nombre LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%')";

$resultado = $conexion->query($sql);
?>

<form method="get">
    Ciudad: <input type="text" name="ciudad" value="<?= $filtro ?>">
    Buscar: <input type="text" name="buscar" value="<?= $busqueda ?>">
    <input type="submit" value="Filtrar">
</form>

<?php while ($fila = $resultado->fetch_assoc()): ?>
    <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
        <img src="fotos/<?= $fila['foto'] ?>" width="100"><br>
        <strong><?= $fila['nombre'] ?></strong> - <?= $fila['ciudad'] ?><br>
        <?= $fila['descripcion'] ?>
    </div>
<?php endwhile; ?>
