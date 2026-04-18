<?php
// Para la Parte 3: Vista de Consulta (con filtros de precio y estado)
function ConsultarCasasModel()
{
    $context = null;
    try {
        $context = mysqli_connect("127.0.0.1:3306", "root", "", "CasoEstudioMN");

        if (!$context) {
            throw new Exception("Error de conexión: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM Vista_ConsultaCasas";
        $result = $context->query($query);

        if (!$result) {
            throw new Exception("Error en la consulta: " . $context->error);
        }

        return $result;

    } catch (Exception $e) {
        error_log($e->getMessage());
        return null;
    } finally {
        if ($context) mysqli_close($context);
    }
}
// Para cargar el Dropdown de la Vista Alquiler (solo casas disponibles)
function ConsultarCasasDisponiblesModel()
{
    $context = null;
    try {
        $context = mysqli_connect("127.0.0.1:3306", "root", "", "CasoEstudioMN");

        if (!$context) {
            throw new Exception("Error de conexión: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM Vista_CasasDisponibles";
        $result = $context->query($query);

        if (!$result) {
            throw new Exception("Error en la consulta: " . $context->error);
        }

        return $result;

    } catch (Exception $e) {
        error_log($e->getMessage());
        return null;
    } finally {
        if ($context) mysqli_close($context);
    }
}
// Para procesar el alquiler de la casa
function RegistrarAlquilerModel($idCasa, $usuarioAlquiler)
{
    $context = null;
    try {
        $context = mysqli_connect("127.0.0.1:3306", "root", "", "CasoEstudioMN");

        if (!$context) {
            throw new Exception("Error de conexión: " . mysqli_connect_error());
        }

        $stmt = $context->prepare("CALL sp_AlquilarCasa(?, ?)");

        if (!$stmt) {
            throw new Exception("Error preparando SP: " . $context->error);
        }

        $stmt->bind_param("is", $idCasa, $usuarioAlquiler);
        $result = $stmt->execute();

        if (!$result) {
            throw new Exception("Error ejecutando SP: " . $stmt->error);
        }

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