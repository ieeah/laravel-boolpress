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

// le URL che definiamo qui vengono sempre anticipate da dominio/api/

// TEST ROUTE
// Route::get('/test', function() {

 	// come al solito è più comodo gestire la logica in un controller e non qui
// 	return response()->json([
// 		'clients' => ['paolo', 'giorgio', 'marta'],
// 		'lorem' => 'ipsum',
// 	]);
// });

Route::namespace('Api')
	->group(function () {
		Route::get('/posts', 'PostController@index');
});
