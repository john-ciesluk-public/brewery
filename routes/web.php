<?php

use Illuminate\Http\Request;

Route::get('', 'HomeController@index');

Route::get('about', 'HomeController@about');
Route::get('beers', 'HomeController@beers');
Route::get('contact-us', 'HomeController@contact');
Route::post('contact-us', 'HomeController@postContact');
Route::get('events', 'HomeController@events');
Route::get('jobs', 'HomeController@jobs');
Route::get('age', 'HomeController@age');
Route::get('subscribe', 'HomeController@subscribe');
Route::get('unsubscribe', 'HomeController@unsubscribe');

Route::get('login', 'Auth\LoginController@login');
Route::post('login','Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('admin', 'AdminController@index');
Route::get('admin/beers', 'Admin\BeersController@index');
Route::get('admin/beers/create', 'Admin\BeersController@create');
Route::post('admin/beers/postCreate', 'Admin\BeersController@postCreate');
Route::get('admin/beers/update/{slug}', 'Admin\BeersController@update');
Route::post('admin/beers/postUpdate/{slug}', 'Admin\BeersController@postUpdate');
Route::get('admin/statistics', 'Admin\BeersController@statistics');
Route::get('admin/beers/getHops','Admin\BeersController@getHops'); //ajax
Route::get('admin/beers/getMalts','Admin\BeersController@getMalts'); //ajax

Route::get('admin/events', 'Admin\EventsController@index');
Route::get('admin/events/create', 'Admin\EventsController@create');
Route::post('admin/events/postCreate', 'Admin\EventsController@postCreate');
Route::get('admin/events/update/{id}', 'Admin\EventsController@update');
Route::post('admin/events/postUpdate/{id}', 'Admin\EventsController@postUpdate');

Route::get('admin/hops', 'Admin\HopsController@index');
Route::get('admin/hops/create', 'Admin\HopsController@create');
Route::post('admin/hops/postCreate', 'Admin\HopsController@postCreate');
Route::get('admin/hops/update/{id}', 'Admin\HopsController@update');
Route::post('admin/hops/postUpdate/{id}', 'Admin\HopsController@postUpdate');
Route::get('admin/hops/delete/{id}', 'Admin\HopsController@delete');
Route::post('admin/hops/postDelete/{id}', 'Admin\HopsController@postDelete');

Route::get('admin/malts', 'Admin\MaltsController@index');
Route::get('admin/malts/create', 'Admin\MaltsController@create');
Route::post('admin/malts/postCreate', 'Admin\MaltsController@postCreate');
Route::get('admin/malts/update/{id}', 'Admin\MaltsController@update');
Route::post('admin/malts/postUpdate/{id}', 'Admin\MaltsController@postUpdate');
Route::get('admin/malts/delete/{id}', 'Admin\MaltsController@delete');
Route::post('admin/malts/postDelete/{id}', 'Admin\MaltsController@postDelete');

Route::get('admin/mailinglist', 'Admin\MailingListController@index');

Route::get('admin/config', 'Admin\ConfigController@index');
Route::get('admin/config/create', 'Admin\ConfigController@create');
Route::post('admin/config/postCreate', 'Admin\ConfigController@postCreate');
Route::get('admin/config/update/{id}', 'Admin\ConfigController@update');
Route::post('admin/config/postUpdate/{id}', 'Admin\ConfigController@postUpdate');

Route::get('admin/config/about', 'Admin\ConfigController@about');
Route::post('admin/config/postAbout', 'Admin\ConfigController@postAbout');
Route::get('admin/config/jobs', 'Admin\ConfigController@jobs');
Route::post('admin/config/postJobs', 'Admin\ConfigController@postJobs');
Route::get('admin/config/home', 'Admin\ConfigController@home');
Route::post('admin/config/postHome', 'Admin\ConfigController@postHome');

Route::get('admin/users', 'Admin\UsersController@index');
Route::get('admin/users/create', 'Admin\UsersController@create');
Route::post('admin/users/postCreate', 'Admin\UsersController@postCreate');
Route::get('admin/users/update/{id}', 'Admin\UsersController@update');
Route::post('admin/users/postUpdate/{id}', 'Admin\UsersController@postUpdate');
Route::get('admin/users/delete/{id}', 'Admin\UsersController@delete');
Route::post('admin/users/postDelete/{id}', 'Admin\UsersController@postDelete');

Auth::routes();
