#  APRENDIBLE - GUIA DE LARAVEL DESDE CERO
Practicando CRUB con LARAVEL. Notas Personales.

## Requerimientos:

 - LARAGON  4.0.4
 - Laravel 5.7.25
 - DOCUMENTACION OFICIAL DE LARAVEL: https://laravel.com/docs/5.7

# NOTAS BASICAS

* LARAGON
   *  Crear nueva aplicación en laragon/www marcar: `>laravel new [nombre]`
   *  Acceder: http://nombre.test
* ARTISAN
   *  `>php artisan` se ejecuta dentro de la carpeta app.
   *  Listar todos los comandos de artisan: `>php artisan list`
   *  ver rutas y controladores: `>php artisan route:list`
 * laravel
   *  Agregar Archivos .php al framework laravel.
       1. ir a: **composer.json -> autoload** y Agregar el archivo en: **"files":["NombreProyecto/nombreArchivo.php"]**
       2. resetear el autoload: `#composer dumpautoload`
   *  variables de entorno en .env:
       -  guardar config BD, urls, API keys, claves.
       -  GIT lo ignora, por lo que hay que crear otro .env para el local y otro para el servidor.
       -   **APP_ENV:** local (local)/ production (servidor-nube)  / testing (otra pc cualquiera)

# ROUTES
* Documentacion en: https://laravel.com/docs/5.8/routing

* definen las rutas URL de las peticiones (GET,POST) y se asocian con un controlador para procesar la petición o con una view directamente.
 *  cada route se le asigna un nombre, en el codigo se usara este nombre para apuntar a su url `route('nombre-clave')`

## Opciones para responder vistas o datos directamente (Sin controllers)

* Responder solo texto:                                                                 
  `Route::get('ruta1',function{
 return "responder este Texto";})>name('nombre-clave');`

 * Responder View:
 `Route::view('/about','about')->name('about')`

 * Captar datos por la url y responder un View. **Ej. localhost/subpagina/valor**	         
      `Route::get('/ruta/{variable?}', function ($variable = 'valor_predeterminado') {`     
      `return view('nombre_view',['variable' -> $variable]);				                     
      })->name('nombre-clave');		`					                                             

 * Responder View pasandole una constante:					                                     
 `Route::view('/ruta','subpagina',['variable' => 'CONSTANTE'])->name('nombre-clave');`

 * Responder View pasandole un array:						                                       
      ` <?php										                                                           
         $array = [									                                                     
            ['title'=>'valor1'], 							                                           
            ['title'=>'valor2'],						                                          	   
         ];	`		                                                                         

    `Route::view('/ruta','subpagina',compact('array'))->name('nombre-clave');`

## VIEW CON BLADE

 * Documentacion de blade en: https://laravel.com/docs/5.8/blade#template-inheritance
 * Directorio: **'resources/views/vista.blade.php'**

 * datos no escapados:
       `{{$variable}}`    no ejecuta HTML o JS
 * datos escapados:
       `{!!$variable!!}`  si ejecuta HTML o JS. Alerta de XSS attacks no implementar inputs
 * Comentarios:
`{{-- Comentarios --}}`

 * Directivas de blade:
       `@json($array)` decodificar un json

     - Directivas de control:
          `@if(), @elseif(), @else, @endif`
          `@isset(), @endisset, @empty(), @endempty`
          `@switch(), @case(), @break, @default,  @endswitch`
          `@for () @endfor`
         ` @foreach ($users as $user) @endforeach  @forelse ($users as $user)  @empty  @endforelse`
          `@while (true)  @endwhile`
         `@continue or @break`

  * Traducción de Texto `@lang(palabras traducida segun locate de laravel)`
    los busca en la directiva: app/resource/lang/en.json

  * Ejemplo de **sections** and **layouts**:
    * **layout, plantilla padre**
`<html> `
 `<head>`
`<title>App Name - @yield('title')</title>`
`</head>`
`<body>`
`@section('sidebar')`
`This is the master sidebar. `
`@show`
`<div class="container"> `
`@yield('content') `
`</div>`
`</body>`
`</html>`

    * **Extender el layout, hijo**
`@extends('layouts.app')     `                                                                           
      `@section('title', 'Page Title')                     		                                           
      @section('sidebar')    `                             
     	 ` @parent      `                                    
        `<p>This is appended to the master sidebar.</p>`   
     ` @endsection `                                                                                         
     ` @section('content') `                                
        ` <p>This is my body content.</p>`                  
      `@endsection `

# CONTROLADORES

* Documentacion: https://laravel.com/docs/5.7/controllers
 * Directorio: **app/http/Controlers/**
 * crear un controlador:
       `>php artisan make:controller nombreController -h,-i,-r,-api`
  * listar comandos de make:controller:
      ` php artisan make:controller nombreController -h`
   * listar routes y controladores:
     ` php artisan route:list`

## Controller con invoke
 Contiene un unico metodo **_invoke** y se ejecuta automaticamente al ser invocado.
 * crear controlador `_invoke`:
`php artisan make:controller nombreController -i`
 * Route:								                                                                     
`Route::get('/subpagina','nombreControlador')->name('nombre-clave');`


## Controller con Resourse
 Maneja los recursos en la BD (Ej.proyectos)  puede contener los 7 metodos REST.

    - Los 7 metodos REST:                                                                     
    1. INDEX          (GET)   /recurso       - listar recursos				                      
    2. CREATE         (GET)   /recurso/create- formulario para crear nuevo recurso           
    3. STRORE         (POST)  /recurso       - Guardar el recurso en la BD (creado por CREATE)
    4. SHOW           (GET)   /recurso/{id}  - mostrar un recurso por ID                   
    5. EDIT           (GET)   /recurso/{id}/edit- formulario para editar un recurso existente por ID
    6. UPDATE         (PUT)   /recurso/{id}   - guardar los cambios hechos por EDIT          
    7. DELETE/DESTROY (DELETE)/recurso/{id}   - eliminamos un recurso por el ID              

* **Crear**:                                                                                    
   `php artisan make::controller nameController -resourse (r)`                              

* **Route,**  Para invocar varios metodos REST.
       - Solo invocar las Nombradas (Ej. create,edit) 				                                  
                `Route::resource('nombreDelRecurso','nombreController')->only([create,edit])`        
      - Invocar todas Exepto las nombradas (Ej. index,show)                                  
    `Route::resource('nombreDelRecurso','nombreController')->except([index,show]) `        

 - Tambien se puede invocar un método a la ves. respetando los Metodos REST.                `Route::get('/subpagina','nameController@index')->name('clave-name');`      

      `Route::post('view', 'MessageController@store')->name('nombre-post');`    

      `Route::put();    probar`                                                        
      `Route::patch();  probar`                                                        
      `Route::delete(); probar`

# Controller con APIs
Para manejar las API (interfaces) del sistema.
        Puede contener los metodos REST Exepto CREATE y EDIT.                                      

      * crear:                                                                                     
         >php artisan make::controller nameController -api                                         

      * Route:                                                                                     
       - Solo invocar las Nombradas (Ej. create,edit)                                              
          Route::apiResource('nombreDelRecurso','nombreController')->only([create,edit])           
       - Invocar todas Exepto las nombradas (Ej. index,show)                                       
    	   Route::apiResource('nombreDelRecurso','nombreController')->->except([index,show])          

       - Tambien se puede invocar un metodo a la ves. respetando los Metodos REST?

##  FORMULARIOS - VALIDACIONES CON BLADE

Documentacion: https://laravel.com/docs/5.8/validation#introduction
* Formularios - Validaciones:
    * Vistas:
      - Utilizar `@csrf`  (si no, lanza error 401, es por seguridad)
      - los atributo "name" de los inputs Siempre se deberan DEFINIR!
      - hacer un formulario: `<form method="POST" action="{{route('nombre-post')}}">`
      - mostrar el error en html en caso de break: `{!!$errors->first('name','<small>:message</small><br>')!!}`
      - mantener valores en caso de Break: `value="{{old('subject')}}`
      - Editar Mensajes, Directorio: **app/resources/lang/** Español En: "Github lang"".

  * crear ruta:
     -  con route:    `Route::post('viewName', 'Controllername@store')->name('nombre-post');` Debe tener mismo nombre y ser el mismo metodo. (una a la ves)
      - con resource: `Route::resource('/projects','ProjectController')->only(['index','show','create','store']);`     (varias a la ves)

  *  En Controlador:
        - `php artisa make:controller...`
        - leer datos: `$name = Request('name');`
        - `request()->validate([...]);` llenar validaciones
             - funcionamiento del validate: validate break the function y activara a `$errors`
        - Para Guardar en la BD, MODELO:
           - Ver: ORM - Eloquent, CRUB - Store.

## MIGRACIONES


Docmentacion: https://laravel.com/docs/5.8/migrations#introduction

  Crear, Manipular la BD con control de Versiones. En `DOWN()` se revierte lo del `UP()`.

1. Crear base de datos y especificarla en .env
2. Generar archivo de migracion:
   2.1 Genera archivo de migracion para crear tabla "users"
   `php artisan make:migration create_users_table --create=users`
        **Crea**:
        Schema::create('nombre_tabla_plural', function (Blueprint $table) { ... });

   2.2 Genera archivo de migracion para modificar la tabla "users" sin Eliminar DATOS.
    `php artisan make:migration add_votes_to_users_table --table=users`
    opciones: `alter_in_users_table` o `add_phone_to_users_table`.
  **Crea**:
        Schema::table('nombre_tabla_plural', function (Blueprint $table) { ... });

3.  comandos:

 3.1 Comandos: En (Schema::create - DEFINE) y (Schema::table - AGREGA):

      $table->integer('numero')->default($value);       // Crea integer, define valor por defecto.
      $table->integer('numero')->unsigned();            // crea integer,  no negativos.
      $table->string('email',100)->unique();            // crea String con max 100 y asignar indexes unique.
      $table->decimal('variable', 5, 2);                // crea decimal, range:  999.99 to -999.99.
      $table->double('variable', 5, 2)->autoIncrement();// crea double auto-imcrementable.
      $table->float('variable', 5, 2)->nullable();      // crea double, null-enable.
      $table->text('description')->charset('utf8')      // crea text, con utf8
      $table->boolean('confirmed')->first();            // crea boolean y colocarlo de primero en la tabla
      $table->char('name', 100)->comment('my comment'); // crea un char, con comentario.
      $table->timestamp('tiempo')->useCurrent();        // timestamp, con current por defecto.

      $table->timestamps();           // crea nullable, create_at y update_at
      $table->bigIncrements('id');    // auto incremental, primary-key, unsigned, bigint
      $table->Increments('id');       // auto incremental, primary-key, unsigned, int
      $table->rememberToken();        // recordar datos de entrada del usuario.

      $table->engine = 'InnoDB';
      $table->charset = 'utf8';

      $table->foreign('user_id')->references('id')->on('users');       //asigna clave foranea
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

 3.2 Comandos: En (Schema::table - ACTUALIZAR - MODIFICAR Columnas):

      $table->string('email',40)->change();             //cambiar max legth
      $table->string('name', 50)->nullable()->change(); //Cambiar max legth y nulleable.
      $table->renameColumn('from', 'to');               //Cambiar nombre de la columna
      $table->renameIndex('from', 'to');                //Cambiar nombre del Index
      $table->string('phone')->after('email');          //mover la columna para despues

      $table->primary('id');                           //cambiar a primary key.
      $table->unique('email');                         //cabiar a unique index.
      $table->index('state');                          //cambiar a indice simple

      Schema::rename($from, $to);                      //renombrar tabla

 3.3 Comandos para ELIMINAR:

     Schema::dropIfExists('flights');                      //eliminar tabla
     $table->dropColumn('votes');                          //eliminar una columna
     $table->dropColumn(['votes', 'avatar', 'location']);  //eliminar varias columnas

     $table->dropTimestamps();                             //eliminar creat_at y update_at
     $table->dropRememberToken();                          //eliminar remember_token

     $table->dropPrimary('users_id_primary');              //eliminar primary_key
     $table->dropUnique('users_email_unique');             //eliminar unique
     $table->dropIndex('geo_state_index');                 //eliminar index

     $table->dropForeign('NOMBRETABLA_ID_foreign');        //eliminar clave foranea

4.  Manejo/ejecucion de las migraciones:
          `>php artisan migrate`             -> Ejecuta los metodos UP de todas las migraciones.
          `>php artisan migrate:rollback`    -> Ejecuta los metodos DOWN de las ultimas migraciones ejecutadas. (retrocede un paso)
         ` >php artisan migrate:rollback --step=2` -> retroceder 2 pasos
          `>php artisan migrate:reset`       -> Ejecuta los metodos DOWN de todas las migraciones.
          `>php artisan migrate:fresh`       -> Ejecuta RESET and MIGRATE.   (aplica cambios hechos en los UP() pero se destruyen todos los datos!)

## Querys
Documentacion: https://laravel.com/docs/5.8/queries



## ELOQUEN - ORM
Documentacion: https://laravel.com/docs/5.8/eloquent

ORM (objeto mapeo relacional) Datos de BD <->  clase/objeto

1. Por cada tabla Crear una clase-modelo:
         `>php artisan make:model NombreModelo` (usar singular y camello de la tabla)
         direccion: **app/NombreModelo.php**
 2. Definir el modelo-Eloquen (dentro del modelo):
         `protected $table = 'my_flights';`    // define la tabla de la DB que representa.
         `protected $primaryKey = 'flight_id';`// define el primary_key
         `public $incrementing = false; `      // indicar que el primary_key no es auto_incrementable
         `protected $keyType = 'string';`      // indicar que el primary_key es un String
         `public $timestamps = false;`         // indicar que no se usa created_at y updated_at

   3. Importar clase-modelo dentro del controlador: 
   `use App/NombreModelo;`

   4. Implementar **CRUB** con REST en el controlador:

       * **Index()  - Listar recursos:**
          `$tabla = NombreModelo::all(); ` // me trae todas las filas y columnas de la tabla.
         ` $tabla = NombreModelo::get();`

      * **Show()  -  Seleccion por id, Especifico:**
          1. `html-href: {{route("ruta",objRow)}}`
          2.  controler 2 formas:
             2.1. `Route::resource('/projects','ProjectController')->only(['index','show']);` //id pasa automaticamente.
             2.2. `Route::get("/linkControler/{objRowid}",'nameController@show')->name('name.show')`
          3. `$project = Project::findOrfail($id);`

      * **Create() - Formulario creacion de recurso:**
           1. `return view('recurso.create');`

      * **Store() - guardar datos:  (Ver Primero: formulario y validaciones con blade)**
           1. Antes de Insertar un atributo en la BD hay que permitirle Manualmente la Asignacion Masiva "Fillable" de cada atributo,
              Para asi reafirmar solo los atributos a introducir por el formulario y proteger los introducidos por el sistema.
              En modelo-class Definir:
                 `protected $fillable = ['atributo1','atributo2'...];`

           2. Guardar con create.
                  `Project:: create([
                      'title' => $request->get('title'),
                      'description' => $request->get('description'),
                   ]);`
