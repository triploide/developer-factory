<?php
$html = str_replace('${accion}', $accion, $html);
$html = str_replace('${icon}', $icon, $html);
$html = str_replace('${imgprefix}', time() . '' . rand(1, 99999), $html);
$html = str_replace('${imagen}', $imagen, $html);
$html = str_replace('${imagenId}', $grupo->imagen->id, $html);
$html = str_replace('${id}', $grupo->id, $html);
$html = str_replace('${title}', $grupo->nombre, $html);
$html = str_replace('${nombre}', htmlspecialchars($grupo->nombre), $html);

//integrantes
$i=1;
foreach ($grupo->integrantes as $integrante) {
    $html = str_replace('${integrantes'.$i.'}', $integrante->nombre, $html);
    $i++;
}

$html = preg_replace('/\${+[A-Za-z0-9_]*\}+/', '', $html);
