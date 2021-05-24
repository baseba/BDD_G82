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
    unidad int,
    tipo_licencia varchar(50),
    vehículo int,
    PRIMARY KEY (id)
);

CREATE TABLE unidades (
    id int,
    dirección int,
    jefe int,
    comuna_cobertura varchar(50),
    PRIMARY KEY (id)
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