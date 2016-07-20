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

Route::group(['middleware' => ['web','auth']], function () {
    //


    Route::get('map', 'Map@index');
    Route::post('map', 'Map@save_and_next');

    Route::get('manage/project', 'ManageController@project');
    Route::get('manage/admin/{proj_id}', 'ManageController@admin');
    Route::get('manage/project/init_project', 'ManageController@init_project');

    Route::post('manage/users/permissions/detach_user_project/', 'UsersController@detach_user_project');
    Route::post('manage/users/permissions/attach_user_project/', 'UsersController@attach_user_project');
    Route::get('manage/users/permissions/{proj_id}', 'UsersController@show_users_projects');
    Route::get('manage/users/statistics/{proj_id}', 'UsersController@statistics');
    


});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'indexController@index');
    Route::get('/', 'indexController@index');
    Route::get('index', 'indexController@index');

    Route::get('geometry/get_project_json', 'GeometryController@get_project_json');
    Route::get('geometry/get_project_extent', 'GeometryController@get_project_extent');
    Route::get('geometry/get_cell_json/{id}', 'GeometryController@get_cell_json');


    Route::get('/test', 'indexController@test');

});
