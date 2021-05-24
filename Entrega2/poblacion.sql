\COPY direcciones FROM datos/general/direcciones.csv DELIMITER ',' CSV HEADER;
\COPY despachos FROM datos/ParesV3/ParesV3/despachosV2.csv DELIMITER ',' CSV HEADER;
\COPY personal FROM datos/ParesV3/ParesV3/personalV2.csv DELIMITER ',' CSV HEADER;
\COPY unidades FROM datos/ParesV3/ParesV3/unidades.csv DELIMITER ',' CSV HEADER;
\COPY vehiculos FROM datos/ParesV3/ParesV3/vehiculos.csv DELIMITER ',' CSV HEADER;
-- ver personal y vehiculos issues que hacer con datos repetidos hablar con juaco
