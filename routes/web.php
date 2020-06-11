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

// rutas de recursos
Route::resource('user', 'UserController');
Route::resource('region', 'RegionController');
Route::resource('municipality', 'MunicipalityController');
Route::resource('locality', 'LocalityController');
Route::resource('school', 'SchoolController');
Route::resource('scholar', 'ScholarController');


Route::get('importEntities', function () {
    return view('user.import.importEntities');
})->name('importEntities');

Route::get('importScholars', function () {
    return view('user.import.importScholars');
})->name('importScholars');

Route::post('importMunicipality', 'ImportEntitiesController@importMunicipality')->name('importMunicipality');
Route::post('importLocality', 'ImportEntitiesController@importLocality')->name('importLocality');
Route::post('importSchool', 'ImportEntitiesController@importSchool')->name('importSchool');
Route::post('importRegion', 'ImportEntitiesController@importRegion')->name('importRegion');


Route::post('importScholar', 'ImportScholarsController@importScholar')->name('importScholar');
Route::post('importTitular', 'ImportScholarsController@importTitular')->name('importTitular');

