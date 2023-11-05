$(document).ready(function() {
    var primerSelector = $("#DOC_ID_TIPO");
    var segundoSelector = $("#DOC_ID_PROCESO");
    var $campo = $("#DOC_CODIGO");

    //DEFINO LOS CAMPOS DE LA ACTUALIZACION DE REGISTRO
    var primerSelectorAct = $("#DOC_ID_TIPOACT");
    var segundoSelectorAct = $("#DOC_ID_PROCESOACT");
    var $campoAct = $("#DOC_CODIGONU");
    seleccionCodigo(primerSelector, segundoSelector, $campo);
    seleccionCodigo(primerSelectorAct, segundoSelectorAct, $campoAct);
    /* var primerSelector = $("#DOC_ID_TIPO");
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
        
    }); */
    
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
    $("#nuevoRegistroBtn").click(function(){
        $("#lista").hide();
        $("#registroOculto").show();
        $("#nuevoRegistroBtn").hide();

    });

    //CANCELA REGISTRO DEL DOCUMENTO Y RETORNA A LA LISTA
    $("#cancelarBtn").click(function(){
        $("#lista").show();
        $("#registroOculto").hide();
        $("#nuevoRegistroBtn").show();
        $("#nuevoRegistro")[0].reset();
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

    //ELIMINAR REGISTRO
    $(".eliminarRegistro").click(function(){
        var fila = $(this).closest("tr");
        var id = fila.find("td:eq(0)").text();

        var confirmar = confirm("¿Estás seguro de que deseas eliminar este registro?");
        if(confirmar){
            const url = `http://localhost/pruebatecnica/Dashboard/eliminar`;
            $.ajax({
                url: url,
                method: 'POST',
                data: {data:id},
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
        }else{
            alert('cancelado')
        }
    })

    //EDICION DEL REGISTRO
    $(".editarRegistro").click(function(){
        var fila = $(this).closest("tr");
        var id = fila.find("td:eq(0)").text();

        const url = `http://localhost/pruebatecnica/Dashboard/buscarDocumento`;
            $.ajax({
                url: url,
                method: 'POST',
                data: {data:id},
                success: function(response) {
                    $("#lista").hide();
                    $("#nuevoRegistroBtn").hide();
                    $("#actualizaRegistro").show();
                    const respuesta = JSON.parse(response);
                    //console.log(respuesta.DOC_NOMBRE)DOC_ID
                    $('#DOC_ID').val(respuesta.DOC_ID); 
                    $('#DOC_NOMBREACT').val(respuesta.DOC_NOMBRE); 
                    $('#DOC_CONTENIDOACT').val(respuesta.DOC_CONTENIDO);
                    $('#DOC_CODIGOACT').val(respuesta.DOC_CODIGO);
                        
                }
            });
    });

    //CANCELAR EDICION DEL REGISTRO
    $("#cancelarBtnAct").click(function(){
        $("#lista").show();
        $("#nuevoRegistroBtn").show();
        $("#actualizaRegistro").hide();
        $("#actRegistro")[0].reset();
    });

    //ACTUALIZACION DE LOS REGISTROS
    $("#actualizarBtn").click(function(){

        let actForm = document.querySelector('#actRegistro');
        const data = new FormData(actForm);
        //console.log(data)
        data.append('DOC_CODIGONU',$("#DOC_CODIGONU").val());
        data.append('DOC_ID',$("#DOC_ID").val());

        const url = `http://localhost/pruebatecnica/Dashboard/actualizarDocumento`;

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                const respuesta = JSON.parse(response);
                /* if(respuesta.msg){
                    //alert(respuesta.msg);
                    setTimeout(() => {
                        window.location.href = `http://localhost/pruebatecnica/Dashboard`;
                    }, 1500);
                }else{
                    alert(respuesta.error);
                } */
                
            }
        });




        /* var DOC_NOMBRE = $("#DOC_NOMBREACT").val();
        var DOC_CODIGO = $("#DOC_CODIGONU").val();
        var DOC_CONTENIDO = $("#DOC_CONTENIDOACT").val();
        var DOC_ID_TIPO = $("#DOC_ID_TIPOACT").val();
        var DOC_ID_PROCESO = $("#DOC_ID_PROCESOACT").val();

        console.log(DOC_NOMBRE);
        console.log(DOC_CODIGO);
        console.log(DOC_CONTENIDO);
        console.log(DOC_ID_TIPO);
        console.log(DOC_ID_PROCESO); */

        /* if (DOC_NOMBRE === "" || DOC_CODIGO === "" || DOC_CONTENIDO === "" || DOC_ID_TIPO === "" || DOC_ID_PROCESO === "") {
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
            
        } */
    });


});

function seleccionCodigo(primerSelector, segundoSelector, campo){
    
    //SELECCION DEL DOC TIPO Y DOC PROCESO
    primerSelector.on("change", function() {

        if(!segundoSelector.is(":disabled")){
            
            //segundoSelector.val("");
            segundoSelector[0].selectedIndex = 0;
            //primerSelector[0].selectedIndex = 0;
            campo.val('');
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
                        campo.val(respuesta.asignar);
         
                    }
                });
            });

        }
        
    });
}