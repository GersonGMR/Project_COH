var x;
x = $(document);
x.ready(inicializarEventos);

function inicializarEventos() {
    loadUsers();
    loadProducts();
}
function loadUsers() {
    $('#contenido').html("");
    $.post("users.php", function(response) {
        $('#contenido').html(response);
        $('#contenido').fadeIn();
    });
function loadProducts() {
    $('#contenido').html("");
    $.post("productos.php", function(response) {
        $('#contenido').html(response);
        $('#contenido').fadeIn();
    });
}
