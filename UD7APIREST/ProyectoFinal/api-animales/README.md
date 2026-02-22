## Paso 1:

Crear el proyecto

![1771760827613](image/README/1771760827613.png)

## Paso 2:

Crear el soporte para API (Sanctum) y crear routes/api

![1771760998743](image/README/1771760998743.png)

![1771761010228](image/README/1771761010228.png)

## Paso 3:

Creamos el modelo Animal con todos los archivos auxiliares, migración, factory y seeder

![1771761101529](image/README/1771761101529.png)

![1771761114704](image/README/1771761114704.png)

Modificamos la migración

![1771761181283](image/README/1771761181283.png)

Modificamos el modelo

![1771761227828](image/README/1771761227828.png)

Modificamos el factory

![1771761283314](image/README/1771761283314.png)

Modificamos el seeder

![1771761321185](image/README/1771761321185.png)

Llamamos al seeder en database seeder

![1771786030909](image/README/1771786030909.png)

## Paso 4:

Ejecutamos las migraciones

![1771761460056](image/README/1771761460056.png)

## Paso 5:

Creamos la validación:

![1771761605032](image/README/1771761605032.png)

![1771761712396](image/README/1771761712396.png)

## Paso 6:

Creamos el transformador de datos

![1771761648639](image/README/1771761648639.png)

![1771761762320](image/README/1771761762320.png)

## Paso 7:

Creamos el controller, si usamos --api no nos creará ni create ni edit

![1771761823922](image/README/1771761823922.png)

![1771761880391](image/README/1771761880391.png)

## Paso 8:

Modificamos las rutas

![1771761977322](image/README/1771761977322.png)

## Paso 9:

Modificamos el userModel

![1771763324075](image/README/1771763324075.png)

## Paso 10:

Creamos el authController

![1771763366879](image/README/1771763366879.png)

![1771763399921](image/README/1771763399921.png)

## Paso 11:

Volvemos a modificar el archivo de las rutas, añadiendo las rutas publicas y protegidas

![1771763478255](image/README/1771763478255.png)

## Paso 12: Comprobaciones

Las comprobaciones las he realizado en postman, al probar el login, en el body vemos que nos devuelve el token de acceso bearer

TOKEN

"4|GUAS2eGULoMfkS6wJXM0FfGensoPdJGYTPJtrDAN98f0618f"

![1771775810049](image/README/1771775810049.png)

La siguiente comprobación que haremos será la de devolver todos los animales 

![1771775885772](image/README/1771775885772.png)

Probamos ahora a buscar y obtener la información de un solo animal por su id, en este caso el 3 y nos devuelve correctamente la información 

![1771775968496](image/README/1771775968496.png)

Añadimos ahora con animal para ellos deberemos de usar el token ya que sino no nos dejara 

![1771776080010](image/README/1771776080010.png)

![1771776099691](image/README/1771776099691.png)

De la misma forma podemos actualizar un animal 

![1771776173165](image/README/1771776173165.png)

![1771776188227](image/README/1771776188227.png)

Y por último eliminamos a un animal 

![1771776300068](image/README/1771776300068.png)

![1771776328816](image/README/1771776328816.png)
