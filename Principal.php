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
                   <h1>Pagina Administrativa</h1></center>
				
			
				<?php
				session_start();

				if(!$_SESSION['verificar']){
                                header("Location: index.php");
                                }
				
				?>
                                    <center>	Bienvenido,
				<?php
						echo $_SESSION['admin_login'];
				
				?>
                                    </center>  
                                         <br>
        <br>
      
        <div class="container">
 <h1 style="color:blue;text-align:center;">LISTADO DE USUARIOS</h1>
          
  <table class="table table-dark">
    <thead>
      <tr>
        <th>USUARIO</th>
        <th>EMAIL</th>
        <th>ROL</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $Conexion = mysqli_connect("localhost","root","","gestionsena2022") or 
                  die("Problemas con la conexion");
      $Resultado = mysqli_query($Conexion,"SELECT * FROM usuario")or die("Problemas al consultar la tabla".mysqli_error($Conexion));

          while($registro=mysqli_fetch_array($Resultado)){
      ?>
        <tr>
          <th><?php echo $registro['usuario'];?></th>
          <th><?php echo $registro['Email'];?></th>
          <th><?php echo $registro['Rol'];?></th>
        </tr>      
    <?php } ?>
    </tbody>
  </table>
</div>
         <br>
        <br>
      
        <div class="container">
 <h1 style="color:blue;text-align:center;">REPORTES DEL SISTEMA</h1>
          
  <table class="table table-dark">
    <thead>
      <tr>
        <th>Reporte x usuario</th>
        <th>Reporte x curso</th>
        <th>Reporte x Aprendiz</th>
        <th>Reporte x Aprendices x Curso</th>
        
      </tr>
    </thead>
    <tbody>
     
        <tr>

          <th> <a href="Formulariopdf.php"><button class="btn btn-warning text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Reportes</button></a></th>
          <th> <a href=""><button class="btn btn-primary text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Reportes</button></a></th>
          <th> <a href=""><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Reportes</button></a></th>
          <th> <a href=""><button class="btn btn-info text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Reportes</button></a></th>
          
        </tr>      
  
    </tbody>
  </table>
        </div>

       
    </body>
</html>
