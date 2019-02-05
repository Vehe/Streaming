<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/ico.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reproductor.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.redirect.js"></script>
    <script type="text/javascript" src="js/rep.js"></script>
    <title>Reproductor</title>
</head>
<body>
    <main>
        <div class="video-container">
            <video src="{$link}" type="video/mp4" controls="controls" preload="none"></video>
        </div>
        <button>
            <a href="disconnect.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>   
        </button>
    </main>
    <section>
        <div class="description-container">
            <img src="carteles/{$video_data.cartel}" alt="{$video_data.titulo}">
            <div class="info">
                <span class="titulo">{$video_data.titulo}</span>
                <span class="sinopsis">{$video_data.sinopsis}</span>
                {if $video_data.descargable == 'S'}
                    <div class="download">
                        <i class="fas fa-download" id="{$video_data.codigo}"></i>
                    </div>
                {/if}
            </div>
        </div>
    </section>
</body>
</html>