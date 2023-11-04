$("#ingresar").click(function(){
    let loginForm = document.querySelector('#iniciarSesion');
    const data = new FormData(loginForm);

    const url = `http://localhost/pruebatecnica/Login/acceso`;

    $.ajax({
        url: url,
        method: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: function(response) {
            const respuesta = JSON.parse(response);
            if(respuesta.msg){
                //alert(respuesta.msg);
                setTimeout(() => {
                    window.location.href = `http://localhost/pruebatecnica/Dashboard`;
                }, 1500);
            }else{
                alert(respuesta.error);
            }
             
        }
    });
});