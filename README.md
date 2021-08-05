<h4><b>Prueba Laravel Marcos Monasterio</b></h4>

<b>Desafio 1:</b>
Visualiza las siguientes estructuras de tablas.

Invoice (id, date, user_id, seller_id, type)
Product (id, invoice_id, name, quantity, price)
En base a esas estructuras, genera utilizando Eloquent, las consultas para obtener la siguiente información:

Obtener precio total de la factura.
        $invoices1 = Invoice::leftJoin('products', 'products.invoice_id', '=', 'invoices.id')
            ->groupBy(['invoices.id', 'invoice_id'])
            ->selectRaw('invoices.id, SUM(price * quantity) as totales')
            ->get();
    
Obtener todos id de las facturas que tengan productos con cantidad mayor a 100.
        $invoices2 = Invoice::whereHas('products', function (Builder $query) {
            $query->where('quantity', '>', 100);
        })->select(['invoices.id'])->get();

Obtener todos los nombres de los productos cuyo valor final sea superior a $1.000.000 CLP.
        $invoices3 = Product::select(['name','price', 'quantity'])
            ->groupBy(['name', 'price', 'quantity'])
            ->havingRaw('(price * quantity) > ?', [1000000])
            ->get();

<b>Desafio 2:</b>

Indica paso a paso los comandos para una instalación básica de Laravel que me permita ver la página principal (recuerda describir qué hace cada comando).

La siguiente descripción es para Ubuntu 20.04 que es la que utilizo actualmente para trabajar a su ves tengo ya instalado composer y npm.

    1. composer create-project laravel/laravel example-app
       permite descargar el proyecto de laravel.
    2. cd /(Ubicación donde se descargo el proyecto).
    3.Abrir la aplicación creada. Para ver y navegar por la aplicación recién creada podemos ejecutar el comando:  php artisan serve.

    Este comando ejecuta la aplicación en un servidor de desarrollo incluido por defecto en Laravel.  Por tanto debemos hacer clic en la URL que nos muestra para explorar la aplicación en el navegador.  Para detener la ejecución presiona Ctrl + C.

<b>Desafio 3:</b>

Respecto a la estructura de datos del desafío 1, agrega a "Invoice" un campo "total" y escribe un Observador (Observer) en el que cada vez que se inserter un registro en la tabla "Product", aumente el valor de "total" de la tabla "Invoice".

Respuesta: php artisan make:migration add_column_total_invoices_table --table=invoices

<b>Desafío 4:</b>
Explícanos ¿qué es "Laravel Jetstream"? y ¿qué permite "Livewire" a los programadores?

Laravel Jetstream: permite ofrecer una gran cantidad de opciones para crear aplicaciones con Laravel. Cuenta con muchas funciones, y entre las más importantes:
Soporte de API.
Autenticación de dos factores.
Posibilidad de verificar mediante correo electrónico.
Gestionar varios equipos.

Livewire: es un framework para el desarrollo con Laravel que ofrece la posibilidad de realizar componentes con programación Javascript avanzada, pero sin necesidad de escribir código del lado del cliente.
Es excelente para todos los profesionales que se sienten poco confortables escribiendo código Javascript y para cualquier desarrollador que pretenda ahorrar un tiempo considerable a la hora de crear sitios que presentan una cuidada experiencia de usuario.

<b>Desafio 5:</b>

Manos al código! basado en las siguientes tablas, construye un pequeño software:

Tablas de la Base de Datos:
• users
• tasks
• logs

Los requerimientos para el software son:
Construir un CRUD, utilizar Bootstrap para el front y en las vistas el uso de Layouts en Blade.

Las funciones a desarrollar son las siguientes:
• El sistema debe permitir que los usuarios se registren y puedan iniciar sesión, el software no debe permitir que el correo email@hack.net se pueda registrar.
• Sólo los usuarios con sesión iniciada deberían poder ver el listado de tareas (tasks)  de la plataforma en la primera pantalla luego de iniciar sesión.
• El sistema debería permitir que cualquier usuario cree una nueva tarea (tasks), esta debe contener como mínimo la descripción de la tarea, el usuario asignado, la fecha máxima de ejecución.
• Cuando un usuario logueado entre a una tarea asignada a él, el sistema debe permitir que este agregue registros (logs) asociados a la tarea, los registros contienen como mínimo el comentario y la fecha de este. Los usuarios no asignados a la tarea, no pueden acceder a ella, solo verla en el listado.
• Al momento de que se genere un nuevo registro (logs), es necesario que se envíe un correo electrónico al autor de la tarea (Puedes utilizar Mailtrap para Testing, aunque lo importante no es la evidencia del envío, sino el código).
• En el listado de tareas, el sistema debería mostrar en rojo las tareas cuya "fecha máxima de ejecución" haya expirado respecto a hoy. 
• Recuerda usar bootstrap en el diseño, y que puedes ingresar todas las tareas que quieras, insertando campos en la tabla tasks.

<b>Requisitos</b>

1. php 7.4
2. composer
3. npm.

<b>Instalación</b>

1. git clone https://github.com/marcosipod/crud-laravel.git
2. Ubicarse en la ruta del proyecto.
3. Copiar el archivo .env.example crear el archivo .env y configurar nombre de la base de datos nombre de usuario y clave del mysql.
4. php artisan key:generate
5. Ejecutar en la terminal composer install dentro del proyecto.
3. Crear una Base de Datos en MySql con el nombre twgroup.
5. Ejecutar en la terminal php artisan migrate
6. Ejecutar en la terminal php artisan migrate:fresh --seed --force
7. Ejecutar en la terminal php artisan serve

Nota: para probar los querys de los desafio 3, utilizar en la terminal "php artisan tinker" y ejecutar:

\App\Models\Product::create([
'invoice_id' => 1,
'name' => 'Producto 1',
'quantity' => 10,
'price' => 50
]);

validar en bd o en la pagina principal.
