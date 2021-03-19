<?php
require_once "../controlador/sessionValidate.php";
require_once "../controlador/sessionUserTypeAdmin.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Usuarios</title>
    <!--CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap-yeti.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
</head>
<body>

    <div id="response"></div>

    <!-- DATATABLE -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#" class="btn btn-info" onclick="loadProducts()"><i class="fa fa-refresh"></i>&nbsp;Refrescar</a>
            </div>
        </div>
        <div class="row">
            <div id="mensaje-delete"></div>
            <h1>Productos
                <a href="" data-toggle="modal" data-target="#myModal"  class="btn btn-success pull-right menu"><i class="fa fa-user-plus " aria-hidden="true"></i>&nbsp;Nuevo producto</a>
            </h1>
        </div>
        <div class="row">
        <table id="example" class="table table-striped table-bordered table-responsive">
            <thead>
            <tr>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Peso producto</th>
                <th>Fecha de vencimiento</th>
                <th>Presentacion id</th>
                <th>Contenedor id</th>
                <th>Fecha de registro</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            <tr>
              <th>Id</th>
              <th>Descripcion</th>
              <th>Cantidad</th>
              <th>Peso producto</th>
              <th>Fecha de vencimiento</th>
              <th>Presentacion id</th>
              <th>Contenedor id</th>
              <th>Fecha de registro</th>
              <th>Acciones</th>
            </tr>
            </tfoot>
        </table>
        </div>
    </div>
    <!-- END DATATABLE -->

    <!-- MODAL REGISTER -->
    <div class="modal fade in" id="myModal" >
        <div class="modal-dialog" style="width:50%;">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
                    <h4 class="modal-title"><b></b>Registro de producto</h4>
                </div>
                <div class="modal-body">
                    <div class="row-fluid" id="notificacion"></div>
                    <form id="formregistro">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <div class="form-group" id="campodescripcion">
                                        <label class="control-label" for="descripcion">Descripcion</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group" id="campocantidad">
                                        <label class="control-label" for="cantidad">Cantidad</label>
                                        <input type="text" class="form-control" id="cantidad" name="cantidad">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group" id="campopeso_producto">
                                        <label class="control-label" for="nombre">Peso producto</label>
                                        <input type="text" class="form-control" id="peso_producto" name="peso_producto">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group" id="campovencimiento">
                                        <label class="control-label" for="vencimiento">Vencimiento</label>
                                        <input type="text" class="form-control" id="vencimiento_producto" name="vencimiento_producto">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group" id="campoPresentacion">
                                      <label class="control-label" for="presentacion">Presentacion</label>
                                        <select class="form-control" id="presentacion_id" name="presentacion_id">
                                            <option value="14">Presentacion 1</option>
                                            <option value="2">Presentacion 2</option>
                                            <option value="3">Presentacion 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group" id="campoContenedor">
                                      <label class="control-label" for="contenedor_id">Contenedor</label>
                                        <select class="form-control" id="contenedor_id" name="contenedor_id">
                                            <option value="1">Contenedor 1</option>
                                            <option value="2">Contenedor 2</option>
                                            <option value="3">Contenedor 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-lg-offset-8">
                                    <div class="form-group">
                                         <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
     </div>
     <!-- END MODAL REGISTER -->

     <!-- MODAL UPDATE -->
    <div class="modal fade in" id="myModalActualiza" >
        <div class="modal-dialog" style="width:50%;">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><b></b>Actualizar producto</h4>
                </div>
                <div class="modal-body">
                    <div class="row-fluid" id="mensaje"></div>
                    <form id="formactualizar">
                    <div id="contenido-update"></div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL UPDATE -->

    <!--Javascript-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/productojs.js"></script>
</body>
</html>
