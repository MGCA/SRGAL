function guardarHojasSeguridad(){
    
    var nombreProducto = document.getElementById('nombreProducto').value;
    var marca = document.getElementById('marca').value;
    var codigo = document.getElementById('codigo').value;
    var requiereHojaSeguridad1 = document.getElementById('requiereHojaSeguridad1').value;
    var requiereHojaSeguridad2 = document.getElementById('requiereHojaSeguridad2').value;
    var archivoHojaSeguridad = document.getElementById('archivoHojaSeguridad').value;
    
    var dataen = 'nombreProducto='+nombreProducto+'&marca='+marca+'&codigo='+codigo+
    '&requiereHojaSeguridad1='+requiereHojaSeguridad1+'&requiereHojaSeguridad2='+requiereHojaSeguridad2+
    '&archivoHojaSeguridad='+archivoHojaSeguridad;

    $.ajax({
      type: 'POST',
      url: action('DepartamentoHojasSeguridadController@guardarHojasSeguridad'),
      data: dataen,
      success:function(sms){
        $("#sms").html(sms);
      }
    });
    return;
    
}