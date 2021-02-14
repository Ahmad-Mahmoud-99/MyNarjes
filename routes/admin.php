<?php

use Illuminate\Support\Facades\Route;

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
    define('PAGINATION_COUNT',5);

Auth::routes();
Route::group([/*, 'middleware'=>'auth:admin'*/],function(){
    Route::get('/admin','Admin\DashboardController@index')->name('admin.dashboard');
    ####################patientmanagment##############
    Route::group(['prefix'=>'patientManagment', 'namespace'=>'patient'],function(){
        Route::get('/','patientManagmentController@index')->name('admin.patientManagment');
        Route::get('create','patientManagmentController@create')->name('admin.patientManagment.create');
        Route::post('store','patientManagmentController@store')->name('admin.patientManagment.store');


        // Route::get('edit/{id}','patientManagmentController@edit')->name('admin.patientManagment.edit');
        // Route::post('update/{id}','patientManagmentController@update')->name('admin.patientManagment.update');//or put
        // Route::get('delete/{id}','patientManagmentController@destroy')->name('admin.patientManagment.delete');


     });

});

// Route::get('/home', 'HomeController@index')->name('home');



