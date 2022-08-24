<?php
 $Conexion = mysqli_connect("localhost","root","","gestionsena2022")or 
         die("Problemas con la conexion");
 
 mysqli_query($Conexion,"INSERT INTO aprendices(NombreA,ApellidoA,EmailA,CodigoProg) VALUES ('$_REQUEST[Txtnombrea]','$_REQUEST[Txtapellidoa]','$_REQUEST[Txtcorreo]','$_REQUEST[txtprograma]')")or
         die("Problemas al insertar". mysqli_error($Conexion));
 echo "aprendiz registrado";
?>