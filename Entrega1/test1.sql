-- crear base de datos
--CREATE DATABASE proyectotest;

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
    categoria int,
    id_unidad int
);
-- Tabla Tipos

-- vehiculos frescos
CREATE TABLE Vehiculos_frescos (
    pantente varchar(6) PRIMARY KEY,
    alcance int
);

-- vehiculos frio
CREATE TABLE Vehiculos_frio (
    pantente varchar(6) PRIMARY KEY,
    q_compartimientos int,
    id_compartimiento int
); -- id_compartimiento

--compartimientos frio
CREATE TABLE compartimientos (
    pantente varchar(6) PRIMARY KEY,
    n_compartimiento int,
    capacidad_compartiminento int
);
--
CREATE TABLE Vehiculos_carga(
    volumen int,
    pantente varchar(6) PRIMARY KEY,
    carga_maxima int
);



-- Tabla Personal 
CREATE TABLE Personal (
    rut int PRIMARY KEY,
    nombre varchar(30),
    sexo int,
    edad int,
    tipo int
);
-- PERSONAL ADMINISTRATIVO
CREATE TABLE Personal_administrativo (
    rut int PRIMARY KEY,
    id_unidad int,
    calificacion int,
    es_jefe int
);


-- PERSONAL REPARTIDOR
CREATE TABLE repartidor (
    rut int PRIMARY KEY,
    licencia varchar(30)
);

-- tabla que asocia vehiculos con repartidores es n:n

CREATE TABLE maneja (
    rut int ,
    patente varchar(6) ,
    PRIMARY key (rut, patente)
);


-- Tabla Despachos
CREATE TABLE Despachos (
    id int PRIMARY KEY,
    fecha date,
    origen varchar(50),
    destino varchar(50),
    id_comuna int,
    id_compra int,
    patente_vehiculo varchar(6),
    rut_repartidor int
);