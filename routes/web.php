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

/* Ajax */
Route::get('/plan-ajax', ['as' => 'plan-ajax', 'uses' => 'HomeController@PlanAjax' ]);
Route::get('/comment-ajax/{plan_id}', ['as' => 'comment-ajax', 'uses' => 'HomeController@CommentAjax' ]);
Route::get('/comment-ajax', ['as' => 'comment-ajax', 'uses' => 'HomeController@CommentAjax' ]);
Route::get('/like-ajax', ['as' => 'like-ajax', 'uses' => 'HomeController@LikeAjax' ]);
Route::get('/dislike-ajax', ['as' => 'dislike-ajax', 'uses' => 'HomeController@DislikeAjax' ]);
Route::get('/load-more-friend-online', ['as' => 'load-more-friend-online', 'uses' => 'HomeController@LoadMoreFriendOnline']);

/* Admin role */
Route::get('/admin_area', ['middleware' => 'admin', function () {
     return view('welcome');
}]);

/* Plan */
Route::post('/create-plan', ['as' => 'create-plan', 'uses' => 'Plan\PlanController@create']);;
Route::post('/post-comment/{plan_id}', ['as' => 'post-comment', 'uses' => 'Plan\PlanController@postComment']);
Route::post('/create-plan', ['as' => 'create-plan', 'uses' => 'Plan\PlanController@create' ]);
Route::get('/auto-find-place', ['as' => 'auto-find-place', 'uses' => 'Plan\PlanController@autoFindPlace' ]);
Route::post('/handle-create-plan', ['as' => 'handle-create-plan', 'uses' => 'Plan\PlanController@handleCreate' ]);
Route::post('/create-place', ['as' => 'handle-create-place', 'uses' => 'Plan\PlanController@handleCreatePlace' ]);
Route::get('/create-place', ['as' => 'create-place', function(){
    return \View::make('plan.create-place');
}]);

/* Friend */
Route::get('/find-friend', ['as' => 'find-friend', 'uses' => 'Friend\FriendController@FindFriend']);
Route::get('/reload-recommend-friend', ['as' => 'reload-recommend-friend', 'uses' => 'Friend\FriendController@ReloadRecommendFriend']);
Route::get('/add-friend-request', ['as' => 'add-friend-request', 'uses' => 'Friend\FriendController@AddFriendRequest']);
Route::get('/cancel-friend-request', ['as' => 'cancel-friend-request', 'uses' => 'Friend\FriendController@CancelFriendRequest']);
Route::get('/add-friend-request', ['as' => 'add-friend-request', 'uses' => 'Friend\FriendController@AddFriendRequest']);
Route::get('/friend-request', ['as' => 'friend-request', 'uses' => 'Friend\FriendController@FriendRequest']);
Route::get('/friend-request-ajax', ['as' => 'friend-request-ajax', 'uses' => 'Friend\FriendController@FriendRequestAjax']);
Route::get('/accept-friend', ['as' => 'accept-friend', 'uses' => 'Friend\FriendController@AcceptFriend']);
Route::get('/deny-friend', ['as' => 'accept-friend', 'uses' => 'Friend\FriendController@DenyFriend']);
Route::get('/friend-list', ['as' => 'friend-list', 'uses' => 'Friend\FriendController@showFriendList']);

/* Chat page */
Route::get('/chat-friend-ajax', ['as' => 'chat-friend-ajax', 'uses' => 'Chat\ChatController@ChatFriendAjax']);
Route::get('/chat', 'Chat\ChatController@Chat');\
Route::get('messages', 'Chat\ChatController@fetchMessages');
Route::post('messages', 'Chat\ChatController@sendMessage');
Route::get('/messages-ajax', ['as' => 'messages-ajax', 'uses' => 'Chat\ChatController@MessagesAjax']);

/* Time line page */
Route::get('/{id}',['as' => 'time-line', 'uses' => 'TimelineController@showTimeline']);
