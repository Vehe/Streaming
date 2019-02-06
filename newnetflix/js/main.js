let isChecked = false;
let category = document.getElementsByClassName('top-right-category');

window.addEventListener('load', function() {

    const filter_bar = document.querySelector( '.filter' );

    document.getElementById( 'close-navigation' ).onclick = function () {
        filter_bar.style.display = "none";
    }

    document.getElementById( 'open-navigation' ).onclick = function () {
        filter_bar.style.display = "block";
    }

    document.querySelector( '#orden-tematico-id' ).onclick = function () {

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
});