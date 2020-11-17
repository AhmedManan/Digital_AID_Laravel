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


Route::get('/', 'welcomeController@index');

Route::post('/login', 'LoginController@index');

Route::get('/registration','RegistrationController@index');

Route::post('/registration','RegistrationController@registrationPost');


Route::get('/logout','LogoutController@index');
Route::get('/theme/{id}','AdminController@themeChange');




Route::group(['middleware'=>['logincheck']],function(){
    //admin 
    Route::group(['middleware'=>['verifytypeadmin']],function(){
            
        Route::get('/admin','AdminController@index');
        Route::get('/admin/users','AdminController@users');
        Route::get('/admin/adminslist','AdminController@adminslist');
        Route::get('/admin/distributorslist','AdminController@distributorslist');
        Route::get('/admin/consumerslist','AdminController@consumerslist');
        Route::get('/admin/unverifiedusers','AdminController@unverifiedusers');

        Route::get('/admin/theme','AdminController@theme');
        Route::get('/admin/viewprofile/{username}','AdminController@viewProfile')->name('admin.viewprofile');
        Route::get('/admin/validnow/{username}','AdminController@validnow')->name('admin.validnow');
        Route::post('/admin/cardscan','AdminController@cardscanPost');
        Route::post('/admin/viewprofile/{username}','AdminController@viewProfilePost')->name('admin.viewprofile');
        Route::post('/admin/userupdate','AdminController@userupdatePost');
        Route::get('/admin/inventory','AdminController@inventory');
        Route::post('/admin/inventory','AdminController@inventoryPost');
        Route::post('/admin/searchadmin','AdminController@adminsearchPost');
        Route::get('/admin/searchadmin','AdminController@adminsearch');
        Route::post('/admin/updatepicture','AdminController@updatePicturePost');
        Route::get('/admin/reports','AdminController@report');
        Route::post('/admin/reports','AdminController@reportPost');
        Route::get('/admin/announcement','AdminController@announcement');
        Route::post('/admin/announcement','AdminController@announcementPost');
        // Route::get('/admin/inbox','AdminController@inbox');
        Route::get('/admin/inbox/{sentby}','AdminController@inboxNewMsg')->name('admin.inbox');
        Route::post('/admin/inbox/{sentby}','AdminController@inboxPost');
    });

    Route::post('/admin/inventoryexcel','AdminController@inventoryexcel');

    //distributor 
    Route::group(['middleware'=>['verifytypedist']],function(){
            
        Route::get('/distributor','DistributorController@index');
        Route::get('/distributor/users','DistributorController@users');
        Route::get('/distributor/announcementseen/{id}','DistributorController@announcementseen');
        Route::get('/distributor/allmsg','DistributorController@allmsg');
        Route::get('/distributor/distribute','DistributorController@distribute');
        Route::post('/distributor/verify','DistributorController@verify');
        Route::post('/distributor/aid','DistributorController@DistributePost');
        Route::get('/distributor/history','DistributorController@distributorhistory');
        Route::get('/distributor/viewprofile/{username}','DistributorController@viewProfile')->name('distributor.viewprofile');
        Route::post('/distributor/viewprofile/{username}','DistributorController@viewProfilePost')->name('distributor.viewprofile');
        Route::get('/distributor/reports','Controller@report');
        Route::post('/distributor/reports','Controller@reportPost');
    });
    //Consumer 
        Route::group(['middleware'=>['verifytypeconsumer']],function(){
            
            Route::get('/consumer','ConsumerController@index');
            Route::get('/consumer/announcementseen/{id}','ConsumerController@announcementseen');
            Route::get('/consumer/allmsg','ConsumerController@allmsg');
            Route::get('/consumer/reports','ConsumerController@report');
            Route::post('/consumer/reports','ConsumerController@reportPost');
            Route::get('/consumer/history','ConsumerController@consumerhistory');
            Route::post('/consumer/history','ConsumerController@consumerhistoryPost');
            Route::get('/consumer/viewprofile/{username}','ConsumerController@viewProfile')->name('consumer.viewprofile');
            Route::post('/consumer/viewprofile/{username}','ConsumerController@viewProfilePost')->name('consumer.viewprofile');
        });
});





