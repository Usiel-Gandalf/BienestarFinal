<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Rutas de recursos
Route::resource('user', 'UserController');
Route::resource('region', 'RegionController');
Route::resource('municipality', 'MunicipalityController');
Route::resource('locality', 'LocalityController');
Route::resource('school', 'SchoolController');
Route::resource('scholar', 'ScholarController');
Route::resource('titular', 'TitularController');
//Fin de la ruta de recursos

//Rutas de busqueda 
Route::get('searchRegion', 'RegionController@show')->name('searchRegion');
Route::get('searchMunicipality', 'MunicipalityController@show')->name('searchMunicipality');
Route::get('searchLocality', 'LocalityController@show')->name('searchLocality');
Route::get('searchSchool', 'SchoolController@show')->name('searchSchool');
Route::get('searchScholar', 'ScholarController@show')->name('searchScholar');
Route::get('searchTitular', 'TitularController@show')->name('searchTitular');
//Fin de las rutas de busqueda

//Rutas para ir a los formularios de importacion de archivos excel
Route::get('importEntities', function () {
    return view('user.import.importEntities');
})->name('importEntities');

Route::get('importScholars', function () {
    return view('user.import.importScholars');
})->name('importScholars');
//Fin de las rutas de formularios

//Rutas de importacion de las entidades, becarios, titulares y archivos excel en general
Route::post('importMunicipality', 'ImportEntitiesController@importMunicipality')->name('importMunicipality');
Route::post('importLocality', 'ImportEntitiesController@importLocality')->name('importLocality');
Route::post('importSchool', 'ImportEntitiesController@importSchool')->name('importSchool');
Route::post('importRegion', 'ImportEntitiesController@importRegion')->name('importRegion');

Route::post('importScholar', 'ImportScholarsController@importScholar')->name('importScholar');
Route::post('importTitular', 'ImportScholarsController@importTitular')->name('importTitular');
//Fin de las rutas de importacion de archivos excel 

