

-- consultas 
-- Mostrar las direccionde todas ñas unidades
SELECT direccion FROM Unidades;

-- Mostrar todos los vehículos que hayan realizado un despacho a la comuna de Valpo
SELECT vehiculos 
FROM Comunas, Unidades, Despacha_en, Vehiculos
WHERE Comunas.nombre = 'San Joaquín'
AND Comunas.id = Despacha_en.id_comuna
AND Unidades.id = Despacha_en.id_unidad
AND Unidades.id = Vehiculos.id_unidad;
--  Muestre todos los veh´ıculos que hayan realizado un despacho a la comuna de ‘Valpara´ıso’ en 2021.
SELECT vehiculos 
FROM Despachos, Vehiculos, Comunas
WHERE Vehiculos.pantente = Despachos.patente_vehiculo
AND Comunas.id = Despachos.id_comuna
AND Comunas.nombre = 'Valparaiso';

SELECT Personal
FROM Personal, Personal_administrativo, Unidades, Comunas, Despacha_en
WHERE Personal_administrativo.es_jefe = 1
AND Personal_administrativo.id_unidad = Unidades.id
AND Personal.rut = Personal_administrativo.rut
AND Unidades.id = Despacha_en.id_unidad
AND Comunas.id = Despacha_en.id_comuna
AND ( Comunas.nombre = 'Arica' OR Comunas.nombre = 'Punta Arenas');


