

-- consultas 
-- Mostrar las direccionde todas ñas unidades
SELECT direccion FROM Unidades;

-- Mostrar todos los vehículos que hayan realizado un despacho a la comuna de Valpo

FROM Comunas, Unidades, Despacha_en, Vehiculos
WHERE Comunas.nombre = 'San Joaquín'
AND Comunas.id = Despacha_en.id_comuna
AND Unidades.id = Despacha_en.id_unidad

