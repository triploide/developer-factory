<?php
if (!defined('BOOTSTRAP'))include(INC.'php/bootstrap.php');

$html = file_get_contents(INC.'tpl/grupo.tpl');
$imagen = URL.'img/dropzone.gif';



if (isset($_GET['slug'])) {
    if ($grupo = Doctrine::getTable('Grupo')->findOneBySlug($_GET['slug'])) {
        $accion = 'Editar';
        $icon = 'pencil';
        if (is_object($grupo->imagen)) $imagen = URL.'content/grupos/'.$grupo->imagen->src;
        include(INC.'php/replacers/grupo.full.replacer.php');
    } else {
        $html = file_get_contents('tpl/error-404.tpl');
    }
} else {
    $accion = 'Cargar';
    $icon = 'plus';
    include(INC.'php/replacers/grupo.void.replacer.php');
}
echo($html);
