<?php


* Donde estan las cosas en Laravel:

// Rutas para la web en: 
routes/web.php

// Vistas
resource/views/

// Migraciones
database/migrations

// Controladores
app/Http/Controlles

// Vistas en Cache
storage/framework/views


* Comandos

// asignar a un alis hacer todas las pruebas que tengas en los archivos test
 alias t=vendor/bin/phpunit

// levantar el servidor local
php artisan serve

// limpiar las vistas en cache
php artisan view:clear

// crear un controlador
php artisan make:controller NombreControlador


* Ejemplo de controlador:

class TodosController extends Controller
{
    
        public function store(Request $request){


                // Validamos el título de la tarea
                $request->validate([
                        'title' => 'required|min:3'
                ])

                // creamos el objeto todo, previamente importar la case ojo:  use App\Models\Todo;
                $todo = new Todo;


                // lea signamos el varlo que el usuario metet en el campo del formulario
                $todo->$title = $request->title;


                // Guardamos la información
                $todo->save();

                // retornamos la información
                return redirect()->route('todos')->with('success', 'Tarea creada correctamente');

        }
}


// Se le llama asi desde: web.php

// Este metodo es post, accedemos al controlador de todos, y en especifico a la funciona store de esa clase

Route::post('/tareas',[TodosController::class,'store'])->name('todos');



* Ejemplo de tipos de rutas:

// Llamar a la vista welcome al estar en la raiz
Route::get('/', function () {
    return view('welcome');
});

// Donde pone Ima lo que hay que poner en la URL
Route::get('/Ima', function () {
    return view('navegacion');
});

// Devolver un texto no una vista
Route::get('/', function () {
    return 'Hola a Todos';
});

// De esta manera accedemos a
Route::get('/tareas', function () {
    return view('todos.index');
});

// Este metodo es post, accedemos al controlador de todos, y en especifico a la funciona store de esa clase
Route::post('/tareas',[TodosController::class,'store'])->name('todos');


// poniendo en le url: /saludo/ima/imanolito llamamos al controlador WellcomeController y a su función Index
Route::get('/saludo/{name}/{nickname?}','WellcomeController@index');


