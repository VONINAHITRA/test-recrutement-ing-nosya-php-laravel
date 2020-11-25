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

Route::get('/','UtilisateurController@index')->name('index');
Route::resource('/utilisateur','UtilisateurController');
Route::post('/utilisateur/{id}/update', 'UtilisateurController@update')->name('utilisateur.update');
Route::get('/recherche','UtilisateurController@recherche')->name('utilisateur.recherche');