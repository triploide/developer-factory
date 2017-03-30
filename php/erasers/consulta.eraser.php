<?php
include_once('../includes/definer.php');
include_once(INC.'admin/php/bootstrap.php');

$consulta = Doctrine::getTable('Consulta')->find($_POST['id']);

$response = array('error'=>false);
$consulta->delete();

header('Content-Type: application/json');
echo(json_encode($response));
