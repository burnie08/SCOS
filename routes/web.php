<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('search', function () {
   return view('Instructors.search.search');
});
Route::get('search/lastNamesLike', 'Instructors\\SwimmersController@lastNamesLike');



Route::get('admin', 'Admin\\AdminController@index');
Route::get('admin/give-role-permissions', 'Admin\\AdminController@getGiveRolePermissions');
Route::post('admin/give-role-permissions', 'Admin\\AdminController@postGiveRolePermissions');
Route::resource('admin/roles', 'Admin\\RolesController');
Route::resource('admin/permissions', 'Admin\\PermissionsController');
Route::resource('admin/users', 'Admin\\UsersController');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('Instructors/swimmers', 'Instructors\\SwimmersController');
Route::resource('proficiency-levels', 'SwimAdmin\\ProficiencyLevelsController');

Route::post('admin/skill/store', 'SwimAdmin\\SkillController@store');
Route::get('admin/skill/{card_id}/showAll', 'SwimAdmin\\SkillController@showAll');
Route::get('admin/skill/{card_id}/create', 'SwimAdmin\\SkillController@create');
Route::get('admin/skill/{id}/delete', 'SwimAdmin\\SkillController@destroy');
Route::get('admin/skill/{id}/edit', 'SwimAdmin\\SkillController@edit');
Route::get('admin/skill/{id}/update', 'SwimAdmin\\SkillController@update');
Route::resource('admin/skill-cards', 'SwimAdmin\\SkillCardsController');

