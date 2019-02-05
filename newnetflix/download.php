<?php

    include_once( '../../seguridad/newnetflix/Session.class.php' );
    include_once( '../../seguridad/newnetflix/Db.class.php' );

    const videoPath = '../../seguridad/newnetflix/videos/';
    
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
    if(!isset($_POST['v']) && empty($_POST['v'])) {
        header("Location: panel.php");
        exit;
    }

    $codigo_peli = strip_tags(trim($_POST['v']));

    $db = new Db();
    $auth = $db->isUserAuthorized($codigo_peli, $_SESSION['dni']);
    

    /**
     * Si el usuario no tiene permiso para ver ese video, se le devuelve al panel.
     */
    if(!$auth) {
        header("Location: panel.php");
        exit;
    }

    /**
     * Almacenamos el nombre de la pelicula a descargar y el nombre temporal para el zip.
     */
    $video_nombre = $db->getVideoName($codigo_peli);
    $tmp_name = videoPath . "pelicula.zip";
    unlink($tmp_name);

    $db->close();

    /**
     * Creamos el zip y añadimos la película.
     */
    $zip = new ZipArchive();
    if($zip->open($tmp_name,ZIPARCHIVE::CREATE) !== true) {
        header("Location: panel.php");
        exit;
    }
    $zip->addFile(videoPath . $video_nombre, $video_nombre);
    $zip->close();

    /**
     * Creamos las cabeceras y limpiamos el buffer de salida para que no haya errores.
     */
    header("Content-Disposition: attachment; filename=pelicula.zip");
    header("Content-type: application/zip");

    ob_clean();
    readfile($tmp_name);
  
?>