<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Resource;

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

Route::post('login', function () {
    $credentials = request()->only('email', 'password','role');

    if (auth()->once($credentials)) {
        
        auth()->user()->update(['api_token' => str_random(64)]);

        return auth()->user();
    }

    return 'Fail';
});

Route::group(['middleware' => ['tokenaccess']], function () {
    
    Route::get('cities', 'CityAPIController@show_city');

    Route::get('schools/{id}', 'SchoolAPIController@show');

    Route::post('schools', 'SchoolAPIController@store');

    Route::delete('school', 'SchoolAPIController@delete');

    Route::get('school/search', 'SchoolAPIController@search');

    Route::get('school/level', 'SchoolAPIController@level');

    Route::resource('provinces', 'ProvinceAPIController');

    Route::resource('schools/facilities', 'SchoolFacilityAPIController');

    Route::get('facilities', 'FacilityAPIController@show');

    Route::Resource('levels', 'LevelAPIController');

    Route::get('detail', 'DetailController@otherSchools');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
Route::resource('provinces', 'ProvinceAPIController');

Route::resource('cities', 'CityAPIController');

Route::resource('schools', 'SchoolAPIController');


Route::resource('facilities', 'FacilityAPIController');

Route::resource('school_facilities', 'SchoolFacilityAPIController');

Route::resource('levels', 'LevelAPIController');*/
