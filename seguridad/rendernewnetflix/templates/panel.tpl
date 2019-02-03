<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/ico.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js"></script>
    <title>Menu</title>
</head>
<body>
    <nav>

        <div class="logo-cartelera">
            <img src="images/cartelera.png" alt="Logo cartelera de cine">
        </div>

        <div class="texto-cartelera">
            <span>Cartelera de {$username}</span>
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
                <li class="alfabetico">
                    <span>Ordenar de manera alfabetica</span>
                    <label class="switch">
                        <input type="checkbox" id="orden-alfabetico-id">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li>
                    <button id='aplicar-filtros'>Aplicar Filtros</button>
                </li>
            </ul>
        </section>

        <section class="container">

            {foreach $videos_array as $video}
                {if $video.vista}
                    <div class="visualized-container">
                        <a href="visualizar.php?v={$video.codigo}"><img src="carteles/{$video.cartel}" alt="{$video.titulo}"></a>
                        <div class="top-left-visualized">
                            <i class="far fa-eye"></i>
                        </div>
                    </div>
                {else}
                    <a href="visualizar.php?v={$video.codigo}"><img src="carteles/{$video.cartel}" alt="{$video.titulo}"></a>
                {/if}
            {/foreach}

        </section>

    </main>
</body>
</html>