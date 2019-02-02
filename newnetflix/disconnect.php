<?php 

    include_once( '../../seguridad/newnetflix/Session.class.php' );

    Session::init();

    if(Session::chkValidity()) {

        session_destroy();
        unset($_SESSION);
        header("Location: login.php");
        exit;

    } else {

        header("Location: login.php");
        exit;
        
    }
    
?>