<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('/', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('/', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index' ]);
Route::get('/plan-ajax', ['as' => 'plan-ajax', 'uses' => 'HomeController@PlanAjax' ]);
Route::get('/comment-ajax/{plan_id}', ['as' => 'comment-ajax', 'uses' => 'HomeController@CommentAjax' ]);
Route::get('/comment-ajax', ['as' => 'comment-ajax', 'uses' => 'HomeController@CommentAjax' ]);

Route::get('/admin_area', ['middleware' => 'admin', function () {
     return view('welcome');
}]);
Route::post('/create-plan', ['as' => 'create-plan', 'uses' => 'Plan\PlanController@create']);;
Route::post('/post-comment/{plan_id}', ['as' => 'post-comment', 'uses' => 'Plan\PlanController@postComment']);