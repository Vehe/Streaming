<?php 

    include_once( '../../Smarty/libs/Smarty.class.php' );
    include_once( '../../seguridad/newnetflix/Session.class.php' );
    include_once( '../../seguridad/newnetflix/Db.class.php' );

    
    /**
     * Establecer configuración para smarty.
     *
     */
    $smarty = new Smarty();
    $smarty->config_dir = "../../seguridad/rendernewnetflix/configs/";
    $smarty->cache_dir = "../../seguridad/rendernewnetflix/cache/";
    $smarty->template_dir = "../../seguridad/rendernewnetflix/templates/";
    $smarty->compile_dir = "../../seguridad/rendernewnetflix/templates_c/";

    Session::init();

    if(Session::chkValidity()) {

		/**
		 *	En caso de que el usuario entre al login con una sesión en la que ya
		 *	se le ha validado, se le redirige al menú.
		 *
		 */
		header("Location: panel.php");
		exit;

	}

    if(isset($_POST["user"]) && isset($_POST["pass"])){

		$user = strip_tags(trim($_POST["user"]));
		$pw = strip_tags(trim($_POST["pass"]));
		
		if(!empty($user) && !empty($pw)){

            $db = new Db();
            $data = $db->getPassword($user);
            $db->close();
            
            if(password_verify($pw, $data['clave'])) {

                /** 
				 *	En caso de que el login sea correcto, se le valida la sesion
				 *	y se le redirige a el menú.
				 *
				 */
				Session::validateUsr($data['nombre'], $user);
				header("Location: panel.php");
                exit;

			} else {

				/** 
				 *	Se le indica al usuario con un mensaje que la cuenta a la que esta intentando entrar
				 *	no se encuentra en la base de datos.
				 *
				 */
                $smarty->assign('error_msg', 'Usuario o contraseña incorrectos.');
			}

		} else {

			$smarty->assign('error_msg', 'Usuario o contraseña incorrectos.');
		
		}

    }
    
    $smarty->display( 'login.tpl' );

?>