<?php
/* Smarty version 3.1.33, created on 2019-02-06 09:33:39
  from 'C:\UwAmp\seguridad\rendernewnetflix\templates\panel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5a9be34377d4_29618515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '908b7225cf5cddb0f8cdaee12948847bb174341d' => 
    array (
      0 => 'C:\\UwAmp\\seguridad\\rendernewnetflix\\templates\\panel.tpl',
      1 => 1549442018,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5a9be34377d4_29618515 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/ico.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>
    <title>Menu</title>
</head>
<body>
    <nav>

        <div class="logo-cartelera">
            <img src="images/cartelera.png" alt="Logo cartelera de cine">
        </div>

        <div class="texto-cartelera">
            <span>Cartelera de <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span>
        </div>

        <div class="logout-cartelera">
            <form action="disconnect.php" id="desconectar">
                <button type="submit" form="desconectar" value="Submit">Desconectarse</button>
            </form>
        </div>
        
    </nav>

    <main>

        <button class="open-filter" id="open-navigation">
            <i class="fas fa-bars"></i>
        </button>

        <section class="filter">
            <ul>
                <li id="close-navigation">Cerrar Filtros</li>
                <li class="alfabetico">
                    <span>Ordenar por tematica</span>
                    <label class="switch">
                        <input type="checkbox" id="orden-tematico-id">
                        <span class="slider round"></span>
                    </label>
                </li>
            </ul>
        </section>

        <section class="container">

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['videos_array']->value, 'video');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
?>
                <div class="visualized-container">
                <a href="visualizar.php?v=<?php echo $_smarty_tpl->tpl_vars['video']->value['codigo'];?>
"><img src="carteles/<?php echo $_smarty_tpl->tpl_vars['video']->value['cartel'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['video']->value['titulo'];?>
"></a>
                <div class="top-right-category">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['video']->value['categorias'], 'cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
?>
                        <span><?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
</span> 
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>

                <?php if ($_smarty_tpl->tpl_vars['video']->value['vista']) {?>
                    <div class="top-left-visualized">
                        <i class="far fa-eye"></i>
                        <span><?php echo $_smarty_tpl->tpl_vars['video']->value['vista'];?>
</span>
                    </div>
                <?php }?>
                
                </div>   
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </section>

    </main>
</body>
</html><?php }
}
