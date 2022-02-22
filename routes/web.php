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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});
=======
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{uri}', 'ClientConfigController@index');
>>>>>>> 680c98c99102b3f16eef6e09116ca23c7687b142
