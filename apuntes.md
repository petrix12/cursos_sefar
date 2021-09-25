# Plataforma de **Cursos Sefar**
+ **Plataforma en producción en AWS**:
+ **Plataforma de prueba en Heroku**:
+ **Repositorio en GitHub**:

## Antes de iniciar:
1. Crear proyecto en la página de [GitHub](https://github.com) con el nombre: **cursos_sefar**.
    + **Description**: Elaboración de una plataforma de cursos a ofrecer la trasnacional Sefar Universal.
    + **Public**.
2. En la ubicación raíz del proyecto en la terminal de la máquina local:
    + $ git init
    + $ git add .
    + $ git commit -m "Commit 000: Antes de iniciar"
    + $ git branch -M main
    + $ git remote add origin https://github.com/petrix12/cursos_sefar.git
    + $ git push -u origin main

## Preparación del entorno de desarrollo:
1. Páginas de documentación:
	+ [Laravel](https://laravel.com/docs/8.x)
2. Programas necesarios
    + [Git](https://git-scm.com/downloads)
    + [XAMPP](https://www.apachefriends.org/es/download.html)
    + [Composer](https://getcomposer.org)
    + [Visual Studio Code](https://code.visualstudio.com/download)
    + [Node Js](https://nodejs.org)
    + [Workbench](https://dev.mysql.com/downloads/workbench)
3. Instalar el instalador de Laravel:
    + $ composer global require laravel/installer
4. Extensiones requeridas en **Visual Studio Code**:
    + Laravel Blade Snippets
        + Winnie Lin
        + Laravel blade snippets and syntax highlight support
    + Laravel goto view
        + codingyu
        + Quick jump to view
    + Laravel Snippets
        + Winnie Lin
        + Laravel snippets for Visual Studio Code (Support Laravel 5 and above)
    + PHP Intelephense
        + Ben Mewburn
        + PHP code intelligence for Visual Studio Code
    + Tailwind CSS IntelliSense
        + Brad Cornes
        + Intelligent Tailwind CSS tooling for VS Code
5. Aumentar la memoria límite de PHP para evitar errores en la instalación de paquetes:
    + Abrir el archivo **C:\xampp\php\php.ini**.
    + Cambiar el valor:
      + De:
        ```ini
        memory_limit=512M
        ```
      + A:
        ```ini
        memory_limit=-1
        ```
## Creación del proyecto
+ [Ayuda para crear un dominio local](https://codersfree.com/blog/como-generar-un-dominio-local-en-windows-xampp)
1. Crear proyecto **Cursos Sefar**:
    + $ laravel new cursos_sefar --jet
    + Which Jetstream stack do you prefer?
        [0] livewire
        [1] inertia
    + Respuesta: **0**
    + Will your application use teams? (yes/no) [no]: **no**
    + Ingresar a la carpeta raíz del nuevo proyecto.
    + $ npm install
    + $ npm run dev
2. Cambiar el valor de las siguientes variables de entorno en .env:
    ```env
    APP_NAME="Plataforma de Cursos Sefar"
    APP_URL=http://cursos.sefar.test
    DB_DATABASE=sefar_cursos
    FILESYSTEM_DRIVER=public
    ```
3. Crear base de datos **sefar_cursos**.
    + **Nota**: escoger juego de caracteres: utf8_general_ci 
4. Ejecutar las migraciones:
    + $ php artisan migrate
5. Abrir el archivo: **C:\Windows\System32\drivers\etc\hosts** como administrador y en la parte final del archivo escribir.
	```
	127.0.0.1	cursos.sefar.test
	```
5. Guardar y cerrar.
6. Abri el archivo de texto plano de configuración de Apache **C:\xampp\apache\conf\extra\httpd-vhosts.conf**.
7. Ir al final del archivo y anexar lo siguiente:
	+ Si nunca has creado un virtual host agregar:
		```conf
		<VirtualHost *>
			DocumentRoot "C:\xampp\htdocs"
			ServerName localhost
		</VirtualHost>
		```
		+ **Nota**: Esta estructura se agrega una única vez.
	+ Luego agregar:
		```conf
		<VirtualHost *>
			DocumentRoot "C:\xampp\htdocs\sefar\cursos_sefar\public"
			ServerName cursos.sefar.test
			<Directory "C:\xampp\htdocs\sefar\cursos_sefar\public">
				Options All
				AllowOverride All
				Require all granted
			</Directory>
		</VirtualHost>
		```
8. Guardar y cerrar.
9. Reiniciar el servidor Apache.
    + **Nota 1**: ahora podemos ejecutar nuestro proyecto local en el navegador introduciendo la siguiente dirección: http://cursos.sefar.test
    + **Nota 2**: En caso de que no funcione el enlace, cambiar en el archivo **C:\xampp\apache\conf\extra\httpd-vhosts.conf** todos los segmentos de código **<VirtualHost \*>** por **<VirtualHost *:80>**.
10. Crear commit:
    + $ git add .
    + $ git commit -m "Creación del proyecto"
    + $ git push -u origin main




***
≡
    ```php
    ***
    ```




## Para limpiar configuración y reestablecer el cache:
+ $ php artisan config:clear   
+ $ php artisan config:cache 

## En caso de no permitir compilar algo:
+ $ php artisan clear-compiled
+ $ composer dumpautoload

## Deploy del proyecto en Heroku
1. Crear en la raíz del proyecto el archivo **Procfile** (sin extensión) para elegir un servidor apache en Heroku y también indicarle la ubicación del archivo incial index.php:
    ```
    web: vendor/bin/heroku-php-apache2 public/
    ```
2. Ingresar a [Heroku](https://dashboard.heroku.com/apps) e ir a **Dashboard**.
3. Crear un nuevo proyecto en **New > Create new app**
    + Nombre: paymet
4. Ir a Deploy y dar clic en GitHub.
5. Clic en el botón Connect to GitHub e ingresar las credenciales.
6. Seleccionar el repositorio **pasarela_pago** y presionar el botón **Connect**.
7. Para tener siempre la ultima actualización de nuestro proyecto se recomienda presionar el botón **Enable Automatic Deploys**.
8. Presionar el botón Deploy Branch.
9. Descargar e instalar [Heroku CLI](https://devcenter.heroku.com/articles/heroku-cli).
10. En la terminal en la raíz del proyecto en local e iniciar sesión en Heroku:
    + $ heroku login
11. Víncular con la aplicación de Heroku **paymet**:
    + $ git remote add heroku git.heroku.com/paymet.git
        + (git remote set-url Origin git.heroku.com/paymet.git)
    + $ heroku git:remote -a paymet
12. Registrar variables de entorno de la aplicación desde la terminal:
    + $ heroku config:add APP_NAME=PayMet
    + $ heroku config:add APP_ENV=production
    + $ heroku config:add APP_KEY=base64:gUVmds1U2u5m126RsiswRYif8dydHe31tUf143J2X58=
    + $ heroku config:add APP_DEBUG=false
    + $ heroku config:add APP_URL=https://paymet.herokuapp.com/
13. Crear base de datos Postgre SQL desde la terminal:
    + $ heroku addons:create heroku-postgresql:hobby-dev
    + $ heroku pg:credentials:url
    + **Nota**: la salida de la última línea de comando nos servirá para configurar las variables de entorno de la base de datos:
    ```
    Connection information for default credential.
    Connection info string:
    "dbname=*** host=*** port=*** user=*** password=*** sslmode=require"
    Connection URL:
    postgres://mmtmzssdyxkfyt:9336263e704b06d0a1ba7c979c426e7d8eb77f3958e4114cea9a21973ba08d84@ec2-35-168-145-180.compute-1.amazonaws.com:5432/dbhkpp3vfen6vd
    ```
14. Registrar variables de entorno de la base de datos desde la terminal:
    + $ heroku config:add DB_CONNECTION=pgsql
    + $ heroku config:add DB_HOST=ec2-18-235-4-83.compute-1.amazonaws.com
    + $ heroku config:add DB_PORT=5432
    + $ heroku config:add DB_DATABASE=db6unq9m90dvkv
    + $ heroku config:add DB_USERNAME=vcsyvufmsdpbhn
    + $ heroku config:add DB_PASSWORD=******
15. Ejecutar migraciones:
    + $ heroku run bash
    + ~ $ php artisan migrate --seed
        + Do you really wish to run this command? (yes/no) [no]: **yes**
    + ~ $ exit
16. Salir de Heroku:
    + $ heroku logout
17. Desconectar con repositorio Heroku:
    + $ git remote rm heroku