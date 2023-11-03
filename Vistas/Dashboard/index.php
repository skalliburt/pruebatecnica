<?php
headerAdmin($data);
?>
<style type="text/css">
    /* Sticky footer styles
    -------------------------------------------------- */
    html {
    position: relative;
    min-height: 100%;
    }
    body {
    /* Margin bottom by footer height */
    margin-bottom: 60px;
    }
    .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    /* Set the fixed height of the footer here */
    height: 60px;
    line-height: 60px; /* Vertically center the text there */
    background-color: #f5f5f5;
    }


    /* Custom page CSS
    -------------------------------------------------- */
    /* Not required for template or sticky footer method. */

    body > .container {
    padding: 60px 15px 0;
    }

    .footer > .container {
    padding-right: 15px;
    padding-left: 15px;
    }

    code {
    font-size: 80%;
    }
</style>
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Bienvenido</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?php echo base_url?>CerrarSesion">Cerrar sesión</a>
            </li>
        </ul>
    </div>
    </nav>
</header>
<main role="main" class="container">

    <table id="tableConfigFuec" class="display mt-5" style="width:100%">
        <thead>
            <tr>
            <th>Id</th>
            <th>Nombre de la empresa</th>
            <th>Número de NIT</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</main>


<?php 
footerAdmin($data); 
?>