<?php

use Illuminate\Support\Facades\Auth;
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

//get main frontend page
Route::get('/', 'Frontend\MainController@index')->name('frontend.index');

//orders frontend route
Route::post('/city/store', 'Frontend\OrderController@store')->name('order.store');

//contact frontend route
Route::post('/contact-us', 'Frontend\ContactController@store')->name('contact.us');
###########################################################################################################

//Auth::routes();
Auth::routes(['register' => false]);

Route::group(['middleware' =>['auth', 'active'] , 'prefix'=>'dashboard' , 'namespace' => 'Dashboard'], function(){
    //Dashboard main routes
    Route::get('/home', 'DashboardController@index')->name('dashboard.index');


    //home routes
    //slider routes
    Route::get('/sliders', 'SliderController@index')->name('slider.index');
    Route::get('/sliders/create', 'SliderController@create')->name('slider.create');
    Route::post('/sliders/store', 'SliderController@store')->name('slider.store');
    Route::get('/sliders/edit/{id}', 'SliderController@edit')->name('slider.edit');
    Route::post('/sliders/update/{id}', 'SliderController@update')->name('slider.update');
    Route::get('/sliders/delete/{id}', 'SliderController@delete')->name('slider.delete');


    //advantage routes
//    Route::get('/advantages', 'AdvantageController@index')->name('advantage.index');
//    Route::get('/advantages/create', 'AdvantageController@create')->name('advantage.create');
//    Route::post('/advantages/store', 'AdvantageController@store')->name('advantage.store');
//    Route::get('/advantages/edit/{id}', 'AdvantageController@edit')->name('advantage.edit');
//    Route::post('/advantages/update/{id}', 'AdvantageController@update')->name('advantage.update');
//    Route::get('/advantages/delete/{id}', 'AdvantageController@delete')->name('advantage.delete');
    Route::resource('advantage','AdvantageController');


    //benefit route
    Route::get('/benefits', 'BenefitController@index')->name('benefit.index');
    Route::get('/benefits/create', 'BenefitController@create')->name('benefit.create');
    Route::post('/benefits/store', 'BenefitController@store')->name('benefit.store');
    Route::get('/benefits/edit/{id}', 'BenefitController@edit')->name('benefit.edit');
    Route::post('/benefits/update/{id}', 'BenefitController@update')->name('benefit.update');
    Route::get('/benefits/delete/{id}', 'BenefitController@delete')->name('benefit.delete');


    //City routes
    Route::get('/cities', 'CityController@index')->name('city.index');
    Route::get('/city/create', 'CityController@create')->name('city.create');
    Route::post('/city/store', 'CityController@store')->name('city.store');
    Route::get('/city/edit/{id}', 'CityController@edit')->name('city.edit');
    Route::post('/city/update/{id}', 'CityController@update')->name('city.update');
    Route::get('/city/delete/{id}', 'CityController@delete')->name('city.delete');
    Route::get('city/export-xlsx', 'CityController@exportEXCEL')->name('city.export.excel');
    Route::get('city/export-csv', 'CityController@exportCSV')->name('city.export.csv');
    Route::get('city/export-pdf', 'CityController@downloadPDF')->name('city.export.pdf');


    //orders routes
    Route::get('/orders', 'OrderController@index')->name('order.index');
    Route::get('/orders/delete/{id}', 'OrderController@delete')->name('order.delete');
    Route::get('/orders/pin', 'OrderController@pin')->name('order.pin');
    Route::get('/orders/restore/{id}', 'OrderController@restore')->name('order.delete.restore');
    Route::get('/orders/final/delete/{id}', 'OrderController@ForceDeleted')->name('order.delete.force');
    //export order routes
    Route::get('order/export-xlsx', 'OrderController@exportEXCEL')->name('order.export.excel');
    Route::get('order/export-csv', 'OrderController@exportCSV')->name('order.export.csv');
    Route::get('order/export-pdf', 'OrderController@downloadPDF')->name('order.export.pdf');


    //orders details routes
    Route::get('/orders/new', 'OrderController@new_order')->name('order.new');
    Route::get('/orders/sent', 'OrderController@sent_order')->name('order.sent');
    Route::get('/orders/delayed', 'OrderController@delayed_order')->name('order.delayed');
    Route::get('/orders/delivered', 'OrderController@delivered_order')->name('order.delivered');
    Route::get('/orders/noreply', 'OrderController@noreply_order')->name('order.noreply');
    Route::get('/orders/canceled', 'OrderController@canceled_order')->name('order.canceled');


    //orders change status
    Route::get('/orders/status/sent/{id}', 'OrderController@status_sent')->name('order.status.sent');
    Route::get('/orders/status/delivered/{id}', 'OrderController@status_delivered')->name('order.status.delivered');
    Route::get('/orders/status/delayed/{id}', 'OrderController@status_delayed')->name('order.status.delayed');
    Route::get('/orders/status/noreply/{id}', 'OrderController@status_noreply')->name('order.status.noreply');
    Route::get('/orders/status/canceled/{id}', 'OrderController@status_canceled')->name('order.status.canceled');
    Route::get('/orders/delete-from-status/{id}', 'OrderController@delete_from_status')->name('order.delete.status');


    //contact-us routes
    Route::get('/contacts', 'ContactController@index')->name('contact.index');
    Route::get('/contacts/reply/{id}', 'ContactController@getReply')->name('contact.get.reply');
    Route::post('/contacts/reply/mail', 'ContactController@postReply')->name('contact.post.reply');
    Route::get('/delete/{id}', 'ContactController@delete')->name('contact.delete');
    Route::get('contact/export-xlsx', 'ContactController@exportEXCEL')->name('contact.export.excel');
    Route::get('contact/export-csv', 'ContactController@exportCSV')->name('contact.export.csv');
    Route::get('contact/export-pdf', 'ContactController@downloadPDF')->name('contact.export.pdf');


    //permission routes
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::get('/login_history', 'UserController@login_history')->name('login.history');


    //attachments routes
    Route::get('/images', 'ImageController@index')->name('image.index');
    Route::get('/image/create', 'ImageController@create')->name('image.create');
    Route::post('/image/store', 'ImageController@store')->name('image.store');
    Route::get('image/edit/{id}', 'ImageController@edit')->name('image.edit');
    Route::post('/image/update/{id}', 'ImageController@update')->name('image.update');
    Route::get('/image/delete/{id}', 'ImageController@delete')->name('image.delete');
    Route::get('/download/{image}', 'ImageController@download')->name('download');

    Route::get('/attachments', 'AttachmentController@index')->name('attachment.index');
    Route::get('/attachment/create', 'AttachmentController@create')->name('attachment.create');
    Route::post('/attachment/store', 'AttachmentController@store')->name('attachment.store');
    Route::get('/attachment/edit/{id}', 'AttachmentController@edit')->name('attachment.edit');
    Route::post('/attachment/update/{id}', 'AttachmentController@update')->name('attachment.update');
    Route::get('/attachment/delete/{id}', 'AttachmentController@delete')->name('attachment.delete');
    Route::get('/download-file/{attachment}', 'AttachmentController@downloadFile')->name('downloadFile');


    //setting routes
    Route::get('/settings', 'SettingController@index')->name('setting.index');
    Route::post('/settings/update', 'SettingController@update')->name('setting.update');
});
