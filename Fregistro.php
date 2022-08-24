<html>
     <head>
        <meta charset="utf-8">
        <title>Index</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
        <title>REGISTRO</title>
        
    </head>
    <div class="login-registro">
        <center><h2>Registro de usuario</h2></center>
        <form method="POST" action="" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-6 text-left">USUARIO</label>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" name="txtusuario" class="form-control" placeholder="Ingresar su usuario">
                        
                    </div>
                   </div>
            </div>
            <div class="form-group">
                <label class="col-sm-6 text-left">EMAIL</label>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" name="txtemailu" class="form-control" placeholder="Ingresar su email">
                        
                    </div>
                   </div>
            </div>
            <div class="form-group">
                <label class="col-sm-6 text-left">CONTRASEÑA</label>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" name="txtpass" class="form-control" placeholder="Ingresar su contraseña">
                        
                    </div>
                   </div>
            </div>
            <div class="form-group">
                <label class="col-sm-6 text-left">SELECCIONAR ROL</label>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control" name="txtrol1">
                            <option value="" selected="selected">-Seleccionar rol</option>
                            <option value="aprendiz">APRENDIZ</option>
                            <option value="instructor">INSTRUCTOR</option>
                        </select>
                        </div>
                   </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-12">
                     <input type="submit" class="btn btn-warning d-block mx-auto"  value="Registro" name="btn_registro"> 
                    
                </div>
            </div>
            
            
        </form>
        
        
        
        
    </div>
</html>

<?php
require_once "Conexion.php" ;
 error_reporting(0);
if(isset($_REQUEST['btn_registro']))
{
	$username	= $_REQUEST['txtusuario'];	
	$email		= $_REQUEST['txtemailu'];	
	$password	= $_REQUEST['txtpass'];	
	$role		= $_REQUEST['txtrol1'];	
		
	if(empty($username)){
		$errorMsg[]="Ingrese nombre de usuario";	
	}
	else if(empty($email)){
		$errorMsg[]="Ingrese email";	
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errorMsg[]="Ingrese email valido";	
	}
	else if(empty($password)){
		$errorMsg[]="Ingrese password";
	}
	else if(strlen($password) < 6){
		$errorMsg[] = "Password minimo 6 caracteres";	
	}
	else if(empty($role)){
		$errorMsg[]="Seleccione rol";	
	}
	else
	{	
		try
		{	
			$select_stmt=$db->prepare("SELECT usuario, Email FROM usuario
										WHERE usuario=:uname OR Email=:uemail"); 
			$select_stmt->bindParam(":uname",$username);   
			$select_stmt->bindParam(":uemail",$email);     
			$select_stmt->execute();
			$fila=$select_stmt->fetch(PDO::FETCH_ASSOC);	
			if($fila["usuario"]==$username){
				$errorMsg[]="Usuario ya existe";	
			}
			else if($fila["Email"]==$email){
				$errorMsg[]="Email ya existe";	
			}
			
			else if(!isset($errorMsg))
			{
				$insert_stmt=$db->prepare("INSERT INTO usuario(usuario,Email,Password1,Rol) VALUES(:uname,:uemail,:upassword,:urole)"); 			
				$insert_stmt->bindParam(":uname",$username);	
				$insert_stmt->bindParam(":uemail",$email);	  		
				$insert_stmt->bindParam(":upassword",$password);
				$insert_stmt->bindParam(":urole",$role);
				
				if($insert_stmt->execute())
				{
					$registerMsg="Registro exitoso: Esperar página de inicio de sesión"; 
					header("refresh:2;index.php"); 
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

?>
	
		<?php
                error_reporting(0);
		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong>INCORRECTO ! <?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($registerMsg))
		{
		?>
			<div class="alert alert-success">
				<strong>EXITO ! <?php echo $registerMsg; ?></strong>
			</div>
        <?php
		}
		?> 