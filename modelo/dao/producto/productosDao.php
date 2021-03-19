<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/project_coh/ruta.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta.'/modelo/dao/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta.'/modelo/dao/procesaParametros.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta.'/modelo/dao/producto/productosSql.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta.'/vista/logicavista/notificationView.php';

class productoDao {

    private $con;

    function __construct() {
        $this->con=  conexion::conectar();
    }
    function __destruct() {
        $this->con->close();
    }

    function logoutDao() {
        session_start();
        session_destroy();
        print "<script>window.location='../index.php';</script>";
    }

    function sessionValidateDao() {
        session_start();
        if (!isset($_SESSION['tipo'])) {
            print "<script>window.location='../index.php';</script>";
        }
    }

    function sessionUserTypeDao($type) {
        if ($_SESSION['tipo'] != $type) {
            print "<script>window.location='main.php';</script>";
        }
    }
/*
    function  identificarProductoDao($usuario, $password)
    {

        $datosArray=array($usuario,$password);

        if( $usuario == '' || $usuario === NULL || is_null($usuario) || $password == '' || $password === NULL || is_null($password) )
        {

            $result = Notification::requiredFields();

        }
        else
        {

            $st = procesaParametros::PrepareStatement(usuariosSql::indentificarUsuario(),$datosArray);
            $query=$this->con->query($st);

            if($query->num_rows==0)
            {

                $result = Notification::incorrectCredentials();

            }
            else
            {

                $row = mysqli_fetch_array($query);

                if ($row['status'] != 0)
                {

                    session_start();
                    $_SESSION['idusuario']   = $row['idusuario'];
                    $_SESSION['nombre']      = $row['apaterno'].' '.$row['amaterno'].' '.$row['nombre'];
                    $_SESSION['tipo']        = $row['tipo'];
                    $result = "<script>window.location='main.php';</script>";

                }
                else
                {

                    $result = Notification::disableUser();

                }
            }
        }

        return $result;
    }
*/
    function  registrarProductoDao($descripcion, $cantidad, $peso_producto, $vencimiento_producto, $presentacion_id, $contenedor_id){
      $datosArray=array($descripcion);
      $st=  procesaParametros::PrepareStatement(productosSql::validateIfExistsProduct(),$datosArray);

      $query=$this->con->query($st);

      if($query->num_rows==0)
      {
        $st = "INSERT INTO productos(descripcion, cantidad, peso_producto, vencimiento_producto, presentacion_id, contenedor_id, fRegistro)
        VALUES('$descripcion', '$cantidad', '$peso_producto', '$vencimiento_producto', '$presentacion_id', '$contenedor_id', NOW())";

        $query = $this->con->query($st);
        $result = Notification::registeredRecord($query);

      }
      else
      {
        $result = Notification::existsUser();
      }
      return $result;
    }

    function saveDataProductoDao($id, $descripcion, $cantidad, $peso_producto, $vencimiento_producto, $presentacion_id, $contenedor_id) {
      $st = "UPDATE productos SET descripcion='$descripcion', cantidad='$cantidad', peso_producto='$peso_producto', vencimiento_producto='$vencimiento_producto', presentacion_id='$presentacion_id', contenedor_id='$contenedor_id'";
      $query = $this->con->query($st);
      $result = Notification::updatedRecord($query);
      return $result;
    }

    function eliminarProductoDao($id) {
      $st = "DELETE FROM productos WHERE producto_id='$id'";
      $query = $this->con->query($st);
      $result = Notification::deletedRecord($query);
       return $result;
    }

    function traeProductosDao() {

      $data = "";
      $st = "SELECT * FROM productos";
      $query= $this->con->query($st);

      while ($row =  mysqli_fetch_array($query) ) {

      $editar = '<a href=\"#\" data-toggle=\"modal\" data-target=\"#myModalActualiza\" id=\"'.$row['producto_id'].'\" onclick=\"traeDatosProductoId(this)\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>';
      $eliminar = '<a href=\"#\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\" id=\"'.$row['producto_id'].'\" onclick=\"delProducto(this)\" class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>';

        $data.='{
              "id":"'.$row['producto_id'].'",
              "descripcion":"'.$row['descripcion'].'",
              "cantidad":"'.$row['cantidad'].'",
              "peso":"'.$row['peso_producto'].'",
              "vencimiento":"'.$row['vencimiento_producto'].'",
              "presentacion":"'.$row['presentacion_id'].'",
              "contenedor":"'.$row['contenedor_id'].'",
              "fecha":"'.$row['fregistro'].'",
              "acciones":"'.$editar.$eliminar.'"
            },';
    }
        $data = substr($data,0, strlen($data) - 1);
        $result =  '{"data":['.$data.']}';

        return $result;
    }

    function actualizarProductoDao($id) {
      $cad = "";
      $st = "SELECT * FROM productos WHERE producto_id = '$id'";

      $query= $this->con->query($st);

      while ($row =  mysqli_fetch_array($query) ) {

        $cad = '
            <fieldset>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="a" value="'.$row['producto_id'].'">
                    <div class="col-lg-4">
                        <div class="form-group" id="campodescripcion">
                            <label class="control-label" for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="b" autofocus value="'.$row['descripcion'].'" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group" id="campocantidad">
                            <label class="control-label" for="cantidad">Cantidad</label>
                            <input type="text" class="form-control" id="cantidad" name="c" value="'.$row['cantidad'].'" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group" id="campopeso_producto">
                            <label class="control-label" for="peso_producto">Peso producto</label>
                            <input type="text" class="form-control" id="peso_producto" name="d" value="'.$row['peso_producto'].'" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group" id="campovencimiento">
                            <label class="control-label" for="vencimiento_producto">Vencimiento del producto</label>
                            <input type="text" class="form-control" id="vencimiento_producto" name="j" value="'.$row['vencimiento_producto'].'" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group" id="campoPresentacion">
                            <select class="form-control" id="presentacion_id" name="k">
                                <option selected value="'.$row['presentacion_id'].'">--Click para cambiar--</option>
                                <option value="14">Presentacion 1</option>
                                <option value="2">Presentacion 2</option>
                                <option value="3">Presentacion 3</option>
                            </select>
                        </div>
                    </div><div class="col-lg-6">
                        <div class="form-group" id="campoContenedor">
                            <select class="form-control" id="contenedor_id" name="l">
                                <option selected value="'.$row['contenedor_id'].'">--Click para cambiar--</option>
                                <option value="1">Contenedor 1</option>
                                <option value="2">Contenedor 2</option>
                                <option value="3">Contenedor 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-lg-offset-8">
                        <div class="form-group">
                              <a href="#" class="btn btn-primary btn-block" onclick="upProducto()">Actualizar</a>
                        </div>
                    </div>
                </div>
            </fieldset>
        ';

    }
    return $cad;
    }
}
?>
