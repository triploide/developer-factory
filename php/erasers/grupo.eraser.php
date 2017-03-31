<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
$response = array('error'=>false);

$grupo = Doctrine::getTable('Grupo')->find($_POST['id']);
$grupo->integrantes->delete();
$grupo->delete();

header('Content-Type: application/json');
echo(json_encode($response));
