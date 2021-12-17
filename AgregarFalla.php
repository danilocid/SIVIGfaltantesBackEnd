<?php
require_once 'Controller/FallasController.php';

$fallas = new Fallas();
$seccion = $_POST['seccion'];
$tipo = $_POST['tipo'];
$observaciones = $_POST['observaciones'];
$fallas->AgregarFalla($tipo, $seccion, $observaciones);


?>