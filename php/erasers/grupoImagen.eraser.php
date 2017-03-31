<?php
include('../includes/definer.php');
include(INC.'php/bootstrap.php');
$relativePath = 'content/grupos/';
$imagen = Doctrine::getTable('imagen')->find($_POST['id']);
@unlink(INC.$relativePath.$imagen->src);
@unlink(INC.$relativePath.'thumb/'.$imagen->src);
Doctrine_Query::create()->update('Grupo')->set('imagen_id', 'NULL')->where('imagen_id = '.$_POST['id'])->execute();
$imagen->delete();
