# Ktly - Simple and clean url shortener
## https://ktly.tk/


Ktly es un acortador de urls fácil y rápido de usar, sin publicidad.

## Tecnologías:

Ktly está desarrollado en entorno LAMP:

- HTML
- CSS
- Bootstrap
- Javascript
- Jquery
- PHP
- Apache
- Mysql

## Instalación y configuración:

_Tener corriendo un servidor Apache y la versión 7.4 de PHP_

```
sudo cd /var/www/html/
```
```
sudo git clone https://github.com/pedrojgomezorta/ktly.git
```
_Script para la Base de Datos_
```
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
```
## Configurar virtual Host
_Cambiar AllowOverride None en apache.conf por AllowOverride All_
```
sudo nano /etc/apache2/apache2.conf
```
_Habilitar ssl mod_
```
sudo a2enmod ssl
```
_Habilitar rewrite mod_
```
sudo a2enmod rewrite
```
_Pegar la siguiente configuración y cambiar ServerName y ServerAlias por el tuyo_
```
sudo nano /etc/apache2/sites-available/ktly-ssl.conf
```
```
<IfModule mod_ssl.c>
	<VirtualHost _default_:443>
		
		ServerAdmin webmaster@localhost
		ServerName www.ktly.tk ##YOUR DOMAIN
		ServerAlias ktly.tk ##YOUR DOMAIN
		DocumentRoot /var/www/html/ktly
		ErrorLog ${APACHE_LOG_DIR}/error.log
		CustomLog ${APACHE_LOG_DIR}/access.log combined

		SSLEngine on


		<FilesMatch "\.(cgi|shtml|phtml|php)$">
				SSLOptions +StdEnvVars
		</FilesMatch>
		<Directory /usr/lib/cgi-bin>
				SSLOptions +StdEnvVars
		</Directory>
    </VirtualHost>
</IfModule>

# vim: syntax=apache ts=4 sw=4 sts=4 sr noet
```
_Reiniciar apache para aplicar cambios_
```
sudo systemctl restart apache2
```
## Configurar aplicación:

_Cambiar la var $ulr_ktly por tu url en el archivo class/Ktly.php_

```
<?php
class Ktly{

    public $url;
    public $token;
    private static $url_ktly = "https://ktly.tk" //Cambiar por tu dominio;
    ...
 ```   
 ## Instalar certificado SSL (Opcional)
Sigue la guia de Cerbot
[Cerbot](https://certbot.eff.org/instructions?ws=apache&os=debianbuster)
