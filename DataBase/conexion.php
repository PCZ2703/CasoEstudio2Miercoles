<?php
// conexion a la data base
function Conectar() {
    $context = mysqli_connect("127.0.0.1:3306", "root", "", "CasoEstudioMN");
    if (!$context) {
        throw new Exception("Error de conexión: " . mysqli_connect_error());
    }
    return $context;
}
?>