<?php
if (!defined('BOOTSTRAP'))include(INC.'admin/php/bootstrap.php');
$html = file_get_contents(INC.'admin/tpl/consulta.tpl');
if ($consulta = Doctrine::getTable('Consulta')->find($_GET['id'])) {
    $consulta->leido = 1;
    $consulta->save();
    include(INC.'admin/php/replacers/consulta.full.replacer.php');
} else {
    $html = file_get_contents(INC.'admin/tpl/error-404.tpl');
}
echo($html);
