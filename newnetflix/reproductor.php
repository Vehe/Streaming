<?php

    include_once( '../../seguridad/newnetflix/Session.class.php' );
    include_once( '../../seguridad/newnetflix/Db.class.php' );
    include_once( '../../seguridad/newnetflix/Cipher.class.php' );
    include_once( '../../seguridad/newnetflix/VideoStream.class.php' );

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

    $enc_link = strip_tags(trim($_GET['v']));
    $data = json_decode(Cipher::decrypt($enc_link));

    /**
     * Comprueba que el random que se le ha pasado por los datos es el mismo que 
     * se generó y guardo en la variable de sesion al pulsar en la pelicula a visualizar,
     * en caso de no ser iguales, te devuelve al panel. (Esto era para crear el token de 1 solo uso,
     * como ya no se hace así, no se usa para nada, sino como extra de seguridad.)
     */
    if($_SESSION['id_random'] != $data->id_random) {
        header("Location: panel.php");
        exit;
    }

    $db = new Db();
    $auth = $db->isUserAuthorized($data->cod, $_SESSION['dni']);

    /**
     * Si el usuario ha entrado a ver un video para el que no esta autorizado, vuelve al panel.
     */
    if(!$auth) {
        header("Location: panel.php");
        exit;
    }

    $video_info = $db->getVideoData($data->cod);
    $ruta_video = '../../seguridad/newnetflix/videos/' . $video_info['video'];

    $db->markAsView($_SESSION['dni'], $data->cod);
    $db->close();
    
    $stream = new VideoStream($ruta_video);
    $stream->start();

?>