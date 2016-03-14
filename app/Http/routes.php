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

$app->get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

$app->get('/search', ['uses' => 'SearchController@index', 'as' => 'search_default']);
$app->get('/search/index/{id}', ['uses' => 'SearchController@index', 'as' => 'search']);
$app->get('/search/get-urls-file', ['uses' => 'SearchController@getUrlsFile', 'as' => 'get-urls-file']);