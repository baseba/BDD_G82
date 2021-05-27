\COPY direcciones FROM datos/general/direcciones.csv DELIMITER ',' CSV HEADER;
\COPY despachos FROM datos/ParesV3/ParesV3/despachosV2.csv DELIMITER ',' CSV HEADER;
\COPY personal FROM datos/ParesV3/ParesV3/personal_clean.csv DELIMITER ',' CSV HEADER;
\COPY unidades FROM datos/ParesV3/ParesV3/unidades_clean.csv DELIMITER ',' CSV HEADER;
\COPY vehiculos FROM datos/ParesV3/ParesV3/vehiculos.csv DELIMITER ',' CSV HEADER;
-- ver personal y vehiculos issues que hacer con datos repetidos hablar con juaco
--pasaremos el csv por un script de python que modifique personal para tener
-- personal(id nombre rut sexo edad clasificacion)
-- una relacion trabaja_en(id personal, unidad)
-- "" licencia_de(id_personal tipo licencia)
-- "" maneja_a(id_personal, id_vehiculo)
\COPY trabaja_en FROM datos/ParesV3/ParesV3/trabaja_en.csv DELIMITER ',' CSV HEADER;
\COPY licencia_de FROM datos/ParesV3/ParesV3/licencia_de.csv DELIMITER ',' CSV HEADER;
\COPY maneja_a FROM datos/ParesV3/ParesV3/maneja_a.csv DELIMITER ',' CSV HEADER;
\COPY cobertura FROM datos/ParesV3/ParesV3/cobertura.csv DELIMITER ',' CSV HEADER;