<?php

Auth::routes();



Route::get('/admin', function () {
    return redirect('de/admin');
});

Route::get('/home', function () {
    return redirect('de/home');
});
Route::get('/welcome', function () {
    return redirect('de/welcome');
});
Route::get('/index', function () {
    return redirect('de/index');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

        Route::get('/home', function () {
            return redirect('/');
        });
        Route::get('/welcome', function () {
            return redirect('/');
        });
        Route::get('/index', function () {
            return redirect('/');
        });


 

        Route::get('/', 'HomeController@index')->name('main');
        Route::get('services/{id}', 'HomeController@service');
        Route::get('contactus', 'HomeController@contactsus');
        Route::post('contactus', 'Admin\ContactController@store');
        Route::get('contactus/create', 'Admin\ContactController@create');
        Route::post('index', 'Admin\AppiontmentController@store');
        Route::get('index/create', 'Admin\AppiontmentController@create');


       

        //Control Panel
        Route::group(['prefix' => 'admin'], function () {
        Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
        Route::post('/login', 'AdminAuth\LoginController@login');
        Route::get('/logout', 'AdminAuth\LoginController@logout')->name('logout');
        Route::get('/site','LayoutController@index');
        Route::group(['middleware' => ['web', 'admin']], function () {
        Route::get('/', 'Admin\HomeController@index');
        Route::get('/home', 'Admin\HomeController@index');
        Route::get('/edit_profile', 'Admin\HomeController@edit_profile')->name('edit_profile');
        Route::get('/change_password', 'Admin\HomeController@change_password')->name('change_password');
        Route::post('/edit_profile', 'Admin\HomeController@edit_profile_post')->name('edit_profile_post');
        Route::post('/change_password', 'Admin\HomeController@change_password_post')->name('change_password_post');




                // admin _Manager
                Route::get('/managers', 'Admin\ManagerController@index');
                Route::post('/managers', 'Admin\ManagerController@store');
                Route::get('/managers/create', 'Admin\ManagerController@create');
                Route::delete('managers/{id}', 'Admin\ManagerController@destroy');
                Route::get('/managers/{id}/edit', 'Admin\ManagerController@edit');
                Route::post('/managers/{id}', 'Admin\ManagerController@update');
                Route::get('/managers/{id}/edit_password', 'Admin\ManagerController@edit_password');
                Route::post('/managers/{id}/edit_password', 'Admin\ManagerController@update_password');


                Route::get('/users', 'Admin\UserController@index');
                Route::post('/users', 'Admin\UserController@store');
                Route::get('/users/create', 'Admin\UserController@create');
                Route::delete('users/{id}', 'Admin\UserController@destroy');
                Route::get('/users/{id}/edit', 'Admin\UserController@edit');
                Route::post('/users/{id}', 'Admin\UserController@update');
                Route::get('/users/{id}/edit_password', 'Admin\UserController@edit_password');
                Route::post('/users/{id}/edit_password', 'Admin\UserController@update_password');

                Route::get('/photos', 'Admin\PhotoController@index');
                Route::post('/photos', 'Admin\PhotoController@store');
                Route::get('/photo/create', 'Admin\PhotoController@create');
                Route::delete('photo/{id}', 'Admin\PhotoController@destroy');
                Route::get('/photo/{id}/edit', 'Admin\PhotoController@edit');
                Route::post('/photo/{id}', 'Admin\PhotoController@update');
                Route::post('/changeStatus/photos', 'Admin\PhotoController@changeStatus');


                Route::get('/doctors', 'Admin\DoctorController@index');
                Route::post('/doctors', 'Admin\DoctorController@store');
                Route::get('/doctor/create', 'Admin\DoctorController@create');
                Route::delete('doctor/{id}', 'Admin\DoctorController@destroy');
                Route::get('/doctor/{id}/edit', 'Admin\DoctorController@edit');
                Route::post('/doctor/{id}', 'Admin\DoctorController@update');
                Route::post('/changeStatus/doctors', 'Admin\DoctorController@changeStatus');


                Route::get('/contacts', 'Admin\ContactController@index');
                Route::delete('contact/{id}', 'Admin\ContactController@destroy');
                Route::get('/contact/{id}/edit', 'Admin\ContactController@edit');
                Route::post('/contact/{id}', 'Admin\ContactController@update');
                Route::post('/changeStatus/contacts', 'Admin\ContactController@changeStatus');

                Route::get('/appiontments', 'Admin\AppiontmentController@index');
                Route::delete('appiontment/{id}', 'Admin\AppiontmentController@destroy');
                Route::get('/appiontment/{id}/edit', 'Admin\AppiontmentController@edit');
                Route::post('/appiontment/{id}', 'Admin\AppiontmentController@update');
                Route::post('/changeStatus/appiontments', 'Admin\ContactController@changeStatus');

                Route::get('/sliders', 'Admin\SliderController@index');
                Route::post('/sliders', 'Admin\SliderController@store');
                Route::get('/slider/create', 'Admin\SliderController@create');
                Route::delete('slider/{id}', 'Admin\SliderController@destroy');
                Route::get('/slider/{id}/edit', 'Admin\SliderController@edit');
                Route::post('/slider/{id}', 'Admin\SliderController@update');
                Route::post('/changeStatus/sliders', 'Admin\SliderController@changeStatus');

                Route::get('/clients', 'Admin\ClientController@index');
                Route::post('/clients', 'Admin\ClientController@store');
                Route::get('/client/create', 'Admin\ClientController@create');
                Route::delete('client/{id}', 'Admin\ClientController@destroy');
                Route::get('/client/{id}/edit', 'Admin\ClientController@edit');
                Route::post('/client/{id}', 'Admin\ClientController@update');
                Route::post('/changeStatus/clients', 'Admin\ClientController@changeStatus');


                Route::get('/services', 'Admin\ServiceController@index');
                Route::post('/services', 'Admin\ServiceController@store');
                Route::get('/service/create', 'Admin\ServiceController@create');
                Route::delete('service/{id}', 'Admin\ServiceController@destroy');
                Route::get('/service/{id}/edit', 'Admin\ServiceController@edit');
                Route::post('/service/{id}', 'Admin\ServiceController@update');
                Route::post('/changeStatus/services', 'Admin\ServiceController@changeStatus');


                Route::get('/settings', 'Admin\SettingController@index');
                Route::post('/settings', 'Admin\SettingController@update');

            });
        });


});


