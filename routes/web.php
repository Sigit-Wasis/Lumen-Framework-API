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