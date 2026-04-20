<?php

// Model con ruta correcta
include_once $_SERVER["DOCUMENT_ROOT"] . "/Caso2AmbienteWeb/CasoEstudio2Miercoles/Model/CasasModel.php";

// Inicia sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Funciones del Controller
function ConsultarCasas() {
    return ConsultarCasasModel();
}

function ConsultarCasasDisponibles() {
    return ConsultarCasasDisponiblesModel();
}

// Maneja las acciones por GET
$action = $_GET['action'] ?? '';

switch ($action) {

    case 'consulta':
        $basePath = '../';
        include '../View/ConsultaCasas.php';
        break;

    case 'alquiler':
        $basePath = '../';
        include '../View/AlquilerCasas.php';
        break;

    case 'procesar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $idCasa          = isset($_POST["IdCasa"]) ? (int) $_POST["IdCasa"] : 0;
            $usuarioAlquiler = isset($_POST["UsuarioAlquiler"]) ? trim($_POST["UsuarioAlquiler"]) : '';

            // Validación server-side
            if ($idCasa <= 0 || empty($usuarioAlquiler)) {
                $_SESSION["Mensaje"] = "Datos inválidos, verifique los campos.";
                header("Location: ../Controller/CasasController.php?action=alquiler");
                exit;
            }

            // Llama al model
            $result = RegistrarAlquilerModel($idCasa, $usuarioAlquiler);

            if ($result) {
                $_SESSION["Mensaje"] = "Casa alquilada correctamente.";
                header("Location: ../Controller/CasasController.php?action=consulta");
            } else {
                $_SESSION["Mensaje"] = "Error al procesar el alquiler.";
                header("Location: ../Controller/CasasController.php?action=alquiler");
            }
            exit;
        }
        break;

    default:
        header('Location: ../Controller/CasasController.php?action=consulta');
        exit;
}
?>