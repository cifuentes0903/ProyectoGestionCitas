
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
                    <a class="nav-link" href="">Aprendices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
            </ul>
        </nav>
        <div class="col-sm-6 offset-sm-3">
            <div class="panel-body">
                <h1 style="color:blue;text-align:center;">REGISTRAR APRENDICES</h1>
                <form action="RegistroAprendiz.php" method="POST" >

                    <label>Nombre del aprendiz:</label>
                    <input name="Txtnombrea" class="form-control" type="text" placeholder="Ingresar nombre del aprendiz">
                    <p></p>
                    <label>Apellido del aprendiz:</label>
                    <input name="Txtapellidoa" class="form-control" type="text" placeholder="Ingresar apellido del aprendiz">
                    <p></p>
                    <label>Correo del aprendiz:</label>
                    <input name="Txtcorreo" class="form-control" type="email" placeholder="Ingresar Email del aprendiz">
                    <p></p>
                    <?php
                     $Conexion = mysqli_connect("localhost","root","","gestionsena2022") or 
                  die("Problemas con la conexion");
                     ?>
                     <label for="sel1">Programa de formacion:</label>
                        <select class="form-control" name="txtprograma">
                            <?php
                     $sql = "SELECT Codigo,NombreP FROM programa LIMIT 10";
                     $Resultado = mysqli_query($Conexion,$sql)or die("error en la tabla:".mysqli_error($Conexion));
                     while($filas = mysqli_fetch_assoc($Resultado)){
                        ?>
                        <option value="<?php echo $filas["Codigo"]; ?>"><?php echo $filas["NombreP"]; ?></option>
                    <?php } ?>
                        
                        </select>
                    </div>
                    
                    

                    <input type="submit" class="btn btn-danger d-block mx-auto"  value="Registrar" name="control">
                </form>    


            </div>

             <div class="panel-body">
                <h1 style="color:blue;text-align:center;">BORRAR APRENDIZ</h1>
                <form action="BorrarAprendiz.php" method="POST">
                    <label>Busqueda Aprendiz</label>
                    <input type="text" class="form-control" name="txtborrado" placeholder="Ingresar del aprendiz">
                     <p></p>
                    
                     <input type="submit" class="btn btn-danger d-block mx-auto" name="control" value="Borrar">


                </form>
                </div> 


                <div class="panel-body">
                <h1 style="color:blue;text-align:center;">ACTUALIZAR APRENDIZ</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <label>Actualizar Aprendiz</label>
                    <input type="text" class="form-control" name="txtconsultar" placeholder="Ingresar nombre del aprendiz">
                     <p></p>
                    
                     <input type="submit" class="btn btn-success d-block mx-auto" name="control" value="Actualizar">
                </form>
                </div>       

                <?php
                error_reporting(0);
                $Conexion= mysqli_connect("localhost","root","","gestionsena2022")or die("problemas con la conexion");

                $registro = mysqli_query($Conexion,"SELECT * FROM aprendices WHERE CodigoA='$_REQUEST[txtconsultar]'")or die("Problemas con el select".mysqli_error($Conexion));

                if($reg = mysqli_fetch_array($registro)) {
                    ?>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                     <label>Nombre del aprendiz:</label>
                    <input name="Txtnombrea" class="form-control" type="text" placeholder="Ingresar nombre del aprendiz"value="<?php echo $reg['NombreA'];?>">
                    <p></p>
                    <label>Apellido del aprendiz:</label>
                    <input name="Txtapellidoa" class="form-control" type="text" placeholder="Ingresar apellido del aprendiz" value=""<?php echo $reg['ApellidoA'];?>">
                    <p></p>
                    <label>Correo del aprendiz:</label>
                    <input name="Txtcorreo" class="form-control" type="email" placeholder="Ingresar Email del aprendiz"value=""<?php echo $reg['EmailA'];?>">
                    <p></p>
                    <?php
                     $Conexion = mysqli_connect("localhost","root","","gestionsena2022") or 
                  die("Problemas con la conexion");
                     ?>
                     <label for="sel1">Programa de formacion:</label>
                        <select class="form-control" name="txtprograma">
                            <?php
                     $sql = "SELECT Codigo,NombreP FROM programa LIMIT 10";
                     $Resultado = mysqli_query($Conexion,$sql)or die("error en la tabla:".mysqli_error($Conexion));
                     while($filas = mysqli_fetch_assoc($Resultado)){
                        ?>
                        <option value="<?php echo $filas["Codigo"]; ?>"><?php echo $filas["NombreP"]; ?></option>
                    <?php } ?>
                        
                        </select>
                    </div>
                        <input type="submit" class="btn btn-success d-block mx-auto" name="control" value="Modificar">            
         
                    </form>

                <?php
                 }else{
                    echo "No existe el programa";
                 }

                if(mysqli_query($Conexion,"UPDATE aprendices set NombreA,ApellidoA,EmailA,CodigoProg = '$_REQUEST[Txtnombrea]','$_REQUEST[Txtapellidoa]','$_REQUEST[Txtcorreo]','$_REQUEST[txtprograma]'
                    WHERE CodigoA='$_REQUEST[txtconsultar]'")or die("Problemas en el select:".mysqli_error($Conexion))){;

                  echo "Programa actualizado";

                }else
                {
                    echo "programa no actualizado";
                }

                 ?>



    </body>
</html>

