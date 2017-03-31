<?php
session_start();

if (!isset($_SESSION) || !isset($_SESSION['log']) || $_SESSION['log'] != 'usuarioValido') {
    session_destroy();
    header('location: '.URL.'login');
    exit();
}
if (!$USUARIO = Doctrine::getTable('usuario')->find($_SESSION['usuarioId'])) {
    session_destroy();
    header('location: '.URL.'login');
    exit();
}
