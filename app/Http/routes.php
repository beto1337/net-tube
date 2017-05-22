<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'AdminController@index2');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/home2', 'AdminController@index2');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/slider', 'SliderController@index');
Route::get('/admin/slider/new', 'SliderController@newslider');
Route::post('admin/slider/registrar','SliderController@saveslider');
Route::get('admin/slider/editslider/{id}', 'SliderController@editslider');
Route::post('admin/slider/editar', 'SliderController@editar');



//administrador controller SAMConnection
Route::get('/admin/general','AdministradorController@index');
Route::post('/admin/guardarinfo','AdministradorController@guardarinfo');

Route::get('/admin/entrada','PostController@index');
Route::get('/admin/entrada/nuevo','PostController@newpost');
Route::get('/admin/entrada/editarentrada/{id}','PostController@editpost');
Route::post('admin/guardarpost','PostController@savepost');
Route::post('admin/post/actualizarpost','PostController@editpostf');

Route::get('/admin/post/deletepost/{id}','PostController@deletepost');

Route::get('/admin/pagina','PaginasController@index');
Route::get('/admin/pagina/new','PaginasController@newpagina');
Route::post('admin/guardarpagina','PaginasController@savepagina');
Route::get('/admin/pagina/editpagina/{id}','PaginasController@editpagina');
Route::post('admin/pagina/actualizarpagina','PaginasController@editpaginaf');
Route::get('/admin/pagina/deletepagina/{id}','PaginasController@deletepagina');


Route::get('/admin/categorias','categoriasController@index');
Route::get('/admin/categoria/new','categoriasController@newcategoria');
Route::post('admin/guardarcategoria','categoriasController@savecategoria');
Route::get('/admin/categoria/editarcategoria/{id}','categoriasController@editarcategoria');
Route::post('admin/categoria/editarcategoria','categoriasController@actualizarcategoria');
Route::get('/admin/categoria/eliminarcategoria/{id}','categoriasController@eliminarcategoria');
//Route::get('/{categoria}/{post}','categoriasController@deletecategoria');


Route::get('admin/usuarios','UsuariosController@index');
Route::get('/home/{slug}','DireccionesController@paginas');

Route::get('/{categoria}/{slug}','DireccionesController@index');
