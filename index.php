<html>
     <head>
        <meta charset="utf-8">
        <title>Index</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <div class="login-formulario">
        <center><h2>Iniciar sesión</h2></center>
        <form method="POST" action="" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-6 text-left">EMAIL</label>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" name="txtemail" class="form-control" placeholder="Ingresar su usuario">
                        
                    </div>
                   </div>
            </div>
            <div class="form-group">
                <label class="col-sm-6 text-left">CONTRASEÑA</label>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" name="txtcontrasena" class="form-control" placeholder="Ingresar su contraseña">
                        
                    </div>
                   </div>
            </div>
            <div class="form-group">
                <label class="col-sm-6 text-left">SELECCIONAR ROL</label>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control" name="txtrol">
                            <option value="" selected="selected">-Seleccionar rol</option>
                            <option value="admin">ADMINISTRADOR</option>
                            <option value="aprendiz">APRENDIZ</option>
                            <option value="instructor">INSTRUCTOR</option>
                        </select>
                        </div>
                   </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-12">
                     <input type="submit" class="btn btn-danger d-block mx-auto"  value="Iniciar Sesión" name="btn_login"> 
                    
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-12">
                    ¿No tienes una cuenta?<a href="Fregistro.php"><p class="text-info">Registrar cuenta</p></a>  
                </div>
                
            </div>
        </form>
        
        
        
        
    </div>
</html>

<?php
require_once 'Conexion.php';
session_start();
if(isset($_SESSION["admin_login"]))	
{
	header("location:Principal.php");	
}
if(isset($_SESSION["apren_login"]))	
{
	header("location:PAprendiz.php"); 
}
if(isset($_SESSION["instructor_login"]))
{
	header("location:PInstructor.php");
}

if(isset($_REQUEST['btn_login']))	
{
	$email1		=$_REQUEST["txtemail"];	//textbox nombre "txt_email"
	$password1	=$_REQUEST["txtcontrasena"];	//textbox nombre "txt_password"
	$role1		=$_REQUEST["txtrol"];		//select opcion nombre "txt_role"
		
	if(empty($email1)){						
		$errorMsg[]="Por favor ingrese Email";	//Revisar email
	}
	else if(empty($password1)){
		$errorMsg[]="Por favor ingrese Password";	//Revisar password vacio
	}
	else if(empty($role1)){
		$errorMsg[]="Por favor seleccione rol ";	//Revisar rol vacio
	}
	else if($email1 AND $password1 AND $role1)
	{
		try
		{
			$select_stmt=$db->prepare("SELECT Email,Password1,Rol FROM usuario
										WHERE
										Email=:uemail AND Password1=:upassword AND Rol=:urole"); 
			$select_stmt->bindParam(":uemail",$email1);
			$select_stmt->bindParam(":upassword",$password1);
			$select_stmt->bindParam(":urole",$role1);
			$select_stmt->execute();	
					
			while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))	
			{
				$dbemail	=$row["Email"];
				$dbpassword	=$row["Password1"];
				$dbrole		=$row["Rol"];
			}
			if($email1!=null AND $password1!=null AND $role1!=null)	
			{
				if($select_stmt->rowCount()>0)
				{
					if($email1==$dbemail and $password1==$dbpassword and $role1==$dbrole)
					{
						switch($dbrole)		
						{
							case "admin":
								$_SESSION["admin_login"]=$email1;
                                                                $_SESSION['verificar']=true;
								$loginMsg="Admin: Inicio sesión con éxito";	
								header("refresh:3;Principal.php");	
								break;
                                                            case "aprendiz";
								$_SESSION["apren_login"]=$email1;
                                                                $_SESSION['verificar']=true;
								$loginMsg="aprendiz: Inicio sesión con éxito";		
								header("refresh:3;PAprendiz.php");	
								break;
								
							case "instructor":
								$_SESSION["instructor_login"]=$email1;
                                                                $_SESSION['verificar']=true;
								$loginMsg="instructor: Inicio sesión con éxito";	
								header("refresh:3;PInstructor.php");		
								break;	
							
							
								
							default:
								$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
						}
					}
					else
					{
						$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
					}
				}
				else
				{
					$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
				}
			}
			else
			{
				$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}		
	}
	else
	{
		$errorMsg[]="correo electrónico o contraseña o rol incorrectos";
	}
//}

                        
    }
                
?>
<?php
		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong><?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($loginMsg))
		{
		?>
			<div class="alert alert-success">
				<strong>ÉXITO ! <?php echo $loginMsg; ?></strong>
			</div>
        <?php
		}
		?> 
