# Entrega 5: Acceso a datos

## Historia de php y sus versiones

![1761728607108](image/Entrega5/1761728607108.png)

En el siguiente enlace podemos conocer un poco sobre la historia de php junto con sus diferentes versiones, desde php 3 hasta la más reciente php 8:

https://www.php.net/manual/es/history.php.php

Como conclusión personal podemos saber que PHP pasó de ser una herramienta simple a un lenguaje clave del desarrollo web gracias a su evolución constante y apoyo comunitario. Su historia demuestra que la adaptación es esencial para perdurar en la tecnología.

## P1_mysqli

Nos crearemos una base de datos dentro de PHPMYADMIN llamada dwes, dentro de ella crearemos más adelante las demás tablas

Crearemos ahora el archivo de configuración de conexión a la base de datos

![1762938119881](image/Entrega5/1762938119881.png)

Crearemos además una tabla persona

![1762938149190](image/Entrega5/1762938149190.png)

![1762938170389](image/Entrega5/1762938170389.png)

## P2_mysqli

Crearemos ahora una tabla empresa, con el archivo de conexión a base de datos, sobre esta tabla haremos un CRUD completo

![1762938277952](image/Entrega5/1762938277952.png)

![1762938298402](image/Entrega5/1762938298402.png)

### Insertar

Vamos ahora a insertar una persona

![1762938349927](image/Entrega5/1762938349927.png)

![1762938381258](image/Entrega5/1762938381258.png)

![1762938408441](image/Entrega5/1762938408441.png)

### Update

En este caso vamos a updaterar el salario de uno de ellos

![1762938485974](image/Entrega5/1762938485974.png)

![1762938501686](image/Entrega5/1762938501686.png)

![1762938516887](image/Entrega5/1762938516887.png)

### Delete

Vamos a eliminar ahora a un usuario de la tabla

![1762938572843](image/Entrega5/1762938572843.png)

![1762938587775](image/Entrega5/1762938587775.png)

![1762938602498](image/Entrega5/1762938602498.png)

Hemos eliminado al usuario 2

### SelectUpdate

Aquí buscamos al usuario completo por el id y luego actualiza el campo que se desee, en este caso el salario

![1762938665981](image/Entrega5/1762938665981.png)

![1762938734484](image/Entrega5/1762938734484.png)

Nos dice que el usuario 2 no existe asi que vamos a probar con el usuario 6

![1762938792889](image/Entrega5/1762938792889.png)

![1762938811019](image/Entrega5/1762938811019.png)

Como vemos se le han sumado 100 euros a su salario

### Inyección

![1762938854721](image/Entrega5/1762938854721.png)

![1762938870216](image/Entrega5/1762938870216.png)

## P3_PDO

Vamos a crear la tabla musica para poder leerla con el PDO

![1762939145783](image/Entrega5/1762939145783.png)

Generamos la conexión 

![1762939177374](image/Entrega5/1762939177374.png)

Y ahora lo lista de una forma muy simple 

![1762939223046](image/Entrega5/1762939223046.png)


![1762939254998](image/Entrega5/1762939254998.png)


## P4_login


En este programa se implementa un sistema de inicio de sesión (login) aplicando MVC (Modelo–Vista–Controlador).

El objetivo principal es comprender la estructura modular del patrón y cómo gestionar la conexión a una base de datos mediante PDO

Se ha creado la estructura de carpetas propuesta para la práctica, que nos permite separar correctamente los componentes del proyecto:

A continuación se crearon los archivos necesarios para cada capa del modelo MVC:

Modelo (Persona.php) → Define la estructura del usuario y la lógica relacionada con la autenticación.

![1762939936983](image/Entrega5/1762939936983.png)

Controlador (PersonaController.php) → Gestiona las peticiones del usuario, recibe los datos del formulario y comunica el modelo con la vista.

![1762939966464](image/Entrega5/1762939966464.png)

Vistas (login.php, welcome.php) → Muestran la interfaz gráfica del sistema (formulario de login, pantalla de bienvenida, etc.).

![1762939988276](image/Entrega5/1762939988276.png)

![1762940107304](image/Entrega5/1762940107304.png)

Uno de los aspectos más importantes del proyecto es el archivo database.php, ubicado dentro de la carpeta config/.

En este archivo se define una clase Database que contiene los parámetros necesarios para la conexión (host, usuario, contraseña y nombre de la base de datos).

Mediante una función connect() y utilizando PDO, se establece la conexión con la base de datos de forma segura y reutilizable

![1762940148943](image/Entrega5/1762940148943.png)

![1762940599885](image/Entrega5/1762940599885.png)

![1762940585346](image/Entrega5/1762940585346.png)

![1762940619121](image/Entrega5/1762940619121.png)

## P5_CRUD_MVC


En este programa se ha desarrollado una aplicación CRUD (Create, Read, Update, Delete) para la gestión de coches, aplicando el patrón de diseño MVC (Modelo–Vista–Controlador).

El acceso a la base de datos se realiza mediante PDO, de la misma forma que en el programa anterior.

En esta ocasión, el Controller contiene las funciones necesarias para realizar todas las operaciones CRUD sobre la tabla coches.

Entre las funciones principales del controlador se encuentran:

index() → Muestra todos los registros de la tabla.

![1762942441728](image/Entrega5/1762942441728.png)

crear() → Inserta un nuevo coche.

editar() → Modifica los datos de un coche existente.

eliminar() → Elimina un coche de la base de datos.

Una vez accedamos al programa podremos ver los coches que tenemos en la BD asi como añadir, updatear o eliminar objetos de la BD

![1762942547317](image/Entrega5/1762942547317.png)

![1762942575378](image/Entrega5/1762942575378.png)

## P6_CRUD_SQLITE


Este programa no usaremos la BD de Mysql por lo que podremos apagar el puerto 3306, una bd sqlite, no es mas que una bd dentro de nuestro propio proyecto

Para  ello nos declaramos la ruta donde se nos ccreara el fichero para la BD, y usando nuevamente la clase PDO asignaemos los valores y tablas que tendra nuestra BD

![1762946862087](image/Entrega5/1762946862087.png)

Cuando ejecutamos este codigo llamado config.php se nos creara una nueva carpeta llamada data y dentro de el podremos ver nuestra BD gracias a unas extensiones que hemos instalado previamente

![1762946886958](image/Entrega5/1762946886958.png)

## P7_files

### Ejemplo1: escribir y leer un archivo 

![1762947039423](image/Entrega5/1762947039423.png)

![1762947195833](image/Entrega5/1762947195833.png)

![1762947422626](image/Entrega5/1762947422626.png)

### Ejemplo2: Lectura rápida 

![1762947237499](image/Entrega5/1762947237499.png)

![1762947458619](image/Entrega5/1762947458619.png)

### Ejemplo3: Añadir texto sin borrar archivo 

![1762947285828](image/Entrega5/1762947285828.png)

![1762947494087](image/Entrega5/1762947494087.png)

### Ejemplo 4: Crear y descargar un CSV 

![1762947318760](image/Entrega5/1762947318760.png)

![1762947529501](image/Entrega5/1762947529501.png)

![1762947571897](image/Entrega5/1762947571897.png)

### Ejemplo 5: Exportar a PDF con FPDF

![1762947367409](image/Entrega5/1762947367409.png)


![1762948952369](image/Entrega5/1762948952369.png)

### Ejemplo 6: Exportar el contenido de un fichero de texto a PDF

![1762947437091](image/Entrega5/1762947437091.png)


![1762948990336](image/Entrega5/1762948990336.png)
