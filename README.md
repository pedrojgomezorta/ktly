# Ktly - Acortador de URLs gratuito sin publicidad

Cómo instalar:

Usar entorno LAMP

Database:
CREATE DATABASE ktly

USE ktly

CREATE TABLE url (
    id int (11) NOT NULL AUTO_INCREMENT, 
    url varchar(255),
    token varchar(500),
    PRIMARY KEY (id)
);

CREATE USER 'ktly'@'localhost' IDENTIFIED BY 'k0t1ytk';

GRANT ALL PRIVILEGES ON ktly. * TO 'ktly'@'localhost';
