<?php
if(!isset($_FILES) || !count($_FILES)) exit();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include_once('../includes/definer.php');
include_once(INC.'php/bootstrap.php');
include_once(INC.'php/classes/FileImage.php');


$relativePath = 'content/tmp/grupos/';
$ruta = INC.$relativePath;
$response = array();

//validaciones

$nombre = $_POST['imgprefix'].'-'.(Imagen::lastId()+1);

$ext = explode('.', $_FILES['file']['name']);
$ext = '.'.$ext[count($ext)-1];
$ext = strtolower($ext);
$ext = ($ext == '.jpeg')?'.jpg':$ext;

if ($ext == '.jpg' || $ext == '.jpeg' || $ext == '.gif' || $ext == '.png' ) {

    //dimensionamiento y creacion de las imagenes
    $fileImage = new FileImage($_FILES['file']['tmp_name'], 90);
    $fileImage->escalar(416, 416);
    $fileImage->recortarDesdeElCentro(416, 416);
    $fileImage->save($ruta.$nombre);
    
    $fileImage = new FileImage($_FILES['file']['tmp_name'], 60);
    $fileImage->escalar(100, 100);
    $fileImage->recortarDesdeElCentro(100, 100);
    $fileImage->save($ruta.'thumb/'.$nombre);

    $image = new Imagen();
    $image->src = $nombre.'.'.$fileImage->extension;
    $image->save();

    //respuesta
    $response[] = array(
        'id'=>$image->id,
        'src'=>$relativePath.$nombre.'.'.$fileImage->extension
    );
}


header("Content-type: application/json");
echo(json_encode($response));
