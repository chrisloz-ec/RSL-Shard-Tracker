<?php 

session_start();

require_once "php/Autenticacion.php";
require_once "php/Clases.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

require_once "php/ValidacionSesion.php";

if ($isLoggedIn) {
    $util->redirect("PanelControl.php");
}

if (! empty($_POST["signup"])) {
	$isAuthenticated = false;
	if(strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['password_r']) >= 1 ){
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$password_r = trim($_POST['password_r']);
	}
	error_reporting(0);
	$user_name = $auth->getMemberByUsername($username);
	$user_email = $auth->getMemberByEmail($email);

	if($user_name[0]["usuario_nombre"] == $username){
		$mensaje = "Nombre de usuario ya registrado";
	}
	elseif($user_email[0]["usuario_email"] == $email){
		$mensaje = "Correo ya registrado";
	}
	elseif($password != $password_r){
		$mensaje = "Las contraseñas no coinciden";
	}
	else{
		//admin@admin.com
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO `usuarios`(`usuario_nombre`, `usuario_password`, `usuario_email`) VALUES (?, ?, ?)";
		$success = $db_handle->insert($query, 'sss', array($username, $password_hash, $email));
		
			$_SESSION["registrado"] = 1;
			echo '
			<div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 11">
			  <div id="toastRegister" class="toast text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
			    <div class="d-flex">
				    <div class="toast-body">
				      Usuario registrado con éxito.</br>
				      Redirigiendo a iniciar sesión...
				    </div>
				    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
				  </div>
			  </div>
			</div>';

	}



/*
  if ($password == $password_r) {
      
    	$util->redirect("PanelControl.php");
  } else {
      $mensaje = "Contraseñas no coinciden, Por favor intente nuevamente.";
  }
*/
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registrarse</title>
	<link rel="icon" type="image/x-icon" href="img/RAID-Logo.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/style.css?v=<?php echo(rand()); ?>">
</head>
<body>
	<div class="container ">
		<div class="row justify-content-center align-items-center vh-100 ">
			<div class="col-md-6">
				<div class="login-box">
					<div class="login-snip">
						<div class="">
							<div class="card-header">
								<img src="img/RAID_white.png" class="img-fluid rounded mx-auto d-block" alt="Logo Raid" width="150">
								<p class="text-center text-white fw-bold mb-0">Shard Tracker</p>
							</div>
							<div class="card-body text-white">
								<form action="" method="post" id="frmLogin">
									<p class="fs-5">Register</p>
									<div class="error-mensaje"><?php if(isset($mensaje)) { echo $mensaje; } ?></div>
									<!--
									<div class="row">
								    <div class="col">
								      <div class="form-group user-box">
												<input type="text" id="name" name="name" required="">
												<label for="name">Nombre</label>
											</div>
								    </div>
								    <div class="col">
								      <div class="form-group user-box">
												<input type="text" id="lastname" name="lastname" required="">
												<label for="lastname">Apellido</label>
											</div>
								    </div>
								  </div>
									-->
									<div class="form-group user-box">
										<input type="text" id="username" name="username" required="" value="<?php if(isset($_COOKIE["login_usuario"])) { echo $_COOKIE["login_usuario"]; } ?>">
										<label for="username">Username</label>
									</div>
									<div class="form-group user-box">
										<input type="email" id="email" name="email" required="" value="<?php if(isset($_COOKIE["login_usuario"])) { echo $_COOKIE["login_usuario"]; } ?>">
										<label for="email">Email</label>
									</div>
									<div class="row">
								    <div class="col">
								      <div class="form-group user-box">
												<input type="password" class="password" id="password" name="password" required="">
												<span class="fa-solid fa-eye text-muted password-icon show-password"></span>
												<label for="password">Password</label>
											</div>
								    </div>
								    <div class="col">
								     	<div class="form-group user-box">
												<input type="password" class="password" id="password_r" name="password_r" required="">
												<label for="password_r">Repeat password</label>
											</div>
								    </div>
								  </div>
									<input type="submit" name="signup" value="Sign Up" class="btn btn-primary"> 
								</form>
								<div class="col-sm-12 pt-3 text-right">
			            <p>Already registered? <a href="LogIn.php">Sign In</a></p>
			          </div>
							</div>
						</div>

				</div>
			</div>
		</div>





	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<script src="js/password-hide.js"></script>
	<script src="js/jquery.validate.min.js"></script> 
	<script src="js/ValidarRegistro.js"></script> 
</body>
</html>

<script type="text/javascript">
	
$(document).ready(function(){
	<?php 
	if($_SESSION["registrado"] == 1){ 
		unset($_SESSION["registrado"]); 
		?>
  	$("#toastRegister").toast("show");
  	setTimeout( function() { window.location.href = "LogIn.php"; }, 3000 );
	  <?php 
	} 
	?>
});
</script>