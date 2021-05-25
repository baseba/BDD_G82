import csv
from os import write 
# -- personal(id nombre rut sexo edad clasificacion)
# -- una relacion trabaja_en(id personal, unidad)
# -- "" licencia_de(id_personal tipo licencia)
# -- "" maneja_a(id_personal, id_vehiculo)
personal = []
trabaja_en = []
licencia_de = []
maneja_a = []
unidades = [] ## id , direccoin jefe
opera_en = [] #id undidad , nombre comuna

with open('datos\\ParesV3\\ParesV3\\unidades.csv', mode='r', encoding='utf-8') as csv_file:
    csv_reader = csv.DictReader(csv_file)
    buffer = []
    for row in csv_reader:
        if row['id'] in buffer:
            continue
        buffer.append(row['id'])
        unidades.append([row['id'], row['dirección'], row['jefe']])

with open('datos\ParesV3\ParesV3\\unidades.csv', mode='r', encoding='utf-8') as csv_file:
    csv_reader = csv.DictReader(csv_file)
    for row in csv_reader:
        opera_en.append([row['id'], row['comuna_cobertura']])

with open('datos\ParesV3\ParesV3\\unidades_clean.csv', mode='w', newline='', encoding='utf-8') as csv_file:
    writer = csv.writer(csv_file)
    writer.writerow(['id','dirección','jefe','comuna_cobertura'])
    writer.writerows(unidades)

with open('datos\ParesV3\ParesV3\personalV2.csv', mode='r', encoding='utf-8') as csv_file:
    csv_reader = csv.DictReader(csv_file)
    buffer = []
    for row in csv_reader:
        if row['id'] in buffer:
            continue
        buffer.append(row['id'])
        personal.append(
            [row["id"], row["nombre"], row["rut"], row["sexo"], row["edad"], row["clasificacion"]])

    ## separado porque queremos las repetes para vehiculos y unidades
with open('datos\ParesV3\ParesV3\personalV2.csv', mode='r', encoding='utf-8') as csv_file:
    csv_reader = csv.DictReader(csv_file)
    for row in csv_reader:
        trabaja_en.append([row['id'], row['unidad']])
        licencia_de.append([row['id'], row['tipo_licencia']])
        maneja_a.append([row['id'], row['vehículo']])

# print(personal)
with open('datos\ParesV3\ParesV3\personal_clean.csv', mode='w', newline='', encoding='utf-8') as csv_file:
    writer = csv.writer(csv_file)
    writer.writerow(['id','nombre','rut','sexo','edad','clasificacion'])
    writer.writerows(personal)
        
with open("datos\ParesV3\ParesV3\\trabaja_en.csv", mode='w', newline='', encoding='utf-8') as csv_file:
    writer = csv.writer(csv_file)
    writer.writerow(['id_personal', 'id_unidad'])
    writer.writerows(trabaja_en)

with open("datos\ParesV3\ParesV3\licencia_de.csv", mode='w', newline='', encoding='utf-8') as csv_file:
    writer = csv.writer(csv_file)
    writer.writerow(['id_personal', 'licencia'])
    writer.writerows(licencia_de)

with open("datos\ParesV3\ParesV3\maneja_a.csv", mode='w', newline='', encoding='utf-8') as csv_file:

    writer = csv.writer(csv_file)
    writer.writerow(['id_personal', 'id_vehiculo'])
    writer.writerows(maneja_a)


## opera_en

with open("datos\ParesV3\ParesV3\cobertura.csv", mode='w', newline='', encoding='utf-8') as csv_file:

    writer = csv.writer(csv_file)
    writer.writerow(['id_unidad', 'comuna'])
    writer.writerows(opera_en)
