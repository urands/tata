<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::get('/test', function()
{
	return View::make('test');
});


Route::match(array('GET', 'POST'), '/true{id}/{id2}', function($id,$id2)
{
    return 'Hello World '.$id.'   '.$id2;
});


Route::any('foo', function()
{
    $id = 0;
	$url = URL::to('me{id}');
    return 'Hello World foo '.$url;
});

Route::get('user', array('before' => array('auth', 'old'), function()
{
    return 'You are authenticated and over 200 years old!';
}));

Route::get('/login', function()
{
	return View::make('test');
});