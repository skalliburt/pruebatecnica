<?php

function headerAdmin($data = "")
{
    $view_header = "Vistas/Templates/header.php";
    require_once($view_header);
}

function footerAdmin($data = "")
{
    $view_footer = "Vistas/Templates/footer.php";
    require_once($view_footer);
}