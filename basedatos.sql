create database CasoEstudioMN; 

use CasoEstudioMN;

create table CasaSistema (
	idCasa bigint not null auto_increment primary key,
    DescripcionCasa varchar(30) not null, 
    PrecioCasa decimal (10,2) not null,
    UsuarioAlquiler varchar(30),
    FechaAlquiler date); 
    
   CREATE VIEW Vista_ConsultaCasas AS
SELECT 
    DescripcionCasa, 
    PrecioCasa, 
    IFNULL(UsuarioAlquiler, 'N/A') AS Usuario,
    IF(UsuarioAlquiler IS NULL, 'Disponible', 'Reservada') AS Estado,
    DATE_FORMAT(FechaAlquiler, '%d/%m/%Y') AS FechaFormateada
FROM CasaSistema
WHERE PrecioCasa BETWEEN 115000 AND 180000;

CREATE VIEW Vista_CasasDisponibles AS
SELECT IdCasa, DescripcionCasa, PrecioCasa
FROM CasaSistema
WHERE UsuarioAlquiler IS NULL; 



Delimiter //

Create procedure sp_AlquilarCasa (
	IN p_IdCasa bigint, 
    in p_Usuario varchar(30)
)
begin 
	update CasaSistema
    set UsuarioAlquiler = p_Usuario,
    FechaAlquiler = NOW()
    WHERE IdCasa = p_IdCasa;

END//
Delimiter ;


INSERT INTO CasaSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler) 
VALUES ('Casa de Prueba', 150000, NULL, NULL);

DROP VIEW IF EXISTS Vista_ConsultaCasas;
DROP VIEW IF EXISTS Vista_CasasDisponibles;

        