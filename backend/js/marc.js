$(function(){

    // Lista de docente
    $.post( '../../frontend/funciones/marc.php' ).done( function(respuesta)
    {
        $( '#marc' ).html( respuesta );
    });
    
    
    // Lista de Ciudades
    $( '#marc' ).change( function()
    {
        var el_continente = $(this).val();

    });


    
    
    

})
