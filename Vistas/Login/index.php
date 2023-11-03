<?php
headerAdmin($data);
//text-center
?>


<style type="text/css">
      html,
      body {
        height: 100%;
      }

      body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }
</style>
        <form class="form-signin" id="iniciarSesion">
            <div class="container">
                <img class="mb-4" src="https://unawebdiferente.com/wp-content/uploads/2022/10/cropped-logo2-1.png" alt="" width="200" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Iniciar sesion</h1>
            </div>
            
            <label for="inputText" class="sr-only">Usuario</label>
            <input type="text" id="inputText" name="inputText" class="form-control" placeholder="Ingrese el usuario" required autofocus>
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Ingrese la contraseña" required>
            
            <button class="btn btn-lg btn-primary btn-block" type="button" id="ingresar">Ingresar</button>
            
        </form>


<?php 
footerAdmin($data); 
?>