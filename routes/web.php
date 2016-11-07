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


//This is the test comment to test rebasing

Route::get('/', 'SwimAdmin\\SkillCardsController@index');

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

Route::post('SwimAdmin/skill/store', 'SwimAdmin\\SkillController@store');
Route::get('SwimAdmin/skill/{card_id}/showAll', 'SwimAdmin\\SkillController@showAll');
Route::get('SwimAdmin/skill/{card_id}/create', 'SwimAdmin\\SkillController@create');
Route::post('SwimAdmin/skill/{id}/delete', 'SwimAdmin\\SkillController@destroy');
Route::get('SwimAdmin/skill/{id}/edit', 'SwimAdmin\\SkillController@edit');
Route::post('SwimAdmin/skill/{id}/update', 'SwimAdmin\\SkillController@update');

Route::resource('SwimAdmin/skill-cards', 'SwimAdmin\\SkillCardsController');


Route::resource('SwimAdmin/skill-levels', 'SwimAdmin\\SkillLevelsController');