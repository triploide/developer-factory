<?php
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');

$orderColumn = array(
    'imagen',
    'nombre',
    'integrantes',
    'puntos',
    0
);

$data = Doctrine_Query::create()
    ->select('g.id, g.slug, g.nombre, g.puntos, GROUP_CONCAT(i.nombre SEPARATOR ", ") as integrantes, img.src as imagen')
    ->from('Grupo as g')
    ->leftJoin('g.integrantes as i')
    ->leftJoin('g.imagen as img')
    ->limit($_GET['length'])
    ->offset($_GET['start'])
    ->groupBy('g.id')
    ->orderBy($orderColumn[$_GET['order'][0]['column']].' '.$_GET['order'][0]['dir']);
;

$recordsTotal = Doctrine_Query::create()
    ->select('count(g.id)')
    ->from('Grupo as g')
;
$recordsFiltered = $recordsTotal->copy();

//busqueda
if ($_GET['search']['value']) {
    $data->andWhere('g.nombre like "'.$_GET['search']['value'].'%"');
    $recordsFiltered->andWhere('g.nombre like "'.$_GET['search']['value'].'%"');
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
