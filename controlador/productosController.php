<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/modelo/bo/productoBo.php';

switch ($_POST['action']) {
  case 'insert':
    $descripcion  = $_POST['descripcion'];
    $cantidad  = $_POST['cantidad'];
    $peso_producto    = $_POST['peso_producto'];
    $vencimiento_producto   = $_POST['vencimiento_producto'];
    $presentacion_id     = $_POST['presentacion_id'];
    $contenedor_id      = $_POST['contenedor_id'];

    $bo = new productoBo();
    $r = $bo->registrarProductoBo($descripcion, $cantidad, $peso_producto, $vencimiento_producto, $presentacion_id, $contenedor_id);
    print $r;
    break;

    case 'update':
         $producto_id = $_POST['id'];

         $bo = new productoBo();
         $r = $bo->actualizarProductoBo($producto_id);
         print $r;
         break;

    case 'savedata':
        $id        = $_POST['a'];
        $descripcion  = $_POST['b'];
        $cantidad  = $_POST['c'];
        $peso_producto    = $_POST['d'];
        $vencimiento_producto   = $_POST['j'];
        $presentacion_id     = $_POST['k'];
        $contenedor_id      = $_POST['l'];

        $bo = new productoBo();
        $r = $bo->saveDataProductoBo($id, $descripcion, $cantidad, $peso_producto, $vencimiento_producto, $presentacion_id, $contenedor_id);
        print $r;
        break;

    case 'delete':
        $descripcion = $_POST['id'];

        $bo = new productoBo();
        $r = $bo->eliminarProductoBo($descripcion);
        print $r;
        break;
    case 'select':
        $bo = new productoBo();
        $r = $bo->traeProductosBo();
        print $r;
        break;
}
