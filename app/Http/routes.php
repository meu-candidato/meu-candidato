<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home.index',
    'uses' => '\\App\\Http\\Controllers\\HomeController@index'
]);

Route::get('/cadastro', [
    'as' => 'home.candidate.add',
    'uses' => '\\App\\Http\\Controllers\\CandidateController@add'
]);

Route::post('/cadastro', [
    'as' => 'home.candidate.submit',
    'uses' => '\\App\\Http\\Controllers\\CandidateController@submit'
]);

Route::get('/{ref}', [
    'as' => 'home.candidate.view',
    'uses' => '\\App\\Http\\Controllers\\CandidateController@view'
]);

Route::group(['prefix' => 'ajax'], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('/{facebookId}', [
            'as' => 'ajax.user.get',
            'uses' => '\\App\\Http\\Controllers\\Ajax\\UserController@get'
        ]);

        Route::post('/', [
            'as' => 'ajax.user.add',
            'uses' => '\\App\\Http\\Controllers\\Ajax\\UserController@add'
        ]);
    });

    Route::group(['prefix' => 'vote'], function () {
        Route::post('/', [
            'as' => 'ajax.vote.add',
            'uses' => '\\App\\Http\\Controllers\\Ajax\\VoteController@add'
        ]);
    });

    Route::group(['prefix' => 'candidate'], function () {
        // To set a custom page, send query param "page"
        Route::get('/', [
            'as' => 'ajax.candidate.paginate',
            'uses' => '\\App\\Http\\Controllers\\Ajax\\CandidateController@paginate'
        ]);
    });
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
