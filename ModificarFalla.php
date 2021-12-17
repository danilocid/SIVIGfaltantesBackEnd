<?php
require_once 'Controller/FallasController.php';

$fallas = new Fallas();
$id = $_POST['id'];
$estado = $_POST['estado'];
$seccion = $_POST['seccion'];
$tipo = $_POST['tipo'];
$observaciones = $_POST['observaciones'];
$fallas->EditarFalla($id, $estado, $seccion, $tipo, $observaciones);


?>