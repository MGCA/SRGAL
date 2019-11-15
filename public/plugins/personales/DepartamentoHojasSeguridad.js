$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: 'GestoresAutorizados'
    })
    .done(function(){
        alert('Prueba')
        alert('Hubo un error al cargar las Areas del Centro de Formacion')
    })
    .fail(function(){
        
    }) })