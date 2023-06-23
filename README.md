<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Proyecto de Registro de Documentos

Este proyecto es un sistema de registro de documentos desarrollado en Laravel. Permite crear, editar y eliminar registros de documentos, generando códigos únicos, de igual forma se realizarón estás acciones para el tipo de documento y el proceso


#### Requisitos

- PHP >= 8.1
- Composer

#### Instalación

1. Clona este repositorio en tu máquina local:
```
    $ git clone https://github.com/FabianRincon27/innclod.git
```

2. Accede al directorio del proyecto:
```
    $ cd InnClod
```

3. Instala las dependencias del proyecto utilizando Composer:
```
    $ composer update
```

4. Crea un archivo .env basado en el archivo .env.example y configura la conexión a la base de datos.
```
    $ cp .env.example .env
```

5. Ejecuta las migraciones para crear las tablas de la base de datos

```
    $ php artisan migrate
```

6. Ejecuta los seeders para precargar la base de datos
```
    $ php artisan db:seed
```

#### Uso
Para ejecutar el proyecto, puedes utilizar el servidor de desarrollo de Laravel

```
    $ php artisan serve
```

Una vez que el servidor esté en ejecución, puedes acceder al proyecto en tu navegador web en la URL http://localhost:8000

### !IMPORTANTE!

Ingresar a la URl http://localhost:8000/Registro para registrarse como usuario nuevo!.