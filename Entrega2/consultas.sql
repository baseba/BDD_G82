--- consulta 1

SELECT direcciones.nombre_dirección FROM unidades, direcciones
WHERE unidades.dirección = direcciones.id;

--- consulta 2 hay que hacerla en la pagina creo

SELECT vehiculos FROM unidades, vehiculos, direcciones
WHERE unidades.id = direcciones.id
AND vehiculos.unidad = unidades.id
AND direcciones.comuna = 'la serena'  -- aqui se pone la comuna con lo que dice el pdf
;
--- consulta 3
SELECT vehiculos FROM direcciones, despachos, vehiculos
WHERE despachos.dirección_destino = direcciones.id
AND despachos.vehiculo = vehiculos.id
AND direcciones.comuna = 'la serena' --- poder elegir comuna
AND despachos.fecha::text LIKE '2021-%'   --- poder elegir año
; 

-- consulta 4

SELECT despachos FROM despachos, vehiculos, personal 
WHERE despachos.repartidor = personal.id
AND despachos.vehiculo = vehiculos.id
AND vehiculos.tipo = 'moto'
AND personal.edad <= 39
AND personal.edad >= 20
;

-- consulta 5
SELECT personal FROM personal, unidades, cobertura
WHERE personal.id = unidades.jefe
AND  unidades.id = cobertura.id_unidad
AND cobertura.comuna = 'la serena' ---primera comuna a elegir
INTERSECT
SELECT personal FROM personal, unidades, cobertura
WHERE personal.id = unidades.jefe
AND  unidades.id = cobertura.id_unidad
AND cobertura.comuna = 'buin' ---segunda  comuna a elegir
;

-- consulta 6

SELECT unidades.id, COUNT(vehiculos.id) AS cantidad from vehiculos, unidades
WHERE vehiculos.unidad = unidades.id
AND vehiculos.tipo = 'bicicleta'  --elegir tipo
GROUP BY unidades.id
ORDER BY cantidad DESC
LIMIT 1
;