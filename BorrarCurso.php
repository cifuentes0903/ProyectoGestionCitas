<?php
$Conexion = mysqli_connect("localhost","root","","gestionsena2022")or
die("Problemas con la conexion");

$Borrado = mysqli_query($Conexion,"SELECT NombreP FROM programa WHERE Codigo = '$_REQUEST[txtborrado]'") or ("Problemas en el select:".mysqli_error($Conexion));

if($fila = mysqli_fetch_array($Borrado))
{
	mysqli_query($Conexion, "DELETE FROM programa WHERE Codigo = '$_REQUEST[txtborrado]'") or("Problemas en el select:".mysqli_error($Conexion));
	   echo "Eliminación exitosa";
}else {
      echo "No existe el programa ";	
}


?>
