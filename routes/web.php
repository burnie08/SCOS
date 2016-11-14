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

Auth::routes();






Route::group(['prefix' => '', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function (){
    
    Route::get('admin', 'Admin\\AdminController@index');
    Route::get('admin/give-role-permissions', 'Admin\\AdminController@getGiveRolePermissions');
    Route::post('admin/give-role-permissions', 'Admin\\AdminController@postGiveRolePermissions');
    Route::resource('admin/roles', 'Admin\\RolesController');
    Route::resource('admin/permissions', 'Admin\\PermissionsController');
    Route::resource('admin/users', 'Admin\\UsersController');
		
});

// Swim Instructors
Route::group(['prefix' => '', 'middleware' => ['auth', 'roles'], 'roles' => ['swim-instructor','admin', 'swim-admin']], function (){
    
        
        Route::get('/lessons/{swimmer_id}/lessonsReport', 'Instructors\\lessonsController@lessonsReport');
		Route::get('/search', 'Instructors\\SwimmersController@mySwimmers');
        Route::get('/', 'Instructors\\SwimmersController@mySwimmers');
        Route::get('search/lastNamesLike', 'Instructors\\SwimmersController@lastNamesLike');
        Route::get('/home', 'HomeController@index');
    
       
        Route::resource('Instructors/swimmers', 'Instructors\\SwimmersController');
        Route::resource('proficiency-levels', 'SwimAdmin\\ProficiencyLevelsController');
        
        Route::get('/lessons/{swimmer_id}/show', 'Instructors\\lessonsController@show');
        
        Route::post('/lessons/{swimmer_id}/{skill_card_id}/createLesson','Instructors\\lessonsController@createLesson');
        Route::get('/lessons/{swimmer_id}/{skill_card_id}/evalsCreate', 'Instructors\\lessonsController@evalsCreate');
        Route::get('/lessons/{lesson_id}/evalsEdit','Instructors\\lessonsController@evalsEdit');
        Route::post('/lessons/{lesson_id}/evalsUpdate','Instructors\\lessonsController@evalsUpdate');
        Route::get('/lessons/{lesson_id}/{swimmer_id}/destroy','Instructors\\lessonsController@destroy');
    
        Route::resource('Instructors/lessons', 'Instructors\\lessonsController');
        Route::resource('Instructors/evals', 'Instructors\\evalsController');
    
});

Route::group(['prefix' => '', 'middleware' => ['auth', 'roles'], 'roles' => ['admin', 'swim-admin']], function (){

    Route::post('SwimAdmin/skill/store', 'SwimAdmin\\SkillController@store');
    Route::get('SwimAdmin/skill/{card_id}/showAll', 'SwimAdmin\\SkillController@showAll');
    Route::get('SwimAdmin/skill/{card_id}/create', 'SwimAdmin\\SkillController@create');
    Route::post('SwimAdmin/skill/{id}/delete', 'SwimAdmin\\SkillController@destroy');
    Route::get('SwimAdmin/skill/{id}/edit', 'SwimAdmin\\SkillController@edit');
    Route::post('SwimAdmin/skill/{id}/update', 'SwimAdmin\\SkillController@update');

    Route::resource('SwimAdmin/skill-cards', 'SwimAdmin\\SkillCardsController');
    Route::resource('SwimAdmin/skill-levels', 'SwimAdmin\\SkillLevelsController');
    

});

Route::get('/logout', function()
{
    Auth::logout();
    Session::flush();
    return Redirect::to('/login');
});






