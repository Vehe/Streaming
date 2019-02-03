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

        $smarty->assign('username', $_SESSION['nombre']);

        $db = new Db();
        $user_videos = $db->getUserVideos($_SESSION['dni']);
        $db->close();

        $smarty->assign('videos_array', $user_videos);
        $smarty->display( 'panel.tpl' );

    } else {

        header("Location: login.php");
        exit;
        
    }
    
?>