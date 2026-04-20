<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Caso2AmbienteWeb/CasoEstudio2Miercoles/DataBase/conexion.php";
// Funciones del Model
// Consulta todas las casas
function ConsultarCasasModel() {
    $context = null;
    try {
        $context = Conectar();
        $result = $context->query("SELECT * FROM Vista_ConsultaCasas");
        if (!$result) throw new Exception("Error en consulta: " . $context->error);
        return $result;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return null;
    } finally {
        if ($context) mysqli_close($context);
    }
}
// Consulta las casas que estan disponibles
function ConsultarCasasDisponiblesModel() {
    $context = null;
    try {
        $context = Conectar();
        $result = $context->query("SELECT * FROM Vista_CasasDisponibles");
        if (!$result) throw new Exception("Error en consulta: " . $context->error);
        return $result;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return null;
    } finally {
        if ($context) mysqli_close($context);
    }
}
// Funcion de registrar un alquiler de una casa
function RegistrarAlquilerModel($idCasa, $usuarioAlquiler) {
    $context = null;
    try {
        $context = Conectar();
        $stmt = $context->prepare("CALL sp_AlquilarCasa(?, ?)");
        if (!$stmt) throw new Exception("Error preparando SP: " . $context->error);
        $stmt->bind_param("is", $idCasa, $usuarioAlquiler);
        $result = $stmt->execute();
        if (!$result) throw new Exception("Error ejecutando SP: " . $stmt->error);
        $stmt->close();
        return true;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    } finally {
        if ($context) mysqli_close($context);
    }
}
?>
