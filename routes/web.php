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

Route::get('/', 'FrontController@index');
Route::get('/send', ['uses'=>'MailController@send', 'as'=>'home.page']);

Route::group(['prefix' => 'admin-group-1', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'Admin\AdminController@index');

    // Slider
    Route::get('/slider-trash', ['uses' => 'Admin\SliderController@slider_trash', 'as' => 'slider.trash']);
    Route::get('/slider-restore/{id}', ['uses' => 'Admin\SliderController@slider_restore', 'as' => 'slider.restore']);
    Route::get('/slider-remove/{id}', ['uses' => 'Admin\SliderController@slider_remove', 'as' => 'slider.remove']);
    Route::post('slider/update-order','Admin\SliderController@change_image_order')->name('aa');
    Route::resource('/slider', 'Admin\SliderController');

    // Services
    Route::get('/service-trash', ['uses' => 'Admin\ServiceController@service_trash', 'as' => 'service.trash']);
    Route::get('/service-restore/{id}', ['uses' => 'Admin\ServiceController@service_restore', 'as' => 'service.restore']);
    Route::get('/service-remove/{id}', ['uses' => 'Admin\ServiceController@service_remove', 'as' => 'service.remove']);
    Route::resource('/service', 'Admin\ServiceController');

    // Professions
    Route::get('/profession-trash', ['uses' => 'Admin\ProfessionController@profession_trash', 'as' => 'profession.trash']);
    Route::get('/profession-restore/{id}', ['uses' => 'Admin\ProfessionController@profession_restore', 'as' => 'profession.restore']);
    Route::get('/profession-remove/{id}', ['uses' => 'Admin\ProfessionController@profession_remove', 'as' => 'profession.remove']);
    Route::resource('/profession', 'Admin\ProfessionController');

    // Members
    Route::get('/member-trash', ['uses' => 'Admin\MemberController@member_trash', 'as' => 'member.trash']);
    Route::get('/member-restore/{id}', ['uses' => 'Admin\MemberController@member_restore', 'as' => 'member.restore']);
    Route::get('/member-remove/{id}', ['uses' => 'Admin\MemberController@member_remove', 'as' => 'member.remove']);
    Route::resource('/member', 'Admin\MemberController');

    // Category
    Route::get('/category-trash', ['uses' => 'Admin\CategoryController@category_trash', 'as' => 'category.trash']);
    Route::get('/category-restore/{id}', ['uses' => 'Admin\CategoryController@category_restore', 'as' => 'category.restore']);
    Route::get('/category-remove/{id}', ['uses' => 'Admin\CategoryController@category_remove', 'as' => 'category.remove']);
    Route::resource('/category', 'Admin\CategoryController');

    // Project
    Route::get('/project-trash', ['uses' => 'Admin\ProjectController@project_trash', 'as' => 'project.trash']);
    Route::get('/project-restore/{id}', ['uses' => 'Admin\ProjectController@project_restore', 'as' => 'project.restore']);
    Route::get('/project-remove/{id}', ['uses' => 'Admin\ProjectController@project_remove', 'as' => 'project.remove']);
    Route::resource('/project', 'Admin\ProjectController');

});


Auth::routes();


