#Taller de Programacion 1
#Proyecto Laravel del Grupo 23
#Proyecto NovaFarmar

#Lopez Machado Victor Roman
#Gomez Perkovich Francisco

Proyecto NovaFarmar -Laravel- Grupo 23

Tecnologías utilizadas:
Laravel
PHP
MariaDB
HeidiSQL
Composer
Laravel Herd
DomPDF para generación de archivos PDF
Bootstrap
JavaScript

Instalación:

.Clonar el repositorio =>git clone https://github.com/franciscoperkovich/NOVARFAMAR.git

.Ingresar al directorio del proyecto

.Instalar dependencias =>composer install

.Crear el archivo de configuración=> Copiar el archivo .env.example y renombrarlo como .env.

.Configurar los datos de conexión a la base de datos(los datos de la base de datos estan el el .doc)

.Importar la base de datos=> Importar el archivo de la base de datos (los datos de la base de datos estan el el .doc) 

.Generar la clave de aplicación=> php artisan key:generate

.Instalar dependencias adicionalesEl proyecto utiliza DomPDF para la generación de comprobantes y reportes PDF=>composer require barryvdh/laravel-dompdf

Ejecutar el proyecto
El proyecto fue desarrollado utilizando Laravel Herd.
Una vez configurado Herd y la base de datos, acceder al dominio local generado por Herd desde el navegador.

Funcionalidades principales:
Registro e inicio de sesión de usuarios.
Gestión de productos.
Carrito de compras..
Generación de facturas PDF mediante DomPDF.
Panel de administración.
Base de datos

Motor utilizado:
MariaDB
Administrador utilizado:
HeidiSQL


