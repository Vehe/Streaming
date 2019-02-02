$( document ).ready(function() {

    /**
     * Por cada input, cuando el input pierda el foco, le añade
     * la clase has-val.
     */
    $('.input100').each(function(){
        $(this).on('blur', function(){
            ($(this).val().trim() != "") ? $(this).addClass('has-val') : $(this).removeClass('has-val') ;
        });
    });

    /**
     * Cuando se hace click en el boton X del cuadro de dialogo,
     * oculta el cuadro.
     */
    $( '.closebtn' ).on('click', function () {
        $( this ).parent().hide();
    });

});