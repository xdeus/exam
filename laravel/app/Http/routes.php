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

Route::get('/questions', function(){
	return view('desktop.questions');
});

Route::get('/fetch_question_paper', 'ExamController@FetchQuestionPaper');

Route::get('/update_answer', 'ExamController@UpdateAnswer');

Route::get('/clear_answer', 'ExamController@ClearAnswer');

Route::get('/mark_question', 'ExamController@MarkQuestion');

Route::get('/current_question', 'ExamController@CurrentQuestion');
