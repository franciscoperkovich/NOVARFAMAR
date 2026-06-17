#Taller de Programacion 1
#Proyecto Laravel del Grupo 23
#Proyecto NovaFarmar

#Lopez Machado Victor Roman
#Gomez Perkovich Francisco

NovaFarmar

Descripción:
NovaFarmar es una aplicación web desarrollada en Laravel para la gestión y comercialización de productos farmacéuticos. El sistema permite la administración de productos, usuarios, compras y generación de facturas PDF.

Tecnologías Utilizadas:
PHP
Laravel
MariaDB
Laravel Herd
Composer
DomPDF (barryvdh/laravel-dompdf)
HTML, CSS y JavaScript

Instalación:
1. Clonar el repositorio
git clone https://github.com/franciscoperkovich/NOVARFAMAR.git

2. Ingresar al directorio del proyecto
cd NovaFarmar

3. Instalar dependencias
composer install

3.1 Dependencias Adicionales
El proyecto utiliza la librería barryvdh/laravel-dompdf para la generación de comprobantes y documentos PDF. Esta dependencia se instala automáticamente mediante: composer install
En caso de ser necesario, puede instalarse manualmente con => composer require barryvdh/laravel-dompdf


4. Configurar variables de entorno
Copiar el archivo .env.example a .env.
Configurar la conexión a la base de datos:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=novafarmar
DB_USERNAME=usuario
DB_PASSWORD=contraseña

5. Generar la clave de la aplicación
php artisan key:generate

6. Crear la estructura de la base de datos y cargar datos iniciales
php artisan migrate --seed

Para una instalación completamente limpia:
php artisan migrate:fresh --seed

7. Ejecutar la aplicación
El proyecto fue desarrollado utilizando Laravel Herd.
Una vez configurado el entorno, acceder al dominio local generado por Herd desde el navegador.
Funcionalidades
Registro e inicio de sesión de usuarios.
Gestión de productos.
Gestión de categorías.
Carrito de compras.
Gestión de compras.
Panel de administración.
Generación de facturas PDF mediante DomPDF.

Base de Datos
Motor utilizado:
MariaDB
Nombre de la base de datos esperado:
novafarmar

La estructura de la base de datos y los datos iniciales se generan automáticamente mediante las migraciones y seeders incluidos en el proyecto.

Credenciales de Prueba:

Administrador
Correo:
admin@admin.com
Contraseña:
admin23

Cliente
Correo:cliente@cliente.com
Contraseña:cliente23
