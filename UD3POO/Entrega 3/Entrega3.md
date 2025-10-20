# Entrega 3: Programación Orientada a Objetos

> "Quienes aprovechan la IA de manera correcta podrán aprender más rápido y entregar mejores resultados".

Sinceramente estoy muy de acuerdo con esta frase ya que si entiendes de programación y si sabes pedirle a la IA algo específico, sabrás como usar la información que te genera

---

## Teoría

La **Programación Orientada a Objetos (POO)** nació en Noruega en 1967 con el lenguaje  Simula 67, creado por Kristen Nygaard y  Ole-Johan Dahl . Este lenguaje introdujo por primera vez los conceptos de  clases , subclases y  corrutinas , que dieron origen al paradigma orientado a objetos moderno.

Antes de la POO, la programación era  procedimental o imperativa , donde los datos y las instrucciones se trataban por separado. La POO unificó ambos aspectos al agrupar datos y comportamientos dentro de los  objetos , permitiendo una forma más natural y organizada de representar el mundo real en el código.

La base de este paradigma se sostiene en  **cuatro pilares fundamentales** :

![1760612177395](image/Entrega3/1760612177395.png)

Gracias a la POO en php se permite estructurar el código de forma modular, permitinedo hacerla reutilizable mediante clases y objetos. Mejorando asi la organización, escalabilidad y mantenimiento del software

Separar la lógica de negocio de la interfaz del usuario tiene varias ventajas:

* Facilita el mantenimiento, reutiliza código y la escalabilidad
* Permite realizar pruebas y depurar de manera independiente
* Mejora el trabajo entre frontend y backend
* Adapta la interfaz a diferentes plataformas
* Favorece el uso de patrones de diseño como Modelo Vista Controlador

---

## Programa 1: Creaciones de clases

![1760613148740](image/Entrega3/1760613148740.png)

![1760613127821](image/Entrega3/1760613127821.png)

Si fuesen privados, no podriamos acceder a ellos desde fuera de la clase

---

## Programa 2: Constructor

Al crear constructores podemos instanciar tantas clases como queramos con diferentes valores, en este caso vamos a crear varias personas y vamos a asignarle valores a través de su constructor

![1760613687645](image/Entrega3/1760613687645.png)

![1760613711780](image/Entrega3/1760613711780.png)

El **destructor** (`__destruct`) se ejecuta automáticamente cuando el objeto se elimina o el script termina. Se utiliza principalmente para liberar recursos, cerrar conexiones o realizar limpieza de memoria.

![1760614172361](image/Entrega3/1760614172361.png)

![1760614158817](image/Entrega3/1760614158817.png)

Hemos completado ahora el código que vemos justo arriba para que se ejecute correctamente

---

## Programa 3: Destructor

![1760614676213](image/Entrega3/1760614676213.png)

![1760614659113](image/Entrega3/1760614659113.png)

He creado a 3 personas con el constructor, las saludo y se destruyen porque el script ha terminado. En programas donde es script no termina, el objeto no se destruye. Para destruirlo usar unset($persona1)

---

## Programa 4: Setter y getter

![1760615355904](image/Entrega3/1760615355904.png)

![1760615372760](image/Entrega3/1760615372760.png)

Para que este programa funciones, debemos setearle a la clase tanto el menor como el mayor y unas vez ya tiene los valores, puede cogerlos con un get para así mostrarlos

---

## Programa 5: THIS

![1760615617627](image/Entrega3/1760615617627.png)

![1760615649765](image/Entrega3/1760615649765.png)

En la clase C al ser una función estática podemos ver en linea 43 y 44 que no hace falta hacer una instancia de la clase para usarla

---

## Programa 6: Propiedad y método

![1760699675122](image/Entrega3/1760699675122.png)

![1760699646789](image/Entrega3/1760699646789.png)

---

## Programa 7: Private

![1760700121823](image/Entrega3/1760700121823.png)

![1760700130700](image/Entrega3/1760700130700.png)

---

## Programa 8: Herencia

![1760700279752](image/Entrega3/1760700279752.png)

![1760700291736](image/Entrega3/1760700291736.png)

Lo modificamos ahora para que el lugar de sobreescribir el método del padre, lo use tal cual y encima que añada mñas información usando parent::

![1760700737031](image/Entrega3/1760700737031.png)

![1760700748842](image/Entrega3/1760700748842.png)

---

## Programa 9: Polimorfismo

El polimorfismo es cuando nosotros llamamos a funciones de la misma forma pero hacen diferentes cosas, todo depende de la clase en la que se encuentren y la instancia que creemos. En el ejemplo, el array de figuras contiene objetos de distintos tipos pero todos son tratados como si fueran figuras, pero cuando se llama al método, en realidad está llamando al correspondiente a la clase real del objeto, por lo que si el objeto es un cuadrado, llamará al método de la clase del cuadrado en cambio si es un circulo lo hara con la del circulo

![1760700963231](image/Entrega3/1760700963231.png)

![1760700976634](image/Entrega3/1760700976634.png)

---

## Programa10: Abstract

Una clase abstracta significa que no ésta no se puede instanciar pero si que puede servir como base para una clase hija, las clases abstractas contienen métodos que las clases hijas deben usar

![1760701355600](image/Entrega3/1760701355600.png)

![1760701369249](image/Entrega3/1760701369249.png)

Como podemos ver la clase abstracta transporte contiene un método abstracto mover(), tambien tenemos 2 clases (coche y bicicleta) que extienden de transporte, donde reescribimos la función mover(), luego instanciamos tanto un coche como una bicicleta y le seteamos una velocidad a cada uno

---

## Programa 11: Interfaces

![1760705548508](image/Entrega3/1760705548508.png)


---

## Programa 12: Final 

Cuando una clase es Final, no se podrá heredar de ella.

![1760959705926](image/Entrega3/1760959705926.png)


![1760959722665](image/Entrega3/1760959722665.png)


![1760959804674](image/Entrega3/1760959804674.png)

Tampoco podemos sobreescribir un método final 

![1760959900817](image/Entrega3/1760959900817.png)

![1760959921470](image/Entrega3/1760959921470.png)

Tampoco podemos extender de una clase que sea final 

---

## Programa 13 : Trait 

Es como un objeto que dentro tiene diferentes métodos y mediante el use dentro de la clase, podemos inyectar esos bloques de métodos 

![1760960467627](image/Entrega3/1760960467627.png)

![1760960477926](image/Entrega3/1760960477926.png)

Vamos ahora a quitar el trait para la clase producto y vamos usar el método de la clase sin inyectar el método del trait 

![1760960577508](image/Entrega3/1760960577508.png)

![1760960589935](image/Entrega3/1760960589935.png)

Como vemos, no hemos añadido el mensaje inicial de la fecha y hora, ya que ese método forma parte del trait 


---



## Programa 14: Namespace

Son una forma de organizar el código y evitar conflictos entre nombres de clases, funciones o constantes cuando tienes multiples archivos o bibliotecas que podrían usar nombres similares. Se declaran en la primera linea 

![1760962491352](image/Entrega3/1760962491352.png)

![1760962512190](image/Entrega3/1760962512190.png)

---

## Programa 15: Stack (pila)

Al crear una pila, ya tiene métodos predefinidos, con push vamos añadiendo archivos y con pop los vamos sacando de la pila, pero desde atras hacia adelante

![1760962766831](image/Entrega3/1760962766831.png)

![1760962784655](image/Entrega3/1760962784655.png)

![1760963094819](image/Entrega3/1760963094819.png)

![1760963915749](image/Entrega3/1760963915749.png)

Como investigacion personal, he investigado sobre la función top(), lo que hace es mostrar el ultimo elemento de la pila, pero solo para ver su información sin eliminarlo


![1760963289191](image/Entrega3/1760963289191.png)

este método es muy interesante, ya que le decimos que escoja el archivo monolog.php, que esta en modo lectura con el 'r', y continua leyendo lineas e imprimiendola 


---

## Programa 16: Autoload

![1760964498140](image/Entrega3/1760964498140.png)

![1760964507646](image/Entrega3/1760964507646.png)

![1760964524353](image/Entrega3/1760964524353.png)

![1760964535587](image/Entrega3/1760964535587.png)
