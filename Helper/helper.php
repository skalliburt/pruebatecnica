<?php

function headerAdmin($data = "")
{
    $view_header = "vistas/Templates/header.php";
    require_once($view_header);
}

function footerAdmin($data = "")
{
    $view_footer = "vistas/Templates/footer.php";
    require_once($view_footer);
}