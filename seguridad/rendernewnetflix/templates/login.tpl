<!DOCTYPE html>
<html lang="es">
<head>
	<title>New Netflix</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="images/ico.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/login-util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" action="login.php" method="post">
					<span class="login100-form-title p-b-43">
						<img class="logo-page" src="images/logo.png" alt="Logo New Netflix">
					</span>
					
					
					<div class="wrap-input100">
						<input class="input100" type="text" name="user">
						<span class="focus-input100"></span>
						<span class="label-input100">Usuario</span>
					</div>
					
					
					<div class="wrap-input100">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Contraseña</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							Siguenos en nuestras redes sociales
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg.jpg');"></div>
			</div>
		</div>
		
		{if isset($error_msg)}
			<div class="error-msg">
				<span class="msg-content">
					<strong>Error!</strong> {$error_msg}
				</span>
				<span class="closebtn">&times;</span> 
			</div>	
		{/if}
		
		
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/login.js"></script>

</body>
</html>