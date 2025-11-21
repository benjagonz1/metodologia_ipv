Sistema de Gestión de Inspecciones del IPV 

Integrantes:

Aveiro Matías
González Benjamín
Romero Camila

Descripción del proyecto

Este sistema permite gestionar las inspecciones de viviendas del Instituto Provincial de la Vivienda (IPV).
Incluye gestión de inspecciones, usuarios, estados y reportes. Fue desarrollado en PHP, sin frameworks.

Tecnologías utilizadas

PHP 8+
MySQL
XAMPP
PHPUnit (tests)
Composer (autoload + dependencias)
Jira(Scrum)
PowerBI (opcional, análisis)


Instalación y ejecución

1) Clonar el repositorio

git clone https://github.com/benjagonz1/metodologia_ipv.git
2) Importar la base de datos

Abrir phpMyAdmin → Importar → Seleccionar:
/sql/db_ipv_proyecto.sql

3) Configurar entorno

Copiar el archivo:
cp .env.example .env

Modificar credenciales según nuestro XAMPP:

DB_HOST=localhost
DB_NAME=db_ipv_proyecto
DB_USER=root
DB_PASS=

4) Instalar dependencias
composer install

5) Ejecutar la aplicación

Ingresar en el navegador:

http://localhost/ipvsistema_php_puro/public/

Tests:
Para correr los tests:
composer test

Linter:
composer lint

CI/CD:
Nuestro workflow hace 3 tareas principales:

Se ejecuta cuando hacés push o un pull request hacia main.
Instala PHP 8.2 + extensiones.
Instala dependencias de Composer.
Valida sintaxis de todos los archivos .php.

