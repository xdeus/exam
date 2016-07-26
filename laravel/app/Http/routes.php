<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', 'WelcomeController@index');
/*define('THUMBS_DIR','thumbs');*/

Route::filter('serviceCSRF',function(){
if (Session::token() != Request::header('csrf_token')) {
    return Response::json([
        'message' => 'Security token doesn\'t match, possible CSRF attack.'
    ], 418);
}
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/404', function(){
	return view('desktop.404');
});

Route::get('/home', function(){
	return view('desktop.home');
});

Route::get('/', function(){
	return view('desktop.home');
});

Route::get('/login', 'LoginController@ShowLogin');

Route::get('/logout', 'LoginController@DoLogout');

Route::post('/login', 'LoginController@DoLogin');

Route::get('/guidelines', 'ExamController@ShowGuidelines');



