<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/project_coh/ruta.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta. '/Modelo/Dao/producto/productosDao.php';

class productoBo {

    var $dao;

    function __construct() {
        $this->dao=new productoDao();
    }

    function registrarProductoBo($descripcion, $cantidad, $peso_producto, $vencimiento_producto, $presentacion_id, $contenedor_id) {
        $resultado = $this->dao->registrarProductoDao($descripcion, $cantidad, $peso_producto, $vencimiento_producto, $presentacion_id, $contenedor_id);
        return $resultado;
    }

    function traeProductosBo(){
        $resultado = $this->dao->traeProductosDao();
        return $resultado;
    }

    function actualizarProductoBo($descripcion) {
        $resultado = $this->dao->actualizarProductoDao($descripcion);
        return $resultado;
    }

    function saveDataProductoBo($id, $descripcion, $cantidad, $peso_producto, $vencimiento_producto, $presentacion_id, $contenedor_id) {
        $resultado = $this->dao->saveDataProductoDao($id, $descripcion, $cantidad, $peso_producto, $vencimiento_producto, $presentacion_id, $contenedor_id);
        return $resultado;
    }

    function eliminarProductoBo($descripcion) {
        $resultado = $this->dao->eliminarProductoDao($descripcion);
        return $resultado;
    }

    function logoutBo() {
        $resultado = $this->dao->logoutDao();
        return $resultado;
    }

    function sessionValidateBo() {
        $resultado = $this->dao->sessionValidateDao();
        return $resultado;
    }

    function sessionUserTypeBo($type) {
        $resultado = $this->dao->sessionUserTypeDao($type);
        return $resultado;
    }

}
?>
