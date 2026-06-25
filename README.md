# Sistema de Gestión de Productos

Aplicación web desarrollada en **PHP**, **JavaScript nativo**, **CSS nativo** y **MySQL**, que permite registrar productos validando la información ingresada por el usuario.

## Tecnologías utilizadas

* PHP 8.2
* JavaScript (Vanilla JS)
* HTML5
* CSS3
* MySQL
* PDO

## Requisitos

* PHP 8.2 o superior
* MySQL 5.7 o superior (o MariaDB compatible)
* Servidor web (Apache recomendado)
* Laragon, XAMPP, WAMP o similar

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/marcrojas/desis
```

### 2. Copiar el proyecto

Copiar la carpeta del proyecto al directorio del servidor web.

Ejemplo con Laragon:

```
C:\laragon\www\
```

### 3. Crear la base de datos

Crear una base de datos llamada:

```
desis
```

### 4. Importar el script SQL

Ejecutar el script SQL incluido en el proyecto para crear las tablas e insertar los datos iniciales.

El script crea las siguientes tablas:

* bodegas
* sucursales
* monedas
* materiales
* productos
* productos_materiales

Además inserta los registros base necesarios para el funcionamiento de la aplicación.

### 5. Configurar la conexión

Editar el archivo:

```
conexion.php
```

y configurar los parámetros de conexión:

```php
$host = "localhost";
$bd = "desis";
$usuario = "root";
$password = "";
```

### 6. Ejecutar la aplicación

Abrir el navegador e ingresar a:

```
http://localhost/desis
```

## Funcionalidades

* Registro de productos.
* Validaciones mediante JavaScript nativo.
* Carga dinámica de sucursales según la bodega seleccionada.
* Validación de código único.
* Asociación de múltiples materiales por producto.
* Persistencia de datos utilizando PDO y consultas preparadas.

## Validaciones implementadas

* Código obligatorio.
* Código entre 5 y 15 caracteres.
* Código con al menos una letra y un número.
* Nombre entre 2 y 50 caracteres.
* Selección obligatoria de bodega.
* Selección obligatoria de sucursal.
* Selección obligatoria de moneda.
* Precio positivo con hasta dos decimales.
* Selección de al menos dos materiales.
* Descripción entre 10 y 1000 caracteres.
* Validación de código duplicado.

## Autor

Marcelo Rojas
