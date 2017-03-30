<?php
include_once('../includes/definer.php');
include_once(INC.'admin/php/bootstrap.php');

$orderColumn = array(
    'fecha',
    'nombre',
    'contenido',
    'estado',
    0
);

$data = Doctrine_Query::create()
    ->select('c.id, c.fecha, c.contenido, c.leido as estado_id, c.nombre')
    ->from('Consulta c')
    ->limit($_GET['length'])
    ->offset($_GET['start'])
    ->orderBy($orderColumn[$_GET['order'][0]['column']].' '.$_GET['order'][0]['dir']);
;

$recordsTotal = Doctrine_Query::create()
    ->select('count(c.id)')
    ->from('Consulta c')
;
$recordsFiltered = $recordsTotal->copy();

//busqueda
if ($_GET['search']['value']) {
    $data->andWhere('c.nombre like "'.$_GET['search']['value'].'%"');
    $recordsFiltered->andWhere('c.nombre like "'.$_GET['search']['value'].'%"');
}

//ejecuto los dql
$recordsTotal = $recordsTotal->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
$recordsFiltered = $recordsFiltered->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
$data = $data->execute(array(), Doctrine::HYDRATE_ARRAY);

$restul = array(
    'recordsTotal'=>$recordsTotal,
    'recordsFiltered'=>$recordsFiltered,
    'data'=>$data
);

header('Content-Type: application/json');
echo(json_encode($restul));
