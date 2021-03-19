var x;
x = $(document);
x.ready(inicializarEventos);

function inicializarEventos() {
    loadDataTableProductos();
    tooltip();
    rgProducto();
}

function rgProducto() {
  $('#formregistro').submit(function(event){
  event.preventDefault();
  var descripcion = $("#descripcion").val();
  var cantidad = $("#cantidad").val();
  var peso_producto =$("#peso_producto").val();
  var vencimiento_producto = $("#vencimiento_producto").val();

  if (descripcion == null || descripcion.length == 0) {
    $("#campodescripcion").addClass("has-error");
    alert("Por favor ingresa la descripcion");
    return false;
  }
  else {
    $("#campodescripcion").removeClass("has-error");
  }

  if (cantidad == null || cantidad.length == 0) {
    $("#campocantidad").addClass("has-error");
    alert("Por favor ingresa la cantidad");
    return false;
  }else {
    $("#campocantidad").removeClass("has-error");
  }

  if (peso_producto == null || peso_producto.length == 0) {
    $("#campopeso_producto").addClass("has-error");
    alert("Por favor ingresa el peso.")
    return false;
  }else {
    $("#campopeso_producto").removeClass("has-error");
  }

  if (vencimiento_producto == null || vencimiento_producto.length == 0) {
    $("#campovencimiento").addClass("has-error");
    alert("Por favor ingresa la fecha de vencimiento");
    return false;
  }else {
    $("#campovencimiento").removeClass("has-error");
  }
    $("#notificacion").html("");
    var datos = "action=insert&" + $("#formregistro").serialize();
    $.post("../controlador/productosController.php", datos, function(data) {
        $('#notificacion').html(data);
        $('#notificacion').fadeIn();
    });
  });
}

function upProducto() {
    $("#mensaje").html("");
    var datos = "action=savedata&" + $("#formactualizar").serialize();
    $.post("../controlador/productosController.php", datos, function(data) {
        $('#mensaje').html(data);
        $('#mensaje').fadeIn();
    });
}

function traeDatosProductoId(product) {
  $("#mensaje").html("");
  $('#contenido-update').html("");
  var id    = product.id;
  var datos = "action=update&id="+id ;
  $.post("../controlador/productosController.php", datos, function(data) {
      $('#contenido-update').html(data);
  });
}

function delProducto(product) {
    if(confirm('¿Seguro que desea eliminar este producto?')){
      $("#mensaje-delete").html("");
      var id    = product.id;
      var datos = "action=delete&id="+id ;
      $.post("../controlador/productosController.php", datos, function(data) {
          $('#mensaje-delete').prepend(data);
          $('#mensaje-delete').show('slow');
          $('#mensaje-delete').fadeOut(5000);
      });
    }
}

function loadProducts() {
    $('#contenido').html("");
    $.post("productos.php", function(response) {
        $('#contenido').html(response);
        $('#contenido').fadeIn();
    });
}

function tooltip() {
   $('[data-toggle="tooltip"]').tooltip();
}

function loadDataTableProductos() {
  $('#example').DataTable( {
    "bDeferRender": true,
    "ajax": "../controlador/loadListController.php?action=products",
    "columns": [
    { "data" : "id" },
    { "data" : "descripcion" },
    { "data" : "cantidad" },
    { "data" : "peso"},
    { "data" : "vencimiento"},
    { "data" : "presentacion"},
    { "data" : "contenedor"},
    { "data" : "fecha"},
    { "data" : "acciones"}
    ],
    "sPaginationType": "full_numbers",
    "oLanguage": {
            "sProcessing":     "Procesando...",
        "sLengthMenu": 'Mostrar <select>'+
            '<option value="10">10</option>'+
            '<option value="20">20</option>'+
            '<option value="30">30</option>'+
            '<option value="40">40</option>'+
            '<option value="50">50</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros',
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Filtrar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Por favor espere - cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        }
  });
}
