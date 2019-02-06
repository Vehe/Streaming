let isChecked = false;
let category = document.getElementsByClassName('top-right-category');

window.addEventListener('load', function() {

    const filter_bar = document.querySelector( '.filter' );
    const select_tematica = document.getElementById( 'select-tematica' );
    const checkbox = document.querySelector( '#orden-tematico-id' );
    const all_span_cat = document.querySelectorAll( '.visualized-container .top-right-category span' );
    
    /**
     * Guarda en un array todas las peliculas que no tengan categoria.
     */
    let peliculas_sin_categoria = [];
    for(const a of document.querySelectorAll( '.visualized-container .top-right-category' )) {
        if (a.children.length == 0) peliculas_sin_categoria.push(a.parentElement);
    }

    /**
     * Funciones para ocultar/mostrar la barra lateral de filtros.
     */
    document.getElementById( 'close-navigation' ).onclick = function () {
        filter_bar.style.display = "none";
    }

    document.getElementById( 'open-navigation' ).onclick = function () {
        filter_bar.style.display = "block";
    }

    /**
     * Al cargar la pagina selecciona todas las categorias, y las pone en el select, 
     * en la seccion de filtros.
     */
    const valores_categorias = [];
    for(const a of all_span_cat) {
        valores_categorias.push(a.innerHTML);
    }

    for(const a of valores_categorias.unique()) {
        createOption(select_tematica, a);
    }

    /**
     * Evento para el checkbox para mostrar las categorias correspondientes
     * a cada una de las peliculas.
     */
    checkbox.onclick = function () {
        isChecked = !isChecked;
        if(isChecked) {
            for(const a of category){
                a.style.display = "grid";
            }
        } else {
            for(const a of category){
                a.style.display = "none";
            }
        }
    }

    /**
     * Oculta las peliculas cuya tematica no coincida con la que el 
     * usuario tiene seleccionada en los filtros, esto solo se aplica en caso
     * de que el usuario tenga activo el checkbox de ordenar.
     */
    document.getElementById( 'aplicar-tematica' ).onclick = function () {

        if(!checkbox.checked) {
            return;
        }

        const tematica_actual = select_tematica.value;

        for(const a of peliculas_sin_categoria) {
            a.style.display = "none";
        }

        for(const a of all_span_cat) {
            if(a.innerHTML != tematica_actual) {
                a.parentElement.parentElement.style.display = "none";
            }
        }

        for(const a of all_span_cat) {
            if(a.innerHTML == tematica_actual) {
                a.parentElement.parentElement.style.display = "block";
            }
        }
    }

    document.getElementById( 'resetear-tematica' ).onclick = function () {
        for(const a of document.querySelectorAll( '.visualized-container')) {
            a.style.display = "block";
        }
    }
});

/**
 * Crea los option para el item select, los cuales son todas las categorias de 
 * las peliculas mostradas en pantalla.
 */
var createOption = function (parent, itm) {
    let x = document.createElement( 'OPTION' );
    var t = document.createTextNode( itm );
    x.appendChild(t);
    x.setAttribute('value', itm);
    parent.appendChild(x);
}

/**
 * Funcion para eliminar los items duplicados de un array.
 */
Array.prototype.unique = function(a){
    return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
});