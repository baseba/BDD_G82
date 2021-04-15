-- Unidades
INSERT INTO Unidades VALUES (1, 'calle 1');
INSERT INTO Unidades VALUES (2, 'calle 2');
INSERT INTO Unidades VALUES (3, 'calle 3');
INSERT INTO Unidades VALUES (4, 'calle 4');
INSERT INTO Unidades VALUES (5, 'calle 5');
-- Comunas 
INSERT INTO Comunas VALUES (1, 'San Joaquín');
INSERT INTO Comunas VALUES (2, 'Valparaiso');
INSERT INTO Comunas VALUES (3, 'Nuñoa');
INSERT INTO Comunas VALUES (4, 'San Antonio');
INSERT INTO Comunas VALUES (5, 'Arica');
INSERT INTO Comunas VALUES (6, 'Punta Arenas');

-- Relacional despacha en

INSERT INTO Despacha_en VALUES (5,1);
INSERT INTO Despacha_en VALUES (5,3);
INSERT INTO Despacha_en VALUES (1,1);
INSERT INTO Despacha_en VALUES (1,2);
INSERT INTO Despacha_en VALUES (2,5);
INSERT INTO Despacha_en VALUES (2,2);

-- Vehiculos 

INSERT INTO Vehiculos VALUES ('GHSI45', 'Activo', 'Moto', 3);
INSERT INTO Vehiculos VALUES ('KDOW78', 'Mantencion', 'Camioneta', 1);
INSERT INTO Vehiculos VALUES ('TDBW35', 'Activo', 'Camioneta', 2);
INSERT INTO Vehiculos VALUES ('YUSL35', 'Activo', 'Bicicleta', 3);
INSERT INTO Vehiculos VALUES ('BSJX93', 'Activo', 'Bicicleta', 3);
INSERT INTO Vehiculos VALUES ('KOSS25', 'Activo', 'Camioneta', 1);

-- Personal 
INSERT INTO Personal VALUES (17896545, 'Juan Perez', 0 , 22, 0);
INSERT INTO Personal VALUES (20145789, 'Juana Soto', 1 , 18 1);
INSERT INTO Personal VALUES (19867565, 'Juan Gonzales', 0 , 22, 1);
INSERT INTO Personal VALUES (20458765, 'Sebastian Espejo', 1 , 25, 0);
INSERT INTO Personal VALUES (18789854, 'Paz Marin', 1 , 19, 1);
INSERT INTO Personal VALUES (19871355, 'Joaquin Concha', 0 , 20, 1);
INSERT INTO Personal VALUES (14568562, 'Jose Diaz', 0 , 30, 0);
INSERT INTO Personal VALUES (17454541, 'Pedro Martinez', 0 , 20, 1);

INSERT INTO maneja VALUES (17896545, 'GHSI45');
INSERT INTO maneja VALUES (20145789, 'KDOW78');
INSERT INTO maneja VALUES (20145789, 'YUSL35');
INSERT INTO maneja VALUES (20458765, 'BSJX93');
INSERT INTO maneja VALUES (17454541, 'BSJX93');
INSERT INTO maneja VALUES (17454541, 'KOSS25');

-- Despacho 

INSERT INTO Despachos VALUES (1, '2020-12-24', 'Las cabras 2321', 'Calle Falsa', 3, 'BSJX93');
