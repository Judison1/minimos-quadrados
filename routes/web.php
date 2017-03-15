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

$app->get('/', function () use ($app) {
    return view('home');
});
$app->post('/calculo/linear', [
	'as' => 'calculo.linear',
	'uses' => 'PublicController@linear'
]);
$app->post('/calculo/exponencial', [
	'as' => 'calculo.exponencial',
	'uses' => 'PublicController@exponencial'
]);
$app->post('/calculo/polinomial', [
	'as' => 'calculo.polinomial',
	'uses' => 'PublicController@polinomial'
]);
$app->get('/teste', function () use ($app) {
	$x = "";
	$y = "";
	for ($i=0; $i < 100000; $i++) { 
		$x .= $i.';';
		$y .= 15.3*$i+rand(1,10).';';
	}
   echo $y;
});