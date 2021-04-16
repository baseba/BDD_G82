

-- consultas 
-- 1 Mostrar las direccionde todas ñas unidades
SELECT direccion FROM Unidades;

--2  Mostrar todos los vehículos que hayan realizado un despacho a la comuna de San joaquin
SELECT vehiculos 
FROM Comunas, Unidades, Despacha_en, Vehiculos
WHERE Comunas.nombre = 'San Joaquín'
AND Comunas.id = Despacha_en.id_comuna
AND Unidades.id = Despacha_en.id_unidad
AND Unidades.id = Vehiculos.id_unidad;
-- 3 Muestre todos los veh´ıculos que hayan realizado un despacho a la comuna de ‘Valpara´ıso’ en 2021.
SELECT vehiculos 
FROM Despachos, Vehiculos, Comunas
WHERE Vehiculos.pantente = Despachos.patente_vehiculo
AND Comunas.id = Despachos.id_comuna
AND Comunas.nombre = 'Valparaiso';

-- 4  Muestre todos los despachos realizados por un vehiculo tipo bicicleta y cuyo repartidos tenga una edad entre 20 y 25 años
SELECT Despachos
FROM Despachos, Vehiculos, repartidor, Personal, maneja
WHERE Vehiculos.patente = maneja.patente
AND repartidor.rut = maneja.rut
AND Personal.rut = repartidor.rut
AND Despachos.patente_vehiculo = Vehiculos.patente
AND Despachos.rut_repartidor = repartidor.rut
AND Vehiculos.tipo = 'bicicleta'
AND Personal.edad BETWEEN 20 AND 25;

-- 5 encuentre los jefes de las unidades qué realizan despachos a las comunas de arica y punta arenas
SELECT Personal
FROM Personal, Personal_administrativo, Unidades, Comunas, Despacha_en
WHERE Personal_administrativo.es_jefe = 1
AND Personal_administrativo.id_unidad = Unidades.id
AND Personal.rut = Personal_administrativo.rut
AND Unidades.id = Despacha_en.id_unidad
AND Comunas.id = Despacha_en.id_comuna
AND ( Comunas.nombre = 'Arica' OR Comunas.nombre = 'Punta Arenas');

-- 6 Encuentre  la unidad qué maneja más vehiculos de tipo carga

SELECT MAX(COUNT(unidades.id))
FROM Unidades, Vehiculos, pertenece_unidad
WHERE  Unidades.id = pertenece_unidad.id_unidad
AND Vehiculos.patente = pertenece_unidad.patente_vehiculo
AND Vehiculos.tipo = 'carga'
