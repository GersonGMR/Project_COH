<?php 

	include 'presentacionesModel.php';
	$model = new presentaciones();
	$id = $_REQUEST['id'];
	$delete = $model->eleminar_presentacion($id);

	if ($delete) {
		echo "<script>alert('presentacion eliminada');</script>";
		echo "<script>window.location.href = 'vista_presentaciones.php';</script>";
	}

 ?>