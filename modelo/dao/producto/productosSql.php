<?php
class productosSql
{
    public static function  indentificarUsuario()
    {
        $query="SELECT * FROM usuarios WHERE usuario=? AND clave=?";
        return $query;
    }

    public static function  registrarProducto()
    {
        $query="INSERT INTO producto(producto_id,descripcion)VALUES(?,?)";
        return $query;
    }

    public static function validateIfExistsProduct()
    {
        $query = "SELECT * FROM usuarios WHERE producto_id=?";
        return $query;
    }
}
?>
