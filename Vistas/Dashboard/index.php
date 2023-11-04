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

    <div class="card">
        <div class="card-header">
            <ul class="nav navbar-right">
                <li>
                <button class="btn btn-success btn-sm" id="nuevoRegistro"> Nuevo Registro</button>
                </li>
                
            </ul>
        </div>
        <div class="card-body">
            <div id="lista">
                <form class="form-inline mt-2 mt-md-0" id="formBusqueda">
                    <input class="form-control mr-sm-2" type="text" id="codigoBusqueda" placeholder="Codigo del documento" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                <table id="listaDocumentos" class=" table table-striped display mt-5" style="width:100%">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre del documento</th>
                        <th scope="col">Codigo del documento</th>
                        <th scope="col">Contenido del documento</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($data['listaDocumentos'] as $datosTabla){?>
                            <tr>
                                <td scope="row"><?php echo $datosTabla['DOC_ID']; ?></td>
                                <td><?php echo $datosTabla['DOC_NOMBRE']; ?></td>
                                <td><?php echo $datosTabla['DOC_CODIGO']; ?></td>
                                <td><?php echo $datosTabla['DOC_CONTENIDO']; ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" id="editarRegistro">Editar</button>
                                    <button class="btn btn-danger btn-sm" id="eliminarRegistro">Editar</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
            
            <div id="registroOculto" style="display:none;">
                <form method="POST" style="" id="nuevoRegistro">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>DOC_NOMBRE</label>
                            <input type="text" class="form-control" id="DOC_NOMBRE" name="DOC_NOMBRE">
                        </div>
                        <div class="form-group col-md-6">
                            <label>DOC_CONTENIDO</label>
                            <input type="text" class="form-control" id="DOC_CONTENIDO" name="DOC_CONTENIDO">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>TIPO DOC</label>
                            <select class="form-control" name="DOC_ID_TIPO" id="DOC_ID_TIPO">
                                <option value=""selected>Seleccione</option>
                                <?php foreach($data['tipoDoc'] as $tipoDoc):?>
                                    <option value="<?php echo $tipoDoc['TIP_ID']; ?>" data-prefix="<?php echo $tipoDoc['TIP_PREFIJO'];?>"><?php echo $tipoDoc['TIP_PREFIJO'];?> - <?php echo $tipoDoc['TIP_NOMBRE'];?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>DOC PROCESO</label>
                            <select class="form-control" name="DOC_ID_PROCESO" id="DOC_ID_PROCESO" disabled>
                                <option selected>Seleccione</option>
                                <?php foreach($data['proceso'] as $proceso):?>
                                    <option value="<?php echo $proceso['PRO_ID']; ?>" data-prefix="<?php echo $proceso['PRO_PREFIJO'];?>"><?php echo $proceso['PRO_PREFIJO'];?> - <?php echo $proceso['PRO_NOMBRE'];?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>CODIGO</label>
                            <input type="text" class="form-control" id="DOC_CODIGO" name="DOC_CODIGO" disabled>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success" id="registrarBtn">Guardar registro</button>
                    <button type="button" class="btn btn-secondary" id="cancelarBtn">Cancelar</button>
                </form>
            </div>
            
        </div>
    </div>

    

</main>


<?php 
footerAdmin($data); 
?>