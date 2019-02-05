window.addEventListener('load', function () {

    const botondw = document.querySelector( '.fa-download' );

    botondw.onclick = function () {
        $.redirect('download.php', { v : botondw.id });
    };

});