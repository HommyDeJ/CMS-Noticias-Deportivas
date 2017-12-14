<?php
header('Content-Type: text/xml');
echo '<markers>';
include ("conexion.php");
$sql=mysqli_query($con,"select * from miembro ORDER BY id");

while($row=mysqli_fetch_array($sql))
{
	echo "<marker id ='".$row['id']."' nombre='".$row['nombre']."' telefono='".$row['telefono']."' email='".$row['email']."' foto='".$row['foto']."' lat='".$row['latitud']."' lng='".$row['longitud']."'>\n";
	echo "</marker>\n";
}

echo "</markers>\n";

?>
