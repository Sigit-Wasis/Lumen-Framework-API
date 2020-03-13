<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Import Helper Str untuk Generate
use Illuminate\Support\Str;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Generate Application Key
$router->get('/key', function () {
	return Str::random(32);
});

// API Endpoint method HTTP (get)
$router->get('/foo', function() {
	return "Hello, GET Method!";
});

//  API Endpoint method HTTP (post)
$router->post('/bar', function() {
	return "Hello, POST Method!";
});

// The route allows you to register routes that respond to any HTTP verb:
$router->get('/get', function() {
	return "GET";
});

$router->post('/post', function() {
	return "POST";
});

$router->delete('/delete', function() {
	return "DELETE";
});

$router->put('/put', function() {
	return "PUT";
});

$router->patch('/patch', function() {
	return "PATCH";
});

$router->options('/options', function() {
	return "OPTIONS";
});

// Example routing with Parameter Dinamis pad URI
$router->get('/user/{id}', function ($id) {
	return "User Kamu: ". $id;
});

// Routing dengan Parameter Banyak
$router->get('/post/{postId}/comments/{commentId}', function($postId, $commentId) {
	return "Post ID = ". $postId ." Dan Comment ID = ". $commentId; 
});

// Routing dengan Parameter Optional
$router->get('/optional[/{param}]', function($param = null) {
	return $param;
});

// Nama aliases pada route
// Maka ketika mengakses /profile maka akan di arahkan ke /profile/embuncode
$router->get('profile', function() {
	return redirect()->route('route.profile');
});

$router->get('profile/embuncode', ['as' => 'route.profile', function() {
	return "INI ROUTE ALIAS";
}]);

// Mengelompokkan route dengan method Group Prefix
// Dimana use dapat memanggil nilai scope dari function atau clouser yang dibuat
$router->group(['prefix' => 'administrator'], function() use ($router) {
	$router->get('home', function() {
		return "Halaman Home Admin";
	});

	$router->get('user', function() {
		return "Halaman User Admin";
	});
});

// Mengelompokkan route dengan middleware age untuk proteksi umur
// Dan ketik URL di browser http://localhost:8000/admin/home?age=20 {untuk umur diatas 17}
$router->get('admin/home', ['middleware' => 'age', function() {
	return "Old Enough";
}]);

// Kemudian dideteksi umur tidak sesuai maka ke router fail
// Dan ketik URL di browser http://localhost:8000/admin/home?age=15 {untuk umur dibawah 17}
$router->get('fail', function() {
	return "Not Yet Mature";
});

// Mengenerate Key dengan menggunakan controller 
$router->get('keys', 'ExampleController@generateKey');

// Mengenerate Key dengan menggunakan controller method POST
// Menjalankan method POST dengan menggunakan Postman
$router->post('rangedev', 'ExampleController@rangeDev');

// Menggunakan Parameter dengan Controller
$router->get('user/{id}', 'ExampleController@getUser');

// Menggunakan Parameter banyak dengan Controller
$router->get('post/cat1/{cat1}/cat2/{cat2}', 'ExampleController@getPost');

// Menggunakan named route pada controller
$router->get('profile', ['as' => 'profile', 'uses' => 'ExampleController@getProfile']);
$router->get('profile/action', ['as' => 'profile.action', 'uses' => 'ExampleController@getProfileAction']);

// Router Request Handler
$router->get('foobar', 'ExampleController@fooBar');
$router->get('barfoo', 'ExampleController@fooBar');

