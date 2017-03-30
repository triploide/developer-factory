<?php
$fecha = preg_replace('/([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/', '$3-$2-$1 a las $4:$5', $consulta->fecha);

$html = str_replace('${url}', URL, $html);
$html = str_replace('${id}', $consulta->id, $html);
$html = str_replace('${nombre}', $consulta->nombre, $html);
$html = str_replace('${email}', $consulta->email, $html);
$html = str_replace('${fecha}', $fecha, $html);
$html = str_replace('${contenido}', nl2br($consulta->contenido), $html);
$html = preg_replace('/\${*[A-Za-z0-9_]*\}*/', '', $html);
