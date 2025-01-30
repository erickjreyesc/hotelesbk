# Backend APi Hoteleria.

_Microapp backend hoteleria._

## Requerimientos Mínimos de PHP.

```
* PHP >= 8.2
* Ctype PHP Extension
* cURL PHP Extension
* DOM PHP Extension
* Fileinfo PHP Extension
* Filter PHP Extension
* Hash PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PCRE PHP Extension
* PDO PHP Extension
* Session PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
```

## Paquetes Necesarios 

_Composer, Nodejs, NPM 

```
composer nodejs postgresql php-mysql php-xml php-mbstring php-curl php-gd php-json php-sodium php-zip redis 
```

## _Clonar Repositorio_

## _Ejecución del Composer en el projecto - Librerias_

```
composer install
``` 

## _Copiar el archivo env.example .env_

``` 
cp .env.example .env
```

## _Modificar las configuraciones correspondientes a conexiones a servidores en el archivo .env_

```
DB_*
APP_DEBUG=false
APP_ENV=production
```
## _Ajustar Dominio o subominio en la aplicación_

```
APP_URL=http://localhost.com to https://[dominio.com]
```

## _Generar la llave del proyecto_

```
php artisan key:generate
```

## _Generar Migrar la Estructura Base - Sólo usar en modo desarrollo_

```
php artisan migrate --seed
```

## Modulos WebServer a Habilitar.

- rewrite, headers

## Comandos de ayuda.

## _Liberar cache de la aplicación_

```
php artisan optimize:clear 
```

## Permisos.
## _Permisos de carpetas_

```
sudo chmod 755 -R .
sudo chmod 777 -R bootstrap/
sudo chmod 777 -R storage/
```
