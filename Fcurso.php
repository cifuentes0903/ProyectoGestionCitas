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
      <a class="nav-link" href="#">Cursos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="FAprendiz.php">Aprendices</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php">Inicio</a>
    </li>
     </ul>
</nav>
        <div class="col-sm-6 offset-sm-3">
            <div class="panel-body">
               <h1 style="color:blue;text-align:center;">REGISTRAR PROGRAMAS</h1>
                <form action="RegistroCurso.php" method="POST" >
                    
                    <label>Nombre del programa:</label>
                    <input name="Txtcurso" class="form-control" type="text" placeholder="Ingresar nombre del programa">
                    <p></p>
                    
                    <input type="submit" class="btn btn-success d-block mx-auto"  value="Registrar" name="control">
                </form>
    </div>

                <div class="panel-body">
                <h1 style="color:blue;text-align:center;">BORRAR PROGRAMAS</h1>
                <form action="BorrarCurso.php" method="POST">
                    <label>Busqueda programa</label>
                    <input type="text" class="form-control" name="txtborrado" placeholder="Ingresar nombre del programa a eliminar">
                     <p></p>
                    
                     <input type="submit" class="btn btn-danger d-block mx-auto" name="control" value="Borrar">


                </form>
                </div> 


                <div class="panel-body">
                <h1 style="color:blue;text-align:center;">ACTUALIZAR PROGRAMAS</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <label>Actualizar programa</label>
                    <input type="text" class="form-control" name="txtconsultar" placeholder="Ingresar nombre del programa a eliminar">
                     <p></p>
                    
                     <input type="submit" class="btn btn-success d-block mx-auto" name="control" value="Actualizar">
                </form>
                </div>       

                <?php
                error_reporting(0);
                $Conexion= mysqli_connect("localhost","root","","gestionsena2022")or die("problemas con la conexion");

                $registro = mysqli_query($Conexion,"SELECT * FROM programa WHERE Codigo='$_REQUEST[txtconsultar]'")or die("Problemas con el select".mysqli_error($Conexion));

                if($reg = mysqli_fetch_array($registro)) {
                    ?>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                     <label>Codigo del programa</label>
                    <input type="text" class="form-control" name="txtcod" value="<?php echo $reg['Codigo'];?>"> 
                    <label>Nombre del programa</label>
                    <input type="text" class="form-control" name="txtnomp" value="<?php echo $reg['NombreP'];?>"> 
                     <input type="submit" class="btn btn-success d-block mx-auto" name="control" value="Modificar">     
                    </form>

                <?php
                 }else{
                    echo "No existe el programa";
                 }

                if(mysqli_query($Conexion,"UPDATE programa set NombreP = '$_REQUEST[txtnomp]'
                    WHERE Codigo='$_REQUEST[txtcod]'")or die("Problemas en el select:".mysqli_error($Conexion))){;

                  echo "Programa actualizado";

                }else
                {
                    echo "programa no actualizado";
                }

                 ?>


                

        

       
    </body>
</html>
