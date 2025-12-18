<?php 

session_start();
//require_once 'php/dbconnect.php'; 

require_once "php/Autenticacion.php";
require_once "php/Clases.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

require_once "php/ValidacionSesion.php";

if ($isLoggedIn) {
    $util->redirect("PanelControl.php");
}

if (! empty($_POST["login"])) {
	$isAuthenticated = false;
	if(strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1 ){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
	}
	$user = $auth->getMemberByUsername($username);
	error_reporting(0);
	if (password_verify($password, $user[0]["usuario_password"])) {
  	$isAuthenticated = true;
  }

  if ($isAuthenticated) {
      $_SESSION["usuario_id"] = $user[0]["usuario_id"];
      
      // Set Auth Cookies if 'Remember Me' checked
      if (! empty($_POST["remember"])) {
        setcookie("login_usuario", $username, $cookie_expiration_time);
        
        $random_password = $util->getToken(16);
        setcookie("random_password", $random_password, $cookie_expiration_time);
        
        $random_selector = $util->getToken(32);
        setcookie("random_selector", $random_selector, $cookie_expiration_time);
        
        $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
        $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);
        
        $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
        
        // mark existing token as expired
        $userToken = $auth->getTokenByUsername($username, 0);
        if (! empty($userToken[0]["id"])) {
            $auth->markAsExpired($userToken[0]["id"]);
        }
        // Insert new token
        $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
    } else {
        $util->clearAuthCookie();
    }
    $util->redirect("PanelControl.php");
  } else {
      $mensaje = "Credenciales incorrectas, Por favor intente nuevamente.";
  }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Iniciar sesión</title>
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
									<p class="fs-5">Sign In</p>
									<div class="error-mensaje"><?php if(isset($mensaje)) { echo $mensaje; } ?></div>
									<div class="form-group user-box">
										<input type="text" id="username" name="username" required="" value="<?php if(isset($_COOKIE["login_usuario"])) { echo $_COOKIE["login_usuario"]; } ?>">
										<label for="username">Username</label>
									</div>
									<div class="form-group user-box">
										<input type="password" class="password" id="password" name="password" required="" value="<?php if(isset($_COOKIE["usuario_password"])) { echo $_COOKIE["usuario_password"]; } ?>">
										<span class="fa-solid fa-eye text-muted password-icon show-password"></span>
										<label for="password">Password</label>
									</div>
								  <div class="form-group form-check text-left mb-3">
								    <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["login_usuario"])) { ?> checked <?php } ?> class="form-check-input" />
								    <label class="form-check-label" for="remember">Remember Me</label>
								  </div>
									<input type="submit" name="login" value="Sign In" class="btn btn-primary"> 
								</form>
								<div class="col-sm-12 pt-3 text-right">
			            <p>Not registered? <a href="SignUp.php">Register</a></p>
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
