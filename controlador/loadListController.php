<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/Modelo/Bo/usuarioBo.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/Modelo/Bo/productoBo.php';

switch ($_GET['action']) {
	case "users":
		$bo = new usuarioBo();
		$r = $bo->traeUsuariosBo();
		print $r;
		break;
	case "products":
		$bo = new productoBo();
		$r = $bo->traeProductosBo();
		print $r;
		break;
}
