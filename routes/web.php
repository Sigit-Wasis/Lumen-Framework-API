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