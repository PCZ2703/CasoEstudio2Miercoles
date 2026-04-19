<?php

require_once '../DataBase/conexion.php'; 

class CasasModel {
    private $db;

    public function __construct() {
       
        $this->db = Conexion::conectar();
    }

    // Obtener casas para la Vista de Consulta
    public function consultarCasas() {
        $sql = "CALL sp_ConsultarCasas()";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener solo casas disponibles para el DropdownList 
    public function obtenerCasasDisponibles() {
        $sql = "CALL sp_ObtenerCasasDisponibles()";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Procesar el alquiler de una casa 
    public function alquilarCasa($idCasa, $usuario) {
        $sql = "CALL sp_AlquilarCasa(?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $idCasa, PDO::PARAM_INT);
        $stmt->bindParam(2, $usuario, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
}
?>
