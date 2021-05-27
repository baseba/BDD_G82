CREATE TABLE direcciones (
    id int,
    nombre_dirección varchar(50),
    comuna varchar(50),
    PRIMARY KEY (id)
);
CREATE TABLE despachos (
    id int,
    fecha TIMESTAMP,
    dirección_origen int,
    dirección_destino int,
    id_compra int,
    vehiculo int,
    repartidor int,
    PRIMARY KEY (id)
);
-- de fecha para abajo hacen referencia a ids de ejemplo id del repartidor encargado
CREATE TABLE personal(
    id int ,
    nombre varchar(50),
    rut varchar(12),
    sexo varchar(20),
    edad int,
    clasificacion varchar(50),
    PRIMARY KEY (id)
);
CREATE TABLE trabaja_en(
    id_personal int,
    unidad int
);

CREATE TABLE licencia_de(
    id_personal int,
    licencia varchar(20)
);

CREATE TABLE maneja_a(
    id_personal int,
    id_vehiculo int

);

CREATE TABLE unidades (
    id int,
    dirección int,
    jefe int,
    --comuna_cobertura varchar(50), -- la comuna de cobertura no es necesariamente la misma que la de la unidad
    PRIMARY KEY (id)
);
CREATE TABLE cobertura (
    id_unidad int,
    comuna varchar(20)
);

CREATE TABLE vehiculos (
    id int,
    patente varchar(8),
    estado varchar(20),
    tipo varchar(20),
    "volumen(m3)" float,
    "carga_máxima(ton)" float,
    "alcance(km)" int,
    "cantidad_compartimentos" int,
    "capacidad_compartimentos(kg)" int,
    unidad int,
    PRIMARY KEY (id)
);