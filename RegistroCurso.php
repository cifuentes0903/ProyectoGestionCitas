<?php
 $Conexion = mysqli_connect("localhost","root","","gestionsena2022")or 
         die("Problemas con la conexion");
 
 mysqli_query($Conexion,"INSERT INTO programa(NombreP) VALUES ('$_REQUEST[Txtcurso]')")or
         die("Problemas al insertar". mysqli_error($Conexion));
 echo "Programa registrado";
?>
