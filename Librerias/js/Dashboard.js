$(document).ready(function() {
    var primerSelector = $("#DOC_ID_TIPO");
    var segundoSelector = $("#DOC_ID_PROCESO");

    //SELECCION DEL DOC TIPO Y DOC PROCESO
    primerSelector.on("change", function() {

        if(!segundoSelector.is(":disabled")){
            
            segundoSelector.val("");
            //segundoSelector.trigger("change");

        }else{
            segundoSelector.prop("disabled", false);
            var primeraSeleccion = $("option:selected", this).data("prefix");

            segundoSelector.change(function(){
                var segundaSeleccion = $("option:selected", this).data("prefix");
                
                var concatenaSeleccion = primeraSeleccion + '-' + segundaSeleccion;
                const url = `http://localhost/pruebatecnica/Dashboard/buscarCodigo`;
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {concatenaSeleccion:concatenaSeleccion},
                    success: function(response) {
                        const respuesta = JSON.parse(response);
                        //RETORNA EL CODIGO CONSECUTIVO DE LA FUNCION
                        $("#DOC_CODIGO").val(respuesta.asignar);
         
                    }
                });
            });

        }
        
    });
    
    //REGISTRO DEL DOCUMENTO
    $("#registrarBtn").click(function(){
        var DOC_NOMBRE = $("#DOC_NOMBRE").val();
        var DOC_CODIGO = $("#DOC_CODIGO").val();
        var DOC_CONTENIDO = $("#DOC_CONTENIDO").val();
        var DOC_ID_TIPO = $("#DOC_ID_TIPO").val();
        var DOC_ID_PROCESO = $("#DOC_ID_PROCESO").val();

        if (DOC_NOMBRE === "" || DOC_CODIGO === "" || DOC_CONTENIDO === "" || DOC_ID_TIPO === "" || DOC_ID_PROCESO === "") {
            alert('Por favor complete todos los campos.');
        } else {
            const data = {
                DOC_NOMBRE: DOC_NOMBRE,
                DOC_CODIGO: DOC_CODIGO,
                DOC_CONTENIDO: DOC_CONTENIDO,
                DOC_ID_TIPO: DOC_ID_TIPO,
                DOC_ID_PROCESO: DOC_ID_PROCESO,
            }

            const url = `http://localhost/pruebatecnica/Dashboard/registrar`;
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: function(response) {
                    const respuesta = JSON.parse(response);
                    if(respuesta.status == true){
                        alert(respuesta.msg);
                        setTimeout(() => {
                            window.location.href = `http://localhost/pruebatecnica/Dashboard`;
                        }, 1500);
                    }
                     
                }
            });
            
        }
        
    });

    //LLAMA EL FORMULARIO DEL NUEVO REGISTRO
    $("#nuevoRegistro").click(function(){
        $("#lista").hide();
        $("#registroOculto").show();

    });

    //CANCELA REGISTRO DEL DOCUMENTO Y RETORNA A LA LISTA
    $("#cancelarBtn").click(function(){
        $("#lista").show();
        $("#registroOculto").hide();
    });

    //BUSQUEDA DE DOCUMENTO EN EL FORMULARIO
    var formBusqueda = $('#formBusqueda');
    var codigoBusqueda = $('#codigoBusqueda');
    var tabla = $('#listaDocumentos tbody tr');

    formBusqueda.on('submit', function(e) {
        e.preventDefault();
        var codigo = codigoBusqueda.val().trim().toLowerCase();

        tabla.each(function() {
            var fila = $(this);
            var codigoDocumento = fila.find('td:nth-child(3)').text().trim().toLowerCase();
            
            if (codigoDocumento.includes(codigo)) {
                fila.show();
            } else {
                fila.hide();
            }
        });
    });

});