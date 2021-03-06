<?php

    include_once( '../../Smarty/libs/Smarty.class.php' );
    include_once( '../../seguridad/newnetflix/Session.class.php' );
    include_once( '../../seguridad/newnetflix/Db.class.php' );
    include_once( '../../seguridad/newnetflix/Cipher.class.php' );

    /**
     * Establecer configuración para smarty.
     */
    $smarty = new Smarty();
    $smarty->config_dir = "../../seguridad/rendernewnetflix/configs/";
    $smarty->cache_dir = "../../seguridad/rendernewnetflix/cache/";
    $smarty->template_dir = "../../seguridad/rendernewnetflix/templates/";
    $smarty->compile_dir = "../../seguridad/rendernewnetflix/templates_c/";

    /**
     * Creamos un id random de 25 chars el cual guardaremos en la sesion, ademas de ello,
     * lo guardaremos en un json junto al codigo de la pelicula, el cual lo usaremos para comprobar en el 
     * reporductor, que el id del json y de la sesion coinciden, encriptamos el json y lo enviamos a reproductor,
     * que es el encargado de que se reproduzca el video.
     */
    function createVideoLink($codigo) {
        $id_random = bin2hex(openssl_random_pseudo_bytes(25));
        $data = [
            'cod'=>$codigo,
            'id_random'=>$id_random
        ];
        $_SESSION['id_random'] = $id_random;
        $link = Cipher::encrypt(json_encode($data));
        return "reproductor.php?v=" . urlencode($link);
    }

    Session::init();

    /**
     * Si la sesion con la que entra no esta validada, vuelve al login.
     */
    if(!Session::chkValidity()) {
        header("Location: login.php");
        exit;
    }

    /**
     * En caso de que no este el parametro v, o este este vacio, vuelve al login.
     */
    if(!isset($_GET['v']) && empty($_GET['v'])) {
        header("Location: panel.php");
        exit;
    }


    $codigo_peli = strip_tags(trim($_GET['v']));

    $db = new Db();
    $auth = $db->isUserAuthorized($codigo_peli, $_SESSION['dni']);
    
    /**
     * Si el usuario ha entrado a ver un video para el que no esta autorizado, vuelve al panel.
     */
    if(!$auth) {
        header("Location: panel.php");
        exit;
    }

    $video_info = $db->getVideoData($codigo_peli);
    $link = createVideoLink($codigo_peli);
    $db->close();

    $smarty->assign('video_data', $video_info);
    $smarty->assign('link', $link);
    $smarty->display('reproductor.tpl');
    
?>