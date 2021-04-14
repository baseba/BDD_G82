-- crear base de datos
-- CREATE DATABASE proyectotest;

-- Crear tablas 
-- Tabla Usuarios
CREATE TABLE Unidades (
    id int PRIMARY KEY,
    direccion  varchar(120)
);
-- Tablas Comunas 
CREATE TABLE Comunas (
    id int PRIMARY KEY,
    nombre varchar(30)
);
-- Tabla Relacional despacha en
CREATE TABLE Despacha_en (
    id_unidad int,
    id_comuna int,
    PRIMARY KEY (id_comuna, id_unidad)
);

-- Tablas Vehiculos 
CREATE TABLE Vehiculos (
    pantente varchar(6) PRIMARY KEY,
    estado varchar(20),
    tipo varchar(50),
    categoria int
);
-- Tabla Tipos

-- vehiculos frescos
CREATE TABLE Vehiculos_frescos (
    alcance int
)INHERITS (Vehiculos)
;
-- vehiculos frio
CREATE TABLE Vehiculos_frio (
    q_compartimientos int,
    id_compartimiento int
)INHERITS (Vehiculos);

--compartimientos frio
CREATE TABLE compartimientos (
    patente int,
    n_compartimiento int,
    capacidad_compartiminento int,
    PRIMARY key (patente, n_compartimiento)
);
--
CREATE TABLE Vehiculos_carga(
    volumen int,
    carga_maxima int
)INHERITS(Vehiculos);



-- Tabla Personal 
CREATE TABLE Personal (
    rut int PRIMARY KEY,
    nombre varchar(30),
    sexo int,
    edad int,
    tipo int
);

-- Tabla Despachos
CREATE TABLE Despachos (
    id int PRIMARY KEY,
    fecha date,
    origen varchar(50),
    destino varchar(50),
    id_compra int,
    id_vehiculo int
);