<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('home', 'HomeController@index');//Для відображення результата після логування

/*Auth group routes*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
/*/Auth group routes*/

Route::get('/', 'Frontend\HomeController@index');//Перенаправлення на адресу з локалю

/*Backend group routes*/
Route::group(['prefix'=>'admina6me', 'middleware' => ['auth', 'backend.init']], function(){

	//Routes for Monitoring (Backend)
	Route::get('/',['uses' => 'Backend\AdminDashboardController@index','as' => 'admin_dashboard']);
	Route::get('/monitoring',['uses' => 'Backend\MonitoringController@index','as' => 'admin_index']);//Вывод списка элементов
	Route::get('/monitoring/create',['uses' => 'Backend\MonitoringController@create','as' => 'admin_create']);//Вывод формы создания элемента
	Route::post('/monitoring/create',['uses' => 'Backend\MonitoringController@store','as' => 'admin_store']);//Сохранение элемента
	Route::get('/monitoring/{id}',['uses' => 'Backend\MonitoringController@edit','as' => 'admin_edit']);//Вывод формы редакторирование элемента..
	Route::put('/monitoring/{id}',['uses' =>'Backend\MonitoringController@update','as' => 'admin_update']);//Сохранение элемента после редактирования..
	Route::delete('/monitoring/{id}',['uses' => 'Backend\MonitoringController@destroy','as' => 'admin_delete']);//Удаление элемента

	/*//Routes for Articles (Backend)
	Route::get('/',['uses' => 'Backend\AdminDashboardController@index','as' => 'admin_dashboard']);
	Route::get('/monitoring',['uses' => 'Backend\AdminArticlesController@index','as' => 'admin_index']);//Вывод списка элементов
	Route::get('/monitoring/create',['uses' => 'Backend\AdminArticlesController@create','as' => 'admin_create']);//Вывод формы создания элемента
	Route::post('/monitoring/create',['uses' => 'Backend\AdminArticlesController@store','as' => 'admin_store']);//Сохранение элемента
	Route::get('/monitoring/{id}',['uses' => 'Backend\AdminArticlesController@edit','as' => 'admin_edit']);//Вывод формы редакторирование элемента..
	Route::put('/monitoring/{id}',['uses' =>'Backend\AdminArticlesController@update','as' => 'admin_update']);//Сохранение элемента после редактирования..
	Route::delete('/monitoring/{id}',['uses' => 'Backend\AdminArticlesController@destroy','as' => 'admin_delete']);//Удаление элемента*/

	//Routes for Texts (Backend)
	Route::get('/texts',['uses' => 'Backend\AdminTextsController@index','as' => 'text_index']);//Вывод списка
	Route::get('/texts/create',['uses' => 'Backend\AdminTextsController@create','as' => 'text_create']);//Вывод формы создания элемента
	Route::post('/texts/create',['uses' =>'Backend\AdminTextsController@store','as' => 'text_store']);//Сохранение элемента
	Route::delete('/texts/{id}',['uses' =>'Backend\AdminTextsController@destroy','as' => 'text_delete']);//Удаление элемента
	Route::get('/texts/{id}',['uses' =>'Backend\AdminTextsController@edit','as' => 'text_edit']);//Вывод формы редакторирование
	Route::put('/texts/{id}',['uses' =>'Backend\AdminTextsController@update','as' => 'text_update']);//Сохранение после редактирования
	Route::get('/texts_recovery',['uses' => 'Backend\AdminTextsController@recovery','as' => 'text_recovery']);//Востановление записей после удаления
	Route::get('/texts_delete',['uses' => 'Backend\AdminTextsController@delete','as' => 'texts_delete']);//Окончательное удаление

	//Routes for Categories (Backend)
	Route::get('/categories/create',['uses' => 'Backend\AdminCategoriesController@create','as' => 'admin_categories_create']);//Вывод формы создания категории
	Route::post('/categories/create',['uses' =>'Backend\AdminCategoriesController@store','as' => 'admin_categories_store']);//Сохранение элемента
	Route::get('/categories/{type}',['uses' => 'Backend\AdminCategoriesController@edit','as' => 'admin_categories_edit']);//Вывод формы редактирования категории
	Route::put('/categories/{type}',['uses' =>'Backend\AdminCategoriesController@update','as' => 'admin_categories_update']);//Сохранение после редактирования
	Route::delete('/categories/{type}',['uses' =>'Backend\AdminCategoriesController@destroy','as' => 'admin_categories_delete']);//Удаление категории
	Route::get('/categories/fileoptimize/{type?}','Backend\AdminCategoriesController@fileoptimize');
	//Routes for Settings (Backend)
	Route::get('/settings',['uses' => 'Backend\AdminSettingsController@index','as' => 'settings_index']);//Вывод списка
	Route::get('/settings/create',['uses' => 'Backend\AdminSettingsController@create','as' => 'settings_create']);//Вывод формы создания элемента
	Route::post('/settings/create',['uses' =>'Backend\AdminSettingsController@store','as' => 'settings_store']);//Сохранение элемента
	Route::delete('/settings/{id}',['uses' =>'Backend\AdminSettingsController@destroy','as' => 'settings_delete']);//Удаление элемента
	Route::get('/settings/{id}',['uses' =>'Backend\AdminSettingsController@edit','as' => 'settings_edit']);//Вывод формы редакторирование
	Route::put('/settings/{id}',['uses' =>'Backend\AdminSettingsController@update','as' => 'settings_update']);//Сохранение после редактирования
	Route::get('/settings_recovery',['uses' => 'Backend\AdminSettingsController@recovery','as' => 'settings_recovery']);//Востановление записей после удаления
	Route::get('/settings_delete',['uses' => 'Backend\AdminSettingsController@delete','as' => 'settings_delete']);//Окончательное удаление

});
/*/Backend group routes*/



