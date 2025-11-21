# PedalPoint 

Para este proyecto se nos pidió realizar un CRUD con MVC y acceso a base de datos con SQLITE. A lo largo de este readme, voy a ir desglosando mi trabajo dia a día 

## Día 1: 19/11/2025

Este dia para mí es el que más me gusta especialmente, cogí papel y boli y me creé las clases necesarias con los atributos, para que a la hora de crear la base de datos lo tuviese todo más claro, tambien me apunte los primeros pasos para programar mi proyecto:

1º: Creamos la estructura del proyecto 

![1763646117646](image/readme/1763646117646.png)

2º Creamos los archivos de configuración, y de base de datos con un usuario administrados por defecto ya en ella

![1763646200285](image/readme/1763646200285.png)

3º Ejecutamos el archivo para que se nos cree la base de datos 

![1763646241258](image/readme/1763646241258.png)

Una vez creado esto, ya podemos programar como sería la entrada a nuestra aplicación, Iniciar Sesión 

Tenemos ahora un modelo admin

![1763646331458](image/readme/1763646331458.png)

Con su correspondiente controller, con todas las funciones necesarias para el admin como loguearse o desloguearse

![1763646368799](image/readme/1763646368799.png)

Tenemos tambien nuestro archivo index.php, este va a ser el punto de partida de nuestra web y además el enrutador que nos guiara a traveés de ella 

![1763646483547](image/readme/1763646483547.png)

Resultado final:

![1763646548518](image/readme/1763646548518.png)

Como resultado final tenemos un incio de sesión completamente funcional 


## Dia 2: 20/11/2025

Para el dia de hoy mi objetivo era hacer el crud completo del objeto bicicleta 

Para ello me cree la base de datos de la bicicleta 

![1763646652284](image/readme/1763646652284.png)

Despues me cree el modelo de bicicleta 

![1763646699022](image/readme/1763646699022.png)

Despues me cree el controlador de bicicleta 

![1763646743712](image/readme/1763646743712.png)

Las vistas de la bicicleta tanto el index como el formulario de creacion

![1763646789762](image/readme/1763646789762.png)


![1763646808514](image/readme/1763646808514.png)


Y actualicé el index.php con el case producto que es la vista de bienvenida, a traves del header el admin podra elegir a donde quiere ir y bicicleta 

![1763646861416](image/readme/1763646861416.png)

![1763646919389](image/readme/1763646919389.png)


![1763646929638](image/readme/1763646929638.png)

![1763646938252](image/readme/1763646938252.png)

![1763646956189](image/readme/1763646956189.png)
