<?php

// Para la Parte 3: Vista de Consulta (con filtros de precio y estado)
function ConsultarCasasModel()
{
    $context = mysqli_connect("127.0.0.1:3306", "root", "", "CasoEstudioMN");
    
    
    $query = "SELECT * FROM Vista_ConsultaCasas"; 
    
    $result = $context->query($query);
    mysqli_close($context);
    return $result;
}

// Para cargar el Dropdown de la Vista Alquiler (solo casas disponibles)
function ConsultarCasasDisponiblesModel()
{
    $context = mysqli_connect("127.0.0.1:3306", "root", "", "CasoEstudioMN");
    
    
    $query = "SELECT * FROM Vista_CasasDisponibles"; 
    
    $result = $context->query($query);
    mysqli_close($context);
    return $result;
}

// Para procesar el alquiler de la casa
function RegistrarAlquilerModel($idCasa, $usuarioAlquiler)
{
    $context = mysqli_connect("127.0.0.1:3306", "root", "", "CasoEstudioMN");
    
    
    $sp = "CALL sp_AlquilarCasa($idCasa, '$usuarioAlquiler')";
    
    $result = $context->query($sp);
    mysqli_close($context);
    return $result;
}

?>