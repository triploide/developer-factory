<?php
include_once('bootstrap.php');

Doctrine_Core::createTablesFromModels('models');

//usuario
$admin = new Usuario();
$admin->nombre = 'Maxi';
$admin->nick = 'admin';
$admin->pass = 'monroe860';
//---------

Doctrine_Manager::connection()->flush();