window.addEventListener('load', function() {

    const filter_bar = document.querySelector( '.filter' );

    document.getElementById( 'close-navigation' ).onclick = function () {
        filter_bar.style.display = "none";
    }

    document.getElementById( 'open-navigation' ).onclick = function () {
        filter_bar.style.display = "block";
    }

    document.getElementById( 'aplicar-filtros' ).onclick = function () {
        console.log(document.getElementById( 'orden-tematico-id' ).checked);
        console.log(document.getElementById( 'orden-alfabetico-id' ).checked);
    }

});