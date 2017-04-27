<?php
session_start();
include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');

$imagesTmpPath = 'content/tmp/grupos/';
$imagesFinalPath = 'content/grupos/';

if ($_POST['id']) {
    $grupo = Doctrine::getTable('Grupo')->find($_POST['id']);
    if (isset($_POST['puntos'])) {
        $grupo->puntos += $_POST['puntos'];
        $grupo->save();
        header("Content-type: application/json");
        echo(json_encode(array('success'=>true, 'value'=>$grupo->puntos)));
        exit();
    }
    $grupo->integrantes->delete();
} else {
    $grupo = new Grupo();
}
$grupo->nombre = $_POST['nombre'];

foreach ($_POST['integrantes'] as $nombre) {
    if (!empty($nombre)) {
        $integrante = new Integrante();
        $integrante->nombre = $nombre;
        $integrante->grupo = $grupo;
        $integrante->save();
    }
}
$grupo->save();

if (isset($_POST['imgprefix'])) {
    $i = Imagen::lastId();   
    foreach (glob(INC.$imagesTmpPath.$_POST['imgprefix'].'-*') as $img) {
        $imageTmpName = str_replace(INC.$imagesTmpPath, '', $img);
        $ext = explode('.', $img);
        $imageFinalName = $grupo->slug.'.'.$i.'.'.end($ext);
        
        $imageModel = Doctrine::getTable('Imagen')->findOneBySrc($imageTmpName);
        $imageModel->src = $imageFinalName;
        $grupo->imagen = $imageModel;
        rename(INC.$imagesTmpPath.$imageTmpName, INC.$imagesFinalPath.$imageFinalName);
        rename(INC.$imagesTmpPath.'thumb/'.$imageTmpName, INC.$imagesFinalPath.'thumb/'.$imageFinalName);
    }
    $grupo->save();
}


if (isset($_POST['redirect'])) {
    $accion = ($_POST['id'])?'#edit':'#new';
    header('location: '.URL.'grupos'.$accion);
}
