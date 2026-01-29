# Entrega 8: Laravel parte 2

## Programa 4: Modelos

### Conceptos básicos:

Cada clase del modelo representa a una sola tabla en la base de datos

La tabla asociada con el con el modelo tiene su nombre con su manera de escribirse específica en la tabla, si el modelo es Post, su nombre en la tabla será en minúscula y en plural -> posts

La clave principal es el id

Las marcas de tiempo se gestionan automáticamente

### Protección de asignación masiva

Eloquent protege contra vulnerabilidades de asingación masiva

* $fillable se usa para definir que atributos van a poder ser modificados

  `protected $fillable = ['title', 'body', 'published'];`
* $guarded se usa para definir que atributos no se podrán modificar

  `protected $guarded = ['id'];`

Normalmente solo se debe usar uno de estos por modelo

### Relaciones entre modelos

Laravel simplifica la definición de relaciones entre modelos. Estas son las más comunes

* hasOne
* hasMany
* belongsTo
* belongsToMany
* hasManyThrough

### Operaciones CRUD

Eloquent ofrece métodos elegantes para crear, leer, actualizar y eliminar registros

### Proyecto blog

#### Paso 1: Crear un nuevo proyecto de Laravel

Para esto usaremos el comando

`composer create-project laravel/laravel blog`

#### Paso 2:Crear el modelo de la publicación y migración

`php artisan make:model Post -m `

Esto crea el modelo Post y la migración posts

#### Paso 3: Definir la migración

Editamos el archivo de la migración

![1768332045227](image/Entrega8/1768332045227.png)

y luego ejecutamos la migración:

`php artisan migrate `

#### Paso 4: Definir la lógica del modelo

![1768332146794](image/Entrega8/1768332146794.png)

#### Paso 5: Crear la ruta

![1768332193822](image/Entrega8/1768332193822.png)

#### Paso 6: creamos la vista de blade

Creamos el archivo de la vista

`php artisan make:view post.index`

Editamos

![1768332272707](image/Entrega8/1768332272707.png)

#### Paso 7: servimos la aplicación

`php artisan serve `

![1768332381674](image/Entrega8/1768332381674.png)

## Programa 5: Controladores

En Laravel, los controladores son claseas que agrupan la lógica de manejo de solicitudes relacionada en un solo lugar

Actúan como enlace entre las rutas y la lógica

### Proyecto Controllers

#### Paso 1: Creamos un nuevo proyecto

`folder: UD6 Laravel / Sesion5  `

`composer create-project laravel/laravel controller-demo `

` cd controller-demo php artisan serve`

#### Paso 2: Creamos un controlador

`php artisan make:controller UserController `

Este comando genera un nuevo archivo controlador

#### Paso 3: Agregamos ruta

![1768332812338](image/Entrega8/1768332812338.png)

#### Paso 4: Definir el index método en UserController.php

![1768332870290](image/Entrega8/1768332870290.png)

#### Paso 5: Crear la vista

![1768332919381](image/Entrega8/1768332919381.png)

![1768332978133](image/Entrega8/1768332978133.png)

## Programa 6: CRUD

### Proyecto Clothing store

#### Paso 1: Nuevo proyecto en Laravel

`folder Sesion6 composer create-project laravel/laravel clothing_store OR // laravel new clothing_store cd clothing_store code .`

#### Paso 2: Creamos modelo, migración y controlador

`php artisan make:model ClothingItem -mc`

Actualizamos la migración

![1768333224093](image/Entrega8/1768333224093.png)

Ejecutamos la migración

`php artisan migrate`

#### Paso 3: rutas y vistas básicas

![1768333336212](image/Entrega8/1768333336212.png)

Podemos mostrar las rutas con

`php artisan route:list `

#### Paso 4: Creamos el controlador

![1768333454749](image/Entrega8/1768333454749.png)

#### Paso 5: Añadimos en fillable el modelo

![1768333532576](image/Entrega8/1768333532576.png)

#### Paso 6: Creamos las vistas de cada controlador

![1768333563533](image/Entrega8/1768333563533.png)

![1768333577062](image/Entrega8/1768333577062.png)

![1768333592482](image/Entrega8/1768333592482.png)

![1768333610769](image/Entrega8/1768333610769.png)

![1768333624724](image/Entrega8/1768333624724.png)

![1768333698560](image/Entrega8/1768333698560.png)

![1768333711676](image/Entrega8/1768333711676.png)

![1768333722352](image/Entrega8/1768333722352.png)

### Actividad

1. **Is the code readable and well-organized?**
   Si, la estructura sigue el patrón MVC con controladores, modelos y vistas separados correctamente
2. Are variable and method names descriptive?
   Lamayoría si que lo son aunque yo algunos los cambiaria por otros
3. Are the views easy to understand?
   si
4. **Are forms protected?**
   si, se usa @csrf
5. Did you include `@csrf` and `@method('PUT'/'DELETE')` in all appropriate forms?
   Sí, se usan correctamente
6. **Validation:**
7. Is there server-side validation for user inputs in `store()` and `update()` methods?
   si
8. Is there any form of client-side validation (like `required`, `type="number"`)?

   si
9. **Routes:**
10. Are you using `Route::resource()` properly?

    SI
11. Are any unused routes present?

    No se detectan rutas inncesarias
12. **Reusability:**
13. Could you reuse code by creating partials for forms (`_form.blade.php`)?

    Si, los formularios son miu parecidos por lo que se podria extraer a un archivo y reutilizarlo

Yo como elementos de mejora mostraria mensajes como "elemento actualizado" con flash para mejorar la experiencia. Además le añadiría estilos con Bootstrap o CSS para lograr una presentación más profesional y como último usaría la paginación en los controladores para manejar listas largas de registros de forma más eficiente


### Proyecto seeders

![1768381112079](image/Entrega8/1768381112079.png)

![1768381205381](image/Entrega8/1768381205381.png)

![1768381239157](image/Entrega8/1768381239157.png)

## Programa 7: Seed

### Clothing store 

v1 solo con CRUD

### Clonar un repositiorio de GitHub

git clone url

instalar dependecias con el comando: 

`composer install `

instala la carpeta vendor 

copiar y pegar env.example para convertirlo en .env 

generar la clave para el proyecto 

`php artisan key:generate`

migrar y crear el archivo de bbbdd

php artisan migrate 

### Clothing store v1:

#### Hacer los seeders

![1768382789520](image/Entrega8/1768382789520.png)

![1768382815560](image/Entrega8/1768382815560.png)

![1768383211220](image/Entrega8/1768383211220.png)

![1768383263584](image/Entrega8/1768383263584.png)

![1768383352264](image/Entrega8/1768383352264.png)

### Clothing store v2 

![1768384064026](image/Entrega8/1768384064026.png)

![1768384491987](image/Entrega8/1768384491987.png)

php artisan migrate:fresh --seed 

![1768385031283](image/Entrega8/1768385031283.png)

![1768385330752](image/Entrega8/1768385330752.png)

![1768385615060](image/Entrega8/1768385615060.png)

![1768385627781](image/Entrega8/1768385627781.png)

![1768385726318](image/Entrega8/1768385726318.png)

![1768385854409](image/Entrega8/1768385854409.png)


![1768385897989](image/Entrega8/1768385897989.png)

![1768386059672](image/Entrega8/1768386059672.png)
