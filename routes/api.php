<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([
    'namespace' => '\App\Admin\Apis'
], function () {
    Route::get('questions', 'QuestionApi@getAll');
    Route::get('questions/page', 'QuestionApi@getByUri');
    Route::get('user-guides', 'UserGuideApi@getAll');
    Route::get('user-guides/page', 'UserGuideApi@getByUri');
});
