<?php

class conexion {

    private static $host = "localhost";
    private static $user = "root";
    private static $pwd = "";
    private static $bd = "control_usuarios";

    public static function conectar() {
        return mysqli_connect(conexion::$host, conexion::$user, conexion::$pwd, conexion::$bd);
    }

}
?>
