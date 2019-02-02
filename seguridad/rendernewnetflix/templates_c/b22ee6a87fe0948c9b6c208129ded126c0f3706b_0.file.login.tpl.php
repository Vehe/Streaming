<?php
/* Smarty version 3.1.33, created on 2019-02-02 16:25:28
  from '/Users/v3he/seguridad/rendernewnetflix/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c55c478848286_41623502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b22ee6a87fe0948c9b6c208129ded126c0f3706b' => 
    array (
      0 => '/Users/v3he/seguridad/rendernewnetflix/templates/login.tpl',
      1 => 1548780448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c55c478848286_41623502 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
		
		<?php if (isset($_smarty_tpl->tpl_vars['error_msg']->value)) {?>
			<div class="error-msg">
				<span class="msg-content">
					<strong>Error!</strong> <?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>

				</span>
				<span class="closebtn">&times;</span> 
			</div>	
		<?php }?>
		
		
	</div>
	
	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/login.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
}
