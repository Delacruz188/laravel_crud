<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 

// el primer parametro es el tipo de ruta, que puede ser get, post, etc
// el segundo parametro es la direccion a la que va a acceder el usuario
// y el tercer parametro va a ser el controlador y el metodo de ese controlador
// Laravel ya reconoce que es un controlador por lo que basta con hacerlo como el siguiente ejemplo
// Por regla los controllers siempre deben de ir con la termiacion Controller
Route::get('/catalogos/servicios/listado', 'ServicioController@listado');
// agregamos la ruta para agregar un servicio por medio de un formulario
// Route::post('/servicios/formulario', 'ServicioController@formulario');
// Necesitamos una ruta que acepte tanto post como get, asi que lo hacemos de la siguiente manera
Route::match(array('GET','POST'), '/catalogos/servicios/formulario', 'ServicioController@formulario');
// agregamos una ruta para cuando el usuario mande un post o inserte datos
Route::post('/catalogos/servicios/insertar', 'ServicioController@save');


// ahora haremos las rutas para los productos
Route::get('/catalogos/productos/listado','ProductosController@listado');
Route::match(array('GET','POST'), '/catalogos/productos/formulario', 'ProductosController@formulario');
Route::post('/catalogos/productos/insertar', 'ProductosController@save');

    
// ahora haremos las rutas para el personal
Route::get('/catalogos/personal/listado','PersonalController@listado');
Route::match(array('GET','POST'), '/catalogos/personal/formulario', 'PersonalController@formulario');
Route::post('/catalogos/personal/insertar', 'PersonalController@save');


// rutas para las fotos
Route::get('fotos/{nombre_foto}','PersonalController@mostrar_foto');


// para crear aleatoriamente los registros de personal y de servicios
Route::get('dbup/personal', 'DbUpController@personal');
Route::get('dbup/servicio', 'DbUpController@servicio');
Route::get('dbup/socios', 'DbUpController@socios');

Route::match(['GET', 'POST'], '/buscador', 'BuscadorController@index');

// Aqui van las rutas para socios
Route::get('/catalogos/socios/listado','SocioController@listado');
Route::match(array('GET','POST'), '/catalogos/socios/formulario', 'SocioController@formulario');
Route::post('/catalogos/socios/insertar', 'SocioController@save');