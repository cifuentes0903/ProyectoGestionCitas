<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Gestion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <!-- Grey with black text -->
<nav nav class="navbar navbar-expand-sm bg-dark navbar-dark"">
  <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="Fcurso.php">Cursos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="FAprendiz.php">Aprendices</a>
    </li>
   <li class="nav-item">
         <a href="cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
    </li>
          
     </ul>
</nav>
           <center>
                   <h1>Pagina Aprendiz</h1></center>
				
			
				<?php
				session_start();

				if(!$_SESSION['verificar']){
                                header("Location: index.php");
                                }
				
				?>
                                    <center>	Bienvenido,
				<?php
						echo $_SESSION['apren_login'];
				
				?>
                                    </center> 
                                         
               
                                         <br>
        <br>
        
        <div class="container">
 <h1 style="color:blue;text-align:center;">LISTADO DE PROGRAMAS</h1>
          
  <table class="table table-dark">
    <thead>
      <tr>
        <th>CODIGO</th>
        <th>NOMBRE DEL PROGRAMA</th>
        
      </tr>
    </thead>
    <tbody>
      <?php

      $Conexion = mysqli_connect("localhost","root","","gestionsena2022") or 
                  die("Problemas con la conexion");
      $Resultado = mysqli_query($Conexion,"SELECT * FROM programa")or die("Problemas al consultar la tabla".mysqli_error($Conexion));

          while($registro=mysqli_fetch_array($Resultado)){
      ?>
        <tr>
          <th><?php echo $registro['Codigo'];?></th>
          <th><?php echo $registro['NombreP'];?></th>
        </tr>      
    <?php } ?>
    </tbody>
  </table>
</div>
        <div class="container">
 <h1 style="color:blue;text-align:center;">LISTADO DE APRENDICES</h1>
          
  <table class="table table-dark">
    <thead>
      <tr>
        <th>CODIGO</th>
        <th>NOMBRE DEL APRENDIZ</th>
           <th>APELLIDO DEL APRENDIZ</th>
              <th>EMAIL DEL APRENDIZ</th>
                 <th>PROGRAMA DE FORMACION</th>
      </tr>
    </thead>
    <tbody>
     <?php
      $Conexion = mysqli_connect("localhost","root","","gestionsena2022") or die("Problemas con la conexion");
      $consulta = mysqli_query($Conexion,"SELECT apre.CodigoA as Codigo,NombreA,ApellidoA,EmailA,CodigoProg,NombreP FROM aprendices as apre inner join programa as pro on pro.Codigo=apre.CodigoProg")or die("problemas al  consultar tabla".mysqli_error($Conexion));

      while($registro=mysqli_fetch_array($consulta)){
        ?>
        <tr>
          <th><?php echo $registro['Codigo'] ;?></th>
          <th><?php echo $registro['NombreA'];?></th>
          <th><?php echo $registro['ApellidoA'];?></th>
          <th><?php echo $registro['EmailA'];?></th>
          <th><?php echo $registro['NombreP'];?></th>

        </tr>
      <?php } ?>
    
    </tbody>
  </table>
</div>

       
    </body>
</html>
