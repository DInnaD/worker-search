<?php

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {
	
    // Route::get('vacancy-book', 'VacancyController@book');
    // Route::get('vacancy-unbook', 'VacancyController@unBook');
	Route::get('vacancy/{vacancy_id}/{organization_id}', 'VacancyController@setOrganization');
	Route::prefix('organizations/{organization}')->group(function () {
	Route::resource('vacancies', 'VacancyController@indexVacancies');
    Route::get('stats/vacancy', 'VacancyController@indexStats'); //
	Route::apiResource('/vacancy', 'VacancyController');


	Route::get('organization/{id}/{creator_id}', 'OrganizationController@setCreator');
    Route::get('stats/organization', 'OrganizationController@indexStats');//
}); 
	Route::apiResource('/organization', 'OrganizationController');

    Route::get('stats/user', 'UserController@indexStats');// 
	Route::apiResource('/user', 'UserController');

	Route::get('/logout', 'AuthController@logout');
});


Route::group(['middleware'	=>	'guest'], function(){
	Route::post('/register', 'AuthController@register');
	Route::post('/login', 'AuthController@login');
});