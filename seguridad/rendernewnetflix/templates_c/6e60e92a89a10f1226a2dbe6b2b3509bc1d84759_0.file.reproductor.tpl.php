<?php
/* Smarty version 3.1.33, created on 2019-02-05 13:37:35
  from 'C:\UwAmp\seguridad\rendernewnetflix\templates\reproductor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c59838f9211e5_40692529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e60e92a89a10f1226a2dbe6b2b3509bc1d84759' => 
    array (
      0 => 'C:\\UwAmp\\seguridad\\rendernewnetflix\\templates\\reproductor.tpl',
      1 => 1549364143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c59838f9211e5_40692529 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/ico.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reproductor.css">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.redirect.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/rep.js"><?php echo '</script'; ?>
>
    <title>Reproductor</title>
</head>
<body>
    <main>
        <div class="video-container">
            <video src="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" type="video/mp4" controls="controls" preload="none"></video>
        </div>
        <button>
            <a href="disconnect.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>   
        </button>
    </main>
    <section>
        <div class="description-container">
            <img src="carteles/<?php echo $_smarty_tpl->tpl_vars['video_data']->value['cartel'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['video_data']->value['titulo'];?>
">
            <div class="info">
                <span class="titulo"><?php echo $_smarty_tpl->tpl_vars['video_data']->value['titulo'];?>
</span>
                <span class="sinopsis"><?php echo $_smarty_tpl->tpl_vars['video_data']->value['sinopsis'];?>
</span>
                <?php if ($_smarty_tpl->tpl_vars['video_data']->value['descargable'] == 'S') {?>
                    <div class="download">
                        <i class="fas fa-download" id="<?php echo $_smarty_tpl->tpl_vars['video_data']->value['codigo'];?>
"></i>
                    </div>
                <?php }?>
            </div>
        </div>
    </section>
</body>
</html><?php }
}
