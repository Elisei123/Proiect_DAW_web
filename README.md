# TO DO List
*Autor: Elisei*\
[Documentatie](https://drive.google.com/open?id=198RIMLuGekpM31UkOgnbF9phJbOBTh7m "Documentatie")
 
## MYSQL config

CREATE TABLE accounts (
    ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,\
    Username varchar(255),\
    Nume varchar(255),\
    Prenume varchar(255),\
    Email varchar(255),\
    Parola varchar(255)\
);

CREATE TABLE tasks (\
    ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,\
    Task varchar(255),\
    Data_curenta varchar(255),\
    ID_USER int(255),\
    Efectuat varchar(255),\
    data_task_efectuat varchar(255)\
);




