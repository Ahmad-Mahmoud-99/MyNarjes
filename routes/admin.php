<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

if (!defined('PAGINATION_COUNT')) {
   define('PAGINATION_COUNT',5);
}
Auth::routes();
Route::group(['middleware'=>'auth:admin'],function(){
    Route::get('/admin','Admin\DashboardController@index')->name('admin.dashboard');
    ####################patientmanagment##############
    Route::group(['prefix'=>'patientManagment', 'namespace'=>'patient'],function(){
        Route::get('/','patientManagmentController@index')->name('admin.patientManagment');
        Route::get('/search','patientManagmentController@search')->name('admin.patient.search');
        Route::get('create','patientManagmentController@create')->name('admin.patientManagment.create');
        Route::post('store','patientManagmentController@store')->name('admin.patientManagment.store');


        Route::get('edit/{id}','patientManagmentController@edit')->name('admin.patientManagment.edit');
        Route::post('update/{id}','patientManagmentController@update')->name('admin.patientManagment.update');//or put
    });
    ########################end patientmanagment###########################

    ####################user##############
    Route::group(['prefix'=>'userManagment', 'namespace'=>'user'],function(){
        Route::get('/','userController@index')->name('admin.myProfile');
        Route::get('create','userController@create')->name('admin.userManagment.create');
        Route::get('/search','userController@search')->name('admin.user.search');
        Route::get('/filter', 'userController@filter')->name('admin.user.filter');
        Route::post('store','userController@store')->name('admin.userManagment.store');
        Route::get('/userManagment','userController@userManagment')->name('admin.userManagment');
        Route::get('edit/{id}','userController@edit')->name('admin.userManagment.edit');
        Route::post('update/{id}','userController@update')->name('admin.userManagment.update');//or put
    });
    ########################end user###########################


    ####################analysis##############
    Route::group(['prefix'=>'analysis', 'namespace'=>'analysis'],function(){
        Route::get('/','analysisController@index')->name('admin.showAnalysis');
        Route::get('/search','analysisController@search')->name('admin.search');
        Route::get('/fiter', 'analysisController@filter')->name('admin.filter');
//        Route::get('create','analysisController@create')->name('admin.userManagment.create');
//        Route::post('store','analysisController@store')->name('admin.userManagment.store');
//        Route::get('/userManagment','analysisController@userManagment')->name('admin.userManagment');
//        Route::get('edit/{id}','analysisController@edit')->name('admin.userManagment.edit');
//        Route::post('update/{id}','analysisController@update')->name('admin.userManagment.update');//or put
    });
    ########################end analysis###########################

});

// Route::get('/home', 'HomeController@index')->name('home');



