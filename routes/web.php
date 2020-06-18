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
    return view('login');
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

Route::get('importDeliveries', function () {
    return view('user.import.importDeliveries');
})->name('importDeliveries');
//Fin de las rutas de formularios

//Rutas de importacion de las entidades, becarios, titulares y archivos excel en general
Route::post('importRegion', 'ImportEntityController@importRegion')->name('importRegion');
Route::post('importMunicipality', 'ImportEntityController@importMunicipality')->name('importMunicipality');
Route::post('importLocality', 'ImportEntityController@importLocality')->name('importLocality');
Route::post('importSchool', 'ImportEntityController@importSchool')->name('importSchool');


Route::post('importScholar', 'ImportScholarController@importScholar')->name('importScholar');
Route::post('importDelivery', 'ImportScholarController@importDelivery')->name('importDelivery');
//Fin de las rutas de importacion de archivos excel 

